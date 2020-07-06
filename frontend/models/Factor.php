<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "factor".
 *
 * @property int $id
 * @property string $ref
 * @property int $id_user
 * @property int $price
 * @property string $description
 * @property string $date
 * @property string $date_ir
 * @property int $resive
 * @property int $visibel
 * @property int $print
 * @property int $confirm
 * @property string $telephone
 * @property int $receive_type
 * @property int $enable
 * @property int $enable_view
 * @property string $address
 * @property string $location
 * @property int $etebar
 * @property int $face_id_user
 * @property string $atu
 * @property string $time
 * @property string $time_ir
 */
class Factor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'factor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'price', 'description', 'date', 'date_ir', 'telephone', 'receive_type', 'address', 'location', 'atu', 'time', 'time_ir'], 'required'],
            [['id_user', 'price', 'resive', 'visibel', 'print', 'confirm', 'receive_type', 'enable', 'enable_view', 'etebar', 'face_id_user'], 'integer'],
            [['description'], 'string'],
            [['date', 'time'], 'safe'],
            [['ref', 'atu'], 'string', 'max' => 300],
            [['date_ir', 'time_ir'], 'string', 'max' => 10],
            [['telephone'], 'string', 'max' => 11],
            [['address'], 'string', 'max' => 500],
            [['location'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'Ref',
            'id_user' => 'Id User',
            'price' => 'Price',
            'description' => 'Description',
            'date' => 'Date',
            'date_ir' => 'Date Ir',
            'resive' => 'Resive',
            'visibel' => 'Visibel',
            'print' => 'Print',
            'confirm' => 'Confirm',
            'telephone' => 'Telephone',
            'receive_type' => 'Receive Type',
            'enable' => 'Enable',
            'enable_view' => 'Enable View',
            'address' => 'Address',
            'location' => 'Location',
            'etebar' => 'Etebar',
            'face_id_user' => 'Face Id User',
            'atu' => 'Atu',
            'time' => 'Time',
            'time_ir' => 'Time Ir',
        ];
    }

    /**
     * {@inheritdoc}
     * @return FactorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FactorQuery(get_called_class());
    }
}
