<?php

namespace app\models;

use yii\base\Model;

class Cart extends Model {

    public $id;
    public $name;
    public $price;
    public $qty;

    public function rules() {
        return[

            ['id', 'name', 'price', 'qty']
        ];
    }

}

?>