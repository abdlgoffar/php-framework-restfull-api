<?php
require_once __DIR__ . "/../models/data/Database.php";
require_once __DIR__ . "/../../vendor/autoload.php";
class token
{
    private static $secretKey = "etywdvcbwqacscnbpkklknbbvxzcxzxgdhfhghunvcsrwefrgt";
    public static function tokenEncode(int $expirationTimeInHours): string
    {
        $hours = 3600 * $expirationTimeInHours;
        $iat = time();
        $exp  = $iat + $hours;
        $payload = array(
            "iss" => "http://localhost/create-api-procedural-web-project/",
            "aud" => "http://localhost/create-api-procedural-web-project/",
            "iat" => $iat,
            "exp" => $exp
        );
        $jwt = Firebase\JWT\JWT::encode($payload, self::$secretKey, 'HS256');
        return $jwt;
    }
    public static function tokenDecode(string $jwt)
    {
        try {
            $decoded = Firebase\JWT\JWT::decode($jwt, new Firebase\JWT\Key(self::$secretKey, 'HS256'));
            return true;
        } catch (InvalidArgumentException $e) {
            // provided key/key-array is empty or malformed.
            if (!empty($e)) {
                var_dump("one");
                return false;
            }
        } catch (DomainException $e) {
            // provided algorithm is unsupported OR
            // provided key is invalid OR
            // unknown error thrown in openSSL or libsodium OR
            // libsodium is required but not available.
            if (!empty($e)) {
                var_dump("two");
                return false;
            }
        } catch (Firebase\JWT\SignatureInvalidException $e) {
            // provided JWT signature verification failed.
            if (!empty($e)) {
                var_dump("three");
                return false;
            }
        } catch (Firebase\JWT\BeforeValidException $e) {
            // provided JWT is trying to be used before "nbf" claim OR
            // provided JWT is trying to be used before "iat" claim.
            if (!empty($e)) {
                var_dump("four");
                return false;
            }
        } catch (Firebase\JWT\ExpiredException $e) {
            // provided JWT is trying to be used after "exp" claim.
            if (!empty($e)) {
                var_dump("five");
                return false;
            }
        } catch (UnexpectedValueException $e) {
            // provided JWT is malformed OR
            // provided JWT is missing an algorithm / using an unsupported algorithm OR
            // provided JWT algorithm does not match provided key OR
            // provided key ID in key/key-array is empty or invalid.
            if (!empty($e)) {
                var_dump("six");
                return false;
            }
        }
    }
    public static function getTokenAvailable(string $token): string
    {
        $pdoGetTokenAvailable = Database::start()->prepare("SELECT token FROM auth WHERE token = :token");
        $pdoGetTokenAvailable->bindValue(":token", $token, PDO::PARAM_STR);
        $pdoGetTokenAvailable->execute();
        $result =  $pdoGetTokenAvailable->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            return $result["token"];
        }
        $pdoGetTokenAvailable = null;
        $result = null;
        return "nothing token";
    }
}
