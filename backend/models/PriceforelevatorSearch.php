<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Priceforelevator;

/**
 * PriceforelevatorSearch represents the model behind the search form of `backend\models\Priceforelevator`.
 */
class PriceforelevatorSearch extends Priceforelevator
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'floorNamber', 'floorStops', 'karbary', 'enable', 'enable_view'], 'integer'],
            [['speed', 'capacity', 'liftType', 'motortype', 'instalLocation', 'text', 'motor1', 'motor2', 'motor3', 'description1', 'description2', 'description3', 'description4', 'description5', 'description6'], 'safe'],
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
        $query = Priceforelevator::find()->filterWhere(['enable_view'=>1]);

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
            'floorNamber' => $this->floorNamber,
            'floorStops' => $this->floorStops,
            'karbary' => $this->karbary,
            'enable' => $this->enable,
            'enable_view' => $this->enable_view,
        ]);

        $query->andFilterWhere(['like', 'speed', $this->speed])
            ->andFilterWhere(['like', 'capacity', $this->capacity])
            ->andFilterWhere(['like', 'liftType', $this->liftType])
            ->andFilterWhere(['like', 'motortype', $this->motortype])
            ->andFilterWhere(['like', 'instalLocation', $this->instalLocation])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'motor1', $this->motor1])
            ->andFilterWhere(['like', 'motor2', $this->motor2])
            ->andFilterWhere(['like', 'motor3', $this->motor3])
            ->andFilterWhere(['like', 'description1', $this->description1])
            ->andFilterWhere(['like', 'description2', $this->description2])
            ->andFilterWhere(['like', 'description3', $this->description3])
            ->andFilterWhere(['like', 'description4', $this->description4])
            ->andFilterWhere(['like', 'description5', $this->description5])
            ->andFilterWhere(['like', 'description6', $this->description6]);

        return $dataProvider;
    }
}
