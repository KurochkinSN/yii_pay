<?php

namespace app\models;
use yii\db\ActiveRecord;

class Posts extends  ActiveRecord
{
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'text' => 'Сообщение',
        ];
    }

    public function rules()
    {
        return [
            //[['name', 'email'] , 'required', 'message' => 'Поле обязательно для заполнения'],
            //Можно указать имя сообщения или поменять язык во Yii > config>>>web
            [['name', 'text'] , 'required'],
            ['email' , 'email'],
        ];
    }
}