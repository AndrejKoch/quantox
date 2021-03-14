<?php



namespace app\models;


use app\core\DbModel;
use app\core\Model;
use app\core\UserModel;

class User extends UserModel
{

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $category_id = '';
    public string $confirmPassword = '';

    public function tableName(): string
    {
        return 'users';
    }


    public function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class,
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8, [self::RULE_MAX, 'max' => 24]]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email', 'category_id', 'password'];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm password',
        ];
    }

    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }


}
?>
<?php
// Turn off all error reporting
error_reporting(0);
?>
