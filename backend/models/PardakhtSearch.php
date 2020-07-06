<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pardakht;

/**
 * PardakhtSearch represents the model behind the search form of `backend\models\Pardakht`.
 */
class PardakhtSearch extends Pardakht
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_fac', 'price', 'endnamber', 'enable','enable_view', 'approve'], 'integer'],
            [['paygiri', 'admin_description', 'date_u'], 'safe'],
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
        $query = Pardakht::find();

        if($confirm==0){
            $query=$query->where(['approve'=>0])->andWhere(['enable_view'=>1])->andFilterWhere(['!=','id_fac',0]);

        }elseif ($confirm==3){

            $query=$query->where(['approve'=>0])->andWhere(['enable_view'=>0])->andFilterWhere(['!=','id_fac',0]);

        }elseif ($confirm==1){
            $query=$query->where(['approve'=>0])->andWhere(['enable_view'=>1])->andWhere(['id_fac'=>0]);
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
            'id_fac' => $this->id_fac,
            'price' => $this->price,
            'endnamber' => $this->endnamber,
            'enable' => $this->enable,
            'enable_view' => $this->enable_view,
            'approve' => $this->approve,
        ]);

        $query->andFilterWhere(['like', 'paygiri', $this->paygiri])
            ->andFilterWhere(['like', 'admin_description', $this->admin_description])
            ->andFilterWhere(['like', 'date_u', $this->date_u]);

        return $dataProvider;
    }
}
