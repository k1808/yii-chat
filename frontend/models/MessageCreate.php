<?php


namespace frontend\models;


use yii\base\Model;

class MessageCreate extends Model
{
    public $messages;

    public function rules()
    {
        return [
          [['messages'], 'required'],
          [['messages'], 'trim'],
          [['messages'], 'string'],
        ];
    }

}