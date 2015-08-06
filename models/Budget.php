<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "budget".
 *
 * @property integer $id
 * @property string $name
 * @property double $price
 */
class Budget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'budget';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['price'], 'number'],
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
            'name' => 'แหล่งจ่ายเงิน',
            'price' => 'เงินงบประมาณ',
        ];
    }

    /**
     * @inheritdoc
     * @return BudgetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BudgetQuery(get_called_class());
    }
}
