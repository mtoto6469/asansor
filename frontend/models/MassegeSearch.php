<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Massege;

/**
 * MassegeSearch represents the model behind the search form of `frontend\models\Massege`.
 */
class MassegeSearch extends Massege
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_pro', 'displacementheight', 'enable_view'], 'integer'],
            [['text', 'welldimensions', 'Capacity', 'hlfdc', 'pit', 'date', 'date_ir','name','adrress','tell'], 'safe'],
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
        $query = Massege::find();

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
            'displacementheight' => $this->displacementheight,
            'date' => $this->date,
            'enable_view' => $this->enable_view,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tell', $this->tell])
            ->andFilterWhere(['like', 'adrress', $this->adrress])
            ->andFilterWhere(['like', 'welldimensions', $this->welldimensions])
            ->andFilterWhere(['like', 'Capacity', $this->Capacity])
            ->andFilterWhere(['like', 'hlfdc', $this->hlfdc])
            ->andFilterWhere(['like', 'pit', $this->pit])
            ->andFilterWhere(['like', 'date_ir', $this->date_ir]);

        return $dataProvider;
    }
}
