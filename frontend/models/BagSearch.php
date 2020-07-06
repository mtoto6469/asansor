<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Bag;

/**
 * BagSearch represents the model behind the search form of `frontend\models\Bag`.
 */
class BagSearch extends Bag
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_pro','id_fac', 'count', 'enable_view', 'enable', 'price','down_buy'], 'integer'],
            [['cookie_name', 'date', 'date_ir','time'], 'safe'],
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
        $query = Bag::find();

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
            'id_user' => $this->id_user,
            'id_pro' => $this->id_pro,
            'id_fac' => $this->id_fac,
            'count' => $this->count,
            'enable_view' => $this->enable_view,
            'enable' => $this->enable,
            'price' => $this->price,
            'down_buy' => $this->down_buy,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'cookie_name', $this->cookie_name])
            ->andFilterWhere(['like', 'date_ir', $this->date_ir]);

        return $dataProvider;
    }
}
