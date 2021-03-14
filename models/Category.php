<?php

namespace app\models;


class Category extends \app\core\DbModel
{

    public $id;
    public $name;
    public $parent_id;
    private $depth;

    public function tableName(): string
    {
        return 'categories';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['name', 'parent_id', 'depth'];
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'parent_id' => [self::RULE_REQUIRED],
        ];
    }

    public function __construct()
    {
        parent::__construct();
    }


    public function getCategory($id)
    {
        $category = $this->getRow($this->tableName(), $id);
        return $category;
    }

    public static function getCategories()
    {
        return \app\core\DbModel::getRows('categories');
    }

}