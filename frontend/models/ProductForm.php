<?php

namespace frontend\models;

use yii\base\Model;

class ProductForm extends Model
{
    public $id;
    public $name;
    public $desc;
    public $quantity;
    public $status;

    public function rules()
    {
        return [
            [['name', 'quantity'], 'required'],
            [['id'], 'number'],
            [['desc'], 'string', 'skipOnEmpty' => true],
            [['quantity'], 'number'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * Returns the attribute labels.
     *
     * See Model class for more details
     *
     * @return array attribute labels (name => label).
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name of product',
        ];
    }
}