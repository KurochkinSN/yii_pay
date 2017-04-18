<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 17.04.2017
 * Time: 17:25
 */

namespace app\controllers;


class MyController extends BaseController
{
    public function actionIndex($id = null)
    {
        $my = 'Привет мир';
        if (!$id) $id = 'Гость';
        return $this->render('index', compact('my', 'id'));
    }
}