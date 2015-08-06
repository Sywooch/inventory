<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productuser".
 *
 * @property integer $id
 * @property string $fname
 * @property string $lname
 * @property string $position_name
 */
class Productuser extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'productuser';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['fname', 'lname', 'position_name'], 'required'],
            [['fname', 'lname', 'position_name', 'position_name1'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'fname' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'position_name' => 'ตำแหน่ง1',
            'position_name1' => 'ตำแหน่ง2',
            'fullname' => Yii::t('app', 'ชื่อ-นามสกุล'),
        ];
    }

    public function getFullname() {
        return $this->fname . " " . $this->lname;
    }

    //<--------------------------------------------------------------
}
