<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Deliveryman;

/**
 * DeliverymanSearch represents the model behind the search form of `backend\models\Deliveryman`.
 */
class DeliverymanSearch extends Deliveryman
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_devliveryman', 'id_factor', 'confirm','enable_view','endnamber','price','approve'], 'integer'],
            [['user_tel', 'user_address', 'date', 'date_ir'], 'safe'],
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
        $query = Deliveryman::find();
        if ($confirm==1){
            $query=$query->where(['id_devliveryman'=>Yii::$app->user->getId()])->andWhere(['confirm'=>1]);
        }else{
            $query=$query->where(['id_devliveryman'=>Yii::$app->user->getId()])->andWhere(['confirm'=>0]);
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
            'id_devliveryman' => $this->id_devliveryman,
            'id_factor' => $this->id_factor,
            'confirm' => $this->confirm,
            'enable_view' => $this->enable_view,
            'endnamber' => $this->endnamber,
            'approve' => $this->approve,
            'price' => $this->price,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'user_tel', $this->user_tel])
            ->andFilterWhere(['like', 'user_address', $this->user_address])
            ->andFilterWhere(['like', 'date_ir', $this->date_ir]);

        return $dataProvider;
    }
}
