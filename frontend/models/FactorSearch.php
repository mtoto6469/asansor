<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Factor;

/**
 * FactorSearch represents the model behind the search form of `frontend\models\Factor`.
 */
class FactorSearch extends Factor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'price', 'resive', 'visibel', 'print', 'confirm', 'receive_type', 'enable', 'enable_view', 'etebar', 'face_id_user'], 'integer'],
            [['ref', 'description', 'date', 'date_ir', 'telephone', 'address', 'location', 'atu', 'time', 'time_ir'], 'safe'],
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
    public function search($params,$confirm)
    {
        $query = Factor::find();
        if ($confirm==0){
            $query=$query->where(['resive'=>1])->andWhere(['id_user'=>Yii::$app->user->getId()]);
        }elseif ($confirm==1){
            $query=$query->where(['resive'=>0])->andWhere(['id_user'=>Yii::$app->user->getId()]);
        }elseif ($confirm==2){
            $query=$query->where(['resive'=>0])->andWhere(['id_user'=>Yii::$app->user->getId()]);
        }

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
            'price' => $this->price,
            'date' => $this->date,
            'resive' => $this->resive,
            'visibel' => $this->visibel,
            'print' => $this->print,
            'confirm' => $this->confirm,
            'receive_type' => $this->receive_type,
            'enable' => $this->enable,
            'enable_view' => $this->enable_view,
            'etebar' => $this->etebar,
            'face_id_user' => $this->face_id_user,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'date_ir', $this->date_ir])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'atu', $this->atu])
            ->andFilterWhere(['like', 'time_ir', $this->time_ir]);

        return $dataProvider;
    }
}
