<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\table\TransactionTable;

/**
 * TransactionSearch represents the model behind the search form of `app\models\table\TransactionTable`.
 */
class TransactionSearch extends TransactionTable
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['status', 'amount', 'type', 'service', 'data_no', 'data_zone', 'trxid', 'phone'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TransactionTable::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'service', $this->service])
            ->andFilterWhere(['like', 'data_no', $this->data_no])
            ->andFilterWhere(['like', 'data_zone', $this->data_zone])
            ->andFilterWhere(['like', 'trxid', $this->trxid])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
