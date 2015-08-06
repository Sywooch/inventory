<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $productmain_id
 * @property integer $category_id
 * @property integer $unit_id
 * @property string $name
 * @property string $detail
 * @property integer $qty
 */
class Products extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['productmain_id', 'category_id', 'unit_id', 'name', 'detail', 'qty'], 'required'],
            [['productmain_id', 'category_id', 'sub_qty','unit_id', 'qty','price'], 'integer'],
            [['detail'], 'string'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'productmain_id' => 'หมวดหมู่หลัก',
            'category_id' => 'หมวดหมู่รอง',
            'unit_id' => 'ชื่อหน่วยนับ',
            'name' => 'ชื่อวัสดุ',
            'detail' => 'คุณสมบัตเฉพาะ',
            'qty' => 'จำนวนคงเหลือ',
            'sub_qty' => 'หน่วยนับ',
            'price' => 'ราคา'
        ];
    }

    /**
     * @inheritdoc
     * @return ProductsQuery the active query used by this AR class.
     */
    
    public static function find() {
        return new ProductsQuery(get_called_class());
    }

/// virtual attribute หมวดหมู่หลัก
    public function getProductmain() {
        return @$this->hasOne(Productmain::className(), ['id' => 'productmain_id']);
    }

    public function getProductmainname() {
        return @$this->productmain->name;
    }
    //<--------------------------------------------------------------
    /// virtual attribute หมวดหมู่รอง

    // relation
    public function getCategory() {
        return @$this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCategoryname() {
        return @$this->category->name;
    }
    //<--------------------------------------------------------------
    
    // relation
    public function getUnit() {
        return @$this->hasOne(Unit::className(), ['id' => 'category_id']);
    }

    public function getUnitname() {
        return @$this->unit->name;
    }
    //<--------------------------------------------------------------

}
