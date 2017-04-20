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
use app\models\Category;
use app\models\Posts;

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
        $post = Posts::findOne(2);
        //$post->email = '2@2.com';
        //$post->save();
        //$post->delete();
        //Posts::deleteAll(['>','id',5]);
        //Posts::updateAll(['name' => 'Sergey'], 'id = 1');


        //DebugView($post);
        $posts = new Posts();
        //$posts->name = 'Автор';
        //$posts->email = 'mail@mail.com';
        //$posts->text = 'текст сообщения';
        //$posts->save();

        //$model = new TestForm();

        if ($posts->load(Yii::$app->request->post())){
            if ($posts->save()){

                Yii::$app->session->setFlash('success', 'Данные приянты');
                return $this->refresh(); //Перезагружает страницу
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка в данных');
            }
        }
        //return $this->render('test', compact('model'));
        return $this->render('test', ['model' => $posts]);
    }
    
    public function actionShow(){
        //$this->layout = 'basic'; // Задаем шаблон для текущего экшена
        $this->view->title = 'Одна статья';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевки...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы']);
        //$cats = Category::find()->all();
        //$cats = Category::find()->orderBy('id' => SORT_DESC)->all();
        //$cats = Category::find()->asArray()->all(); //foreach ($cats as $cat) echo $cat['title'];
        //$cats = Category::find()->asArray()->where('parent = 691')->all();
        //$cats = Category::find()->asArray()->where(['parent' => 691])->all();
        //$cats = Category::find()->asArray()->where(['like', 'title', 'pp'])->all();
        //$cats = Category::find()->asArray()->where(['<=', 'parent', 695])->all();
        //$cats = Category::find()->asArray()->where('parent = 691')->limit(1)->all();
        //$cats = Category::find()->asArray()->where('parent = 691')->one(); //echo $cats['title']
        //$cats = Category::find()->asArray()->where(['parent' => 691])->count(); // 5
        //$cats = Category::findOne(['parent' => 691]);
        //$cats = Category::findAll(['parent' => 691]);
        //$query = "SELECT * FROM categories WHERE title LIKE '%pp%'"; //'%pp%' <-есть опастность SQL иньекции
        //$cats = Category::findBySql($query)->asArray()->all();
        //$query = "SELECT * FROM categories WHERE title LIKE :search"; //безопасный вариант так как экраннируеться входящая переменная
        //$cats = Category::findBySql($query,['search' => '%pp%'])->asArray()->all();
        
        //$cats = Category::findOne(694); // ленивая загрузка (пока не вызовиться метод $cats->products данные products не появиться)
        //$cats = Category::find()->with('products')->where('id = 694')->all();// жадная загрузка сразу делает все запросы

        //$cats = Category::find()->all();                  // ленивая загрузка
        $cats = Category::find()->with('products')->all();  // жадная загрузка
        return $this->render('show',compact('cats'));
    }
}