<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventorydetail".
 *
 * @property integer $id
 * @property string $inventory_id
 * @property integer $product_id
 * @property double $price
 * @property integer $qty
 */
class Inventorydetail extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'inventorydetail';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['inventory_id'], 'required'],
            [['product_id', 'qty'], 'integer'],
            [['price'], 'number'],
            [['inventory_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'inventory_id' => 'เลขที่ใบรับเข้า',
            'product_id' => 'วัสดุ',
            'price' => 'ราคา',
            'qty' => 'จำนวน',
        ];
    }

    /**
     * @inheritdoc
     * @return InventorydetailQuery the active query used by this AR class.
     */
    public static function find() {
        return new InventorydetailQuery(get_called_class());
    }

    // relation
    public function getProduct() {
        return @$this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    public function getProductname() {
        return @$this->product->name;
    }

    //<--------------------------------------------------------------
}
