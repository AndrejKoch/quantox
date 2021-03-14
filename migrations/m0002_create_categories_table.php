<?php

class m0002_create_categories_table
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "CREATE TABLE categories (
                id INT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                parent_id INT NULL,
                depth INT NULL
            ) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE categories;";
        $db->pdo->exec($SQL);
    }

}
