<?php

require_once __DIR__ . "/../entities/AuthEntitiy.php";
require_once __DIR__ . "/../data/Database.php";
require_once __DIR__ . "/../../utils/Response.php";
require_once __DIR__ . "/../../utils/Validation.php";

interface AuthRepository
{
    public function createTokenRepository(entities\AuthEntity $authEntity);
}
