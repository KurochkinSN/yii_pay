<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 18.04.2017
 * Time: 21:33
 */

namespace app\models;

use yii\base\Model;

class TestForm extends Model
{
    public $name;
    public $email;
    public $text;

    public function attributeLabels()
    {
        return [
            'name' => 'Имя пользователя: ',
            'email' => 'Email пользователя: ',
        ];
    }

    public function rules()
    {
        return [
            //[['name', 'email'] , 'required', 'message' => 'Поле обязательно для заполнения'],
            //Можно указать имя сообщения или поменять язык во Yii > config>>>web
            [['name', 'email'] , 'required'],
            [['email'] , 'email'],
            //['name' , 'string' ,'min' => 2, 'tooShort' => 'Слишком короткий'],
            //['name' , 'string' ,'max' => 5, 'tooLong' => 'Слишком длинный'],
            ['name' , 'string' ,'length' => [2,5]],
            ['text', 'myRule'],
            ['text', 'trim'],
        ];
    }

    public function myRule($atr){
        if (!in_array($this->$atr, ['hello','world'])){
            $this->addError($atr, 'В введите слово hello или wold');
        }
    }
}