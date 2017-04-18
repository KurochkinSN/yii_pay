<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 17.04.2017
 * Time: 21:19
 */

namespace app\controllers;

use yii\web\Controller;

class BaseController extends  Controller
{
    public function Debug($item){
        echo "<pre>" . print_r($item, true) . "</pre>";
    }
}

function DebugView($item){
    echo "<pre>" . print_r($item, true) . "</pre>";
}