<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productmain".
 *
 * @property integer $id
 * @property string $name
 */
class Productmain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productmain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'หมวดหมู่หลัก',
        ];
    }
}
