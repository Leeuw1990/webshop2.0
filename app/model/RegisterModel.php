<?php

namespace app\model;

use app\core\Model;

class RegisterModel extends Model
{

    public $firstName;
    public $lastName;
    public $username;
    public $email;
    public $password;
    public $confirmPassword;

    public function register()
    {
        echo "creating new user!";
    }

    public function rules(): array
    {
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'username' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MATCH, 'max' => 24]],
            'conformPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],

        ];
    }


}