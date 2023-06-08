<?php


require_once __DIR__ . "/AuthService.php";
class AuthServiceImplement implements AuthService
{
    public function createTokenService(entities\AuthEntity $authEntity)
    {
        $authEntity->setToken(Token::tokenEncode(720)); // token exp is 30 day than token created
        $authRepository = new AuthRepositoryImplement();
        $result = $authRepository->createTokenRepository($authEntity);

        if ($result[0]["status"] === true) {
            $email = new Email();
            $email->sendEmail($authEntity->getEmail(), $result[0]["payload"]["token"]);
        }
        return $result;
    }
}
