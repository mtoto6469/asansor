<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblpostcategory".
 *
 * @property int $id
 * @property string $title
 * @property int $id_parent
 * @property string $description
 * @property int $enable
 * @property int $enable_view
 * @property int $footer
 */
class Tblpostcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblpostcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['id_parent', 'enable', 'enable_view', 'footer'], 'integer'],
            [['title'], 'string', 'max' => 250],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'عنوان دسته'),
            'id_parent' => Yii::t('app', 'Id Parent'),
            'description' => Yii::t('app', 'توضیحات'),
            'enable' => Yii::t('app', 'Enable'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'footer' => Yii::t('app', 'نمایش در footer'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TblpostcategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblpostcategoryQuery(get_called_class());
    }
}
