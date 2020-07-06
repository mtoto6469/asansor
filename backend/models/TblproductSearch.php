<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblproduct;

/**
 * TblproductSearch represents the model behind the search form of `backend\models\Tblproduct`.
 */
class TblproductSearch extends Tblproduct
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'id_category','id_img', 'enable', 'enable_view', 'cont', 'exit', 'emtiaz'], 'integer'],
            [['title', 'description', 'brand', 'meta_title', 'meta_tag', 'meta_text', 'meta_key'], 'safe'],
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
        $query = Tblproduct::find()->where(['enable_view'=>1]);

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
            'price' => $this->price,
            'id_category' => $this->id_category,
            'id_img' => $this->id_img,
            'enable' => $this->enable,
            'enable_view' => $this->enable_view,
            'cont' => $this->cont,
            'exit' => $this->exit,
            'emtiaz' => $this->emtiaz,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_tag', $this->meta_tag])
            ->andFilterWhere(['like', 'meta_text', $this->meta_text])
            ->andFilterWhere(['like', 'meta_key', $this->meta_key]);

        return $dataProvider;
    }
}
