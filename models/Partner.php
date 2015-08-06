<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $fax
 * @property integer $vat
 */
class Partner extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['address'], 'string'],
            [['vat'], 'string'],
            [['code'], 'string', 'max' => 4],
            [['name'], 'string', 'max' => 255],
            [['phone', 'fax'], 'string', 'max' => 13]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'id',
            'code' => 'รหัสบริษัท',
            'name' => 'ชื่อบริษัท',
            'address' => 'ที่อยู่',
            'phone' => 'โทรศัพท์',
            'fax' => 'FAX',
            'vat' => 'เลขที่ผู้เสียภาษีอากร',
        ];
    }

}
