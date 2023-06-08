<?php
class Validation
{
    //method check empty
    public static function checkEmpty(array $field): bool
    {
        foreach ($field as  $value) {
            if (empty($value)) {
                return true;
            } else {
                return false;
            }
        }
    }
    //method check char lenght
    public static function checkStringLenght($field, int $min, int $max): bool
    {
        $temp = [];
        $data = str_split($field);
        for ($i = 1; $i < count($data) + 1; $i++) {
            $temp[] = [$i];
        }

        if (count($temp) < $min || count($temp) > $max) {
            return true;
        }
        return false;
    }
    //method check char string
    public static function checkStringChar($field): bool
    {
        if (preg_match("/^[a-z-0-9-' '-.]*$/", $field) === 0) {
            return true;
        } else {
            return false;
        }
    }
    //method check char int
    public static function checkIntegerChar($field): bool
    {
        if (is_numeric($field) === false) {
            return true;
        }
        return false;
    }
    //method check email
    public static function checkEmail($field): bool
    {
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
    //method check address
    public static function checkAddress($field): bool
    {

        $data = str_split($field);
        if ($data[0] !== "j" || $data[1] !== "l" || $data[2] !== ".") {
            return true;
        }
        return false;
    }
}
