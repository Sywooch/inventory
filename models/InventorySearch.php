<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inventory;

/**
 * InventorySearch represents the model behind the search form about `app\models\Inventory`.
 */
class InventorySearch extends Inventory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inventory', 'd_date', 'date_accept', 'file'], 'safe'],
            [['budget_id', 'productuser_id', 'partner_id', 'department_id', 'bill_no'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Inventory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'budget_id' => $this->budget_id,
            'productuser_id' => $this->productuser_id,
            'partner_id' => $this->partner_id,
            'department_id' => $this->department_id,
            'bill_no' => $this->bill_no,
            'd_date' => $this->d_date,
            'date_accept' => $this->date_accept,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'inventory', $this->inventory])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
