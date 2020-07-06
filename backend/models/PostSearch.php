<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Post;

/**
 * PostSearch represents the model behind the search form of `backend\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'statuse', 'id_img', 'id_user', 'id_postcategory', 'enable', 'enable_view','indpage'], 'integer'],
            [['title', 'dascription', 'text', 'date', 'date_it', 'time', 'time_ir', 'link', 'mata_tag', 'mata_key', 'meta_title', 'meta_text'], 'safe'],
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
        $query = Post::find()->where(['enable_view'=>1]);

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
            'indpage' => $this->indpage,
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
            ->andFilterWhere(['like', 'date_it', $this->date_it])
            ->andFilterWhere(['like', 'time_ir', $this->time_ir])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'mata_tag', $this->mata_tag])
            ->andFilterWhere(['like', 'mata_key', $this->mata_key])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_text', $this->meta_text]);

        return $dataProvider;
    }
}
