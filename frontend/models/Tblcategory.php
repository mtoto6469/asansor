<?php

namespace frontend\models;

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
            [['id_img', 'id_parent', 'enable', 'enable_view'], 'integer'],
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
            'id' => 'ID',
            'name' => 'Name',
            'id_img' => 'Id Img',
            'id_parent' => 'Id Parent',
            'enable' => 'Enable',
            'enable_view' => 'Enable View',
            'description' => 'Description',
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
