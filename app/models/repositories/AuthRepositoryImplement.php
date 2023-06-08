<?php

use entities\AuthEntity;

require_once __DIR__ . "/AuthRepository.php";

class AuthRepositoryImplement implements AuthRepository
{
    //create
    private $createAuthTokenMessages = [];
    public function createTokenRepository(entities\AuthEntity $authEntity)
    {
        $createTokenRequirement = true;
        $pdoCreateAuthToken = Database::start()->prepare("INSERT INTO auth(email, token) VALUES(?, ?)");
        if (Validation::checkEmpty([$authEntity->getEmail()])) {
            $this->createAuthTokenMessages[] = ["email field is required"];
            $createTokenRequirement = false;
        }
        if (!Validation::checkEmpty([$authEntity->getEmail()]) && Validation::checkEmail($authEntity->getEmail())) {
            $this->createAuthTokenMessages[] = ["email field char is invalid"];
            $createTokenRequirement = false;
        }
        if (!Validation::checkEmpty([$authEntity->getEmail()]) && Validation::checkStringLenght($authEntity->getEmail(), 5, 55)) {
            $this->createAuthTokenMessages[] = ["email field min char is 5, and max is 55"];
            $createTokenRequirement = false;
        }

        if ($createTokenRequirement === true) {
            $pdoCreateAuthToken->bindValue(1, $authEntity->getEmail(), PDO::PARAM_STR);
            $pdoCreateAuthToken->bindValue(2, $authEntity->getToken(), PDO::PARAM_STR);
            $pdoCreateAuthToken->execute();
            if ($pdoCreateAuthToken->rowCount() === 1) {
                $pdoCreateAuthToken = null;
                $pdoCreateAuthTokenResult = Database::start()->prepare("SELECT email, token FROM auth WHERE email = ?");
                $pdoCreateAuthTokenResult->bindValue(1, $authEntity->getEmail(), PDO::PARAM_STR);
                if ($pdoCreateAuthTokenResult->execute() === true) {
                    return Response::jsonFiles(true, $pdoCreateAuthTokenResult->fetch(PDO::FETCH_ASSOC), []);
                }
                $pdoCreateAuthTokenResult = null;
            }
        }
        $pdoCreateAuthToken = null;
        return Response::jsonFiles(false, [], $this->createAuthTokenMessages);
    }
}
