<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "learn".
 *
 * @property int $id
 * @property string $title
 * @property string $dascription
 * @property string $text
 * @property int $id_img
 * @property int $id_user
 * @property int $id_postcategory
 * @property int $enable
 * @property int $enable_view
 * @property string $date
 * @property string $date_ir
 * @property string $time
 * @property string $time_ir
 */
class Learn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'learn';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text', 'date', 'date_ir', 'time', 'time_ir'], 'required'],
            [['text'], 'string'],
            [['id_img', 'id_user', 'id_postcategory', 'enable', 'enable_view'], 'integer'],
            [['date', 'time'], 'safe'],
            [['title'], 'string', 'max' => 250],
            [['dascription'], 'string', 'max' => 500],
            [['date_ir', 'time_ir'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'dascription' => 'Dascription',
            'text' => 'Text',
            'id_img' => 'Id Img',
            'id_user' => 'Id User',
            'id_postcategory' => 'Id Postcategory',
            'enable' => 'Enable',
            'enable_view' => 'Enable View',
            'date' => 'Date',
            'date_ir' => 'Date Ir',
            'time' => 'Time',
            'time_ir' => 'Time Ir',
        ];
    }

    /**
     * {@inheritdoc}
     * @return LearnQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LearnQuery(get_called_class());
    }
}
