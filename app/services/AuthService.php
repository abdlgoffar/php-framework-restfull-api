<?php
require_once __DIR__ . "/../models/repositories/AuthRepositoryImplement.php";
require_once __DIR__ . "/../models/entities/AuthEntitiy.php";
require_once __DIR__ . "/../secure/Token.php";
require_once __DIR__ . "/../mail/Email.php";
interface AuthService
{
    public function createTokenService(entities\AuthEntity $authEntity);
}
