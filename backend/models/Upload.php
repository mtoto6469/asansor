<?php
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 5/14/2018
 * Time: 4:47 PM
 */

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Upload extends Model/*نام مدل مجازی=upload*/
{
 /**
  * @var UploadedFile
  */
    public $imageFile;

    public function rules()
    {
        return[
            [['imageFile'],'file','extensions'=>'png,jpg'],
        ];
    }
}