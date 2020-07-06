<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Servicebuy;

/**
 * ServiceBuySearch represents the model behind the search form of `frontend\models\Servicebuy`.
 */
class ServicebuySearch extends Servicebuy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_service', 'id_user','enable_view','service_id_user','confirm','validityduration'], 'integer'],
            [['mobile', 'address', 'name', 'family', 'telephon', 'date', 'date_ir','time','time_ir','repairman_name'], 'safe'],
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
        $query = Servicebuy::find();

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
            'id_service' => $this->id_service,
            'id_user' => $this->id_user,
            'service_id_user' => $this->service_id_user,
            'date' => $this->date,
            'time' => $this->time,
            'confirm' => $this->confirm,
            'enable_view' => $this->enable_view,
            'validityduration' => $this->validityduration,
        ]);

        $query->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'family', $this->family])
            ->andFilterWhere(['like', 'telephon', $this->telephon])
            ->andFilterWhere(['like', 'repairman_name', $this->repairman_name])
            ->andFilterWhere(['like', 'date_ir', $this->date_ir])
            ->andFilterWhere(['like', 'time_ir', $this->time_ir]);

        return $dataProvider;
    }
}
