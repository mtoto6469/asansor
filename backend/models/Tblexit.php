<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblexit".
 *
 * @property int $id
 * @property int $id_pro
 * @property int $enable_view
 * @property int $exit
 */
class Tblexit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblexit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pro'], 'required'],
            [['id_pro', 'enable_view', 'exit'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pro' => Yii::t('app', 'Id Pro'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'exit' => Yii::t('app', 'Exit'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TblexitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblexitQuery(get_called_class());
    }
}
