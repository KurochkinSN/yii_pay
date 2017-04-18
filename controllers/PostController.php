<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 17.04.2017
 * Time: 22:58
 */

namespace app\controllers;

use Yii;
use app\models\TestForm;

class PostController extends BaseController
{
    public $layout = 'basic'; // Задаем шаблон для текущего контроллера

    public function beforeAction($action)
    {
        //Предварительная обработка экшена
        //DebugView($action);
        if ($action->id == 'index'){
            //Для экшена индекс отключаем проверку CSRF которая проверяется с нашей ли формы был запрос методом POST
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        //$this->Debug(Yii::$app);
        if (Yii::$app->request->isAjax){
            //DebugView($_POST);
            DebugView(Yii::$app->request->post());
            $this->view->title = 'Статьи';
            return 'test';
        }
        $model = new TestForm();
        if ($model->load(Yii::$app->request->post())){
            if ($model->validate()){
                Yii::$app->session->setFlash('success', 'Данные приянты');
                return $this->refresh(); //Перезагружает страницу
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка в данных');
            }
        }
        return $this->render('test', compact('model'));
    }
    
    public function actionShow(){
        //$this->layout = 'basic'; // Задаем шаблон для текущего экшена
        $this->view->title = 'Одна статья';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевки...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы']);
        return $this->render('show');
    }
}