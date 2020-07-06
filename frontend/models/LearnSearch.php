<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Learn;

/**
 * LearnSearch represents the model behind the search form of `frontend\models\Learn`.
 */
class LearnSearch extends Learn
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_img', 'id_user', 'id_postcategory', 'enable', 'enable_view'], 'integer'],
            [['title', 'dascription', 'text', 'date', 'date_ir', 'time', 'time_ir'], 'safe'],
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
        $query = Learn::find();

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
            'id_img' => $this->id_img,
            'id_user' => $this->id_user,
            'id_postcategory' => $this->id_postcategory,
            'enable' => $this->enable,
            'enable_view' => $this->enable_view,
            'date' => $this->date,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'dascription', $this->dascription])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'date_ir', $this->date_ir])
            ->andFilterWhere(['like', 'time_ir', $this->time_ir]);

        return $dataProvider;
    }
}
