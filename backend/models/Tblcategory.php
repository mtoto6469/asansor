<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblcategory".
 *
 * @property int $id
 * @property string $name
 * @property int $id_img
 * @property int $id_parent
 * @property int $enable
 * @property int $enable_view
 * @property string $description
 * @property int $footer
 */
class Tblcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id_img','id_parent','id_parent', 'enable', 'enable_view','footer'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['description'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'نام دسته'),
            'id_img' => Yii::t('app', 'عکس'),
            'id_parent' => Yii::t('app', ',والد'),
            'enable' => Yii::t('app', 'وضعیت دسته'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'description' => Yii::t('app', 'توضیحات'),
            'footer' => Yii::t('app', 'نمایش در footer'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TblcategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblcategoryQuery(get_called_class());
    }
}
