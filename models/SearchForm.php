<?php


namespace app\models;


use app\core\DbModel;

class SearchForm extends DbModel
{

    public function tableName(): string
    {
        return 'users';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['firstname'];
    }

    public function rules(): array
    {
        return [];
    }

    public function search($search)
    {

        $sql = "SELECT u.id, u.firstname, u.lastname, u.email, u.category_id, c.name AS category_name FROM users u INNER JOIN categories c ON u.category_id=c.id WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR email LIKE '%$search%'";
        $result = self::getConnection()->query($sql);

        if ($result->num_rows > 0) {
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        }
    }

}