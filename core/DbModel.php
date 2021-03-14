<?php


namespace app\core;


abstract class DbModel extends Model
{

    public $connect;

    abstract public function tableName(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey(): string;


    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ") 
            VALUES(" . implode(',', $params) . ")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public function getAll()
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT * FROM $tableName");
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getRow($table, $id)
    {
        $query = "SELECT * FROM $table WHERE id = $id";
        $result = mysqli_query($this->getConnection(), $query);
        return mysqli_fetch_assoc($result);

    }

    public static function getRows($table)
    {
        $query = "SELECT * FROM $table";
        $result = mysqli_query(DbModel::getConnection(), $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;

    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }

    public static function getConnection()
    {
        return mysqli_connect($_ENV['DB_HOSTNAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
    }

    public function __construct()
    {
        $this->connect = $this->getConnection();
    }

    public function insert($table, $fields = array())
    {

        $keys = implode(',', array_keys($fields));

        foreach ($fields as &$value) {
            $value = "'" . $value . "'";
        }

        $values = implode(',', array_values($fields));

        $query = "INSERT INTO $table ($keys) VALUES ($values)";

        return mysqli_query($this->getConnection(), $query);
    }


    public function search()
    {
        if (isset($_POST['search'])) {
        }
            $firstname = $_POST['firstname'];
            $query = "SELECT * FROM users WHERE firstname='$firstname'";
            $query_run = mysqli_query(self::getConnection(), $query);

            while ($row = mysqli_fetch_array($query_run)) {
            }
        }
    }