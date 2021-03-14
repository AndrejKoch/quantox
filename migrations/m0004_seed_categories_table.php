<?php

class m0004_seed_categories_table
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (1, 'Front End Developer', 0, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (2, 'Angular', 1, NULL);     
                
                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (3, 'AngularJS', 2, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (4, 'Angular 2', 2, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (5, 'React', 1, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (6, 'React Native', 5, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (7, 'Vue', 1, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (8, 'Back End Developer', 0, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (9, 'PHP', 8, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (10, 'Symfony', 9, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (11, 'Silex', 10, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (12, 'Laravel', 9, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (13, 'Lumen', 12, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (14, 'NodeJs', 8, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (15, 'Express', 14, NULL);

                INSERT INTO categories (id, name, parent_id, depth) 
                VALUES (16, 'NestJs', 14, NULL);

";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "DELETE FROM categories CASCADE;";
        $db->pdo->exec($SQL);
    }
}