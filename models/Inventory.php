<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory".
 *
 * @property string $id
 * @property integer $budget_id
 * @property integer $productuser_id
 * @property integer $partner_id
 * @property integer $department_id
 * @property integer $bill_no
 * @property string $inventory
 * @property string $d_date
 * @property string $date_accept
 * @property string $file
 */
class Inventory extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc

     */
    public $product_id;
    public $price;
    public $qty;
    public $name;

    public static function tableName() {
        return 'inventory';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'required'],
            [['product_id', 'price', 'qty', 'budget_id', 'productuser_id', 'partner_id', 'department_id'], 'integer'],
            [['inventory'], 'string'],
            [['d_date', 'date_accept', 'qty'], 'safe'],
            [['id', 'file', 'bill_no'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'เลขที่ใบรับเข้า',
            'budget_id' => 'ประเภทการจ่ายเงิน',
            'productuser_id' => 'เจ้าหน้าที่พัสดุ',
            'partner_id' => 'บริษัทคู่ค้า',
            'department_id' => 'หน่วยงาน',
            'bill_no' => 'เลขที่ใบส่งของ',
            'inventory' => 'Inventory',
            'd_date' => 'วันรับของ',
            'date_accept' => 'วันตรวจรับ',
            'file' => 'ไฟล์ประกอบ',
            'product_id' => 'รายการพัสดุ'
        ];
    }

    /**
     * @inheritdoc
     * @return InventoryQuery the active query used by this AR class.
     */
    public static function find() {
        return new InventoryQuery(get_called_class());
    }

    // relation
    public function getProduct() {
        return @$this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    public function getProductname() {
        return @$this->product->name;
    }

    //<--------------------------------------------------------------
    // relation
    public function getBudget() {
        return @$this->hasOne(Budget::className(), ['id' => 'budget_id']);
    }

    public function getBudgetname() {
        return @$this->budget->name;
    }

    //<--------------------------------------------------------------
    // relation
    public function getPartner() {
        return @$this->hasOne(Partner::className(), ['id' => 'partner_id']);
    }

    public function getPartnername() {
        return @$this->partner->name;
    }

    //<--------------------------------------------------------------
}
