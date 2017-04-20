<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 19.04.2017
 * Time: 8:54
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName(){
        return 'categories';
    }

    public  function getProducts(){
        return $this->hasMany(Product::className(), ['parent' => 'id']);
    }
}