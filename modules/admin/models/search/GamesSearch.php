<?php

namespace app\modules\admin\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\table\GamesTable;
use app\libs\validators\FilterValidatorTrim;

class GamesSearch extends GamesTable
{

    public $searchQuery;
    public $displayQuery;

    public function rules()
    {
        return [
            [['searchQuery', 'displayQuery', 'status'], 'safe'],
            ['searchQuery', FilterValidatorTrim::class, 'filter' => 'trim'],
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
        // load the search form data and validate
        $this->load($params);

        $query = GamesTable::find();

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $this->displayQuery != null ? $this->displayQuery : 10,
            ],
            'sort' => [
                'enableMultiSort' => true,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->andFilterWhere(['like', 'name', $this->searchQuery])
            ->andFilterWhere(['status' => $this->status]);


        return $dataProvider;
    }
}
