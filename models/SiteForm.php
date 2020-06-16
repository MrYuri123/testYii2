<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SiteForm extends Model
{
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['verifyCode', 'captcha'],
            ['verifyCode', 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }
}
