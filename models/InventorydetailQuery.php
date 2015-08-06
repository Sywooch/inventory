<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Inventorydetail]].
 *
 * @see Inventorydetail
 */
class InventorydetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Inventorydetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Inventorydetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}