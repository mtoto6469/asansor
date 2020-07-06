<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `backend\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'statuse', 'id_img', 'id_user', 'slider', 'footer'], 'integer'],
            [['title','description', 'place', 'startdate', 'enddate', 'karfarmaname', 'date', 'date_ir', 'time', 'time_ir'], 'safe'],
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
        $query = Project::find();

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
            'statuse' => $this->statuse,
            'id_img' => $this->id_img,
            'id_user' => $this->id_user,
            'enable' => $this->enable,
            'enable_view' => $this->enable_view,
            'date' => $this->date,
            'time' => $this->time,
            'slider' => $this->slider,
            'footer' => $this->footer,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'startdate', $this->startdate])
            ->andFilterWhere(['like', 'enddate', $this->enddate])
            ->andFilterWhere(['like', 'karfarmaname', $this->karfarmaname])
            ->andFilterWhere(['like', 'date_ir', $this->date_ir])
            ->andFilterWhere(['like', 'time_ir', $this->time_ir]);

        return $dataProvider;
    }
}
