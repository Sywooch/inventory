<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Budget]].
 *
 * @see Budget
 */
class BudgetQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Budget[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Budget|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}