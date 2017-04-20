<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 19.04.2017
 * Time: 13:19
 */

namespace app\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName(){
        return 'products';
    }

    public  function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }
}
