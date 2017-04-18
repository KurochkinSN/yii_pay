<?php

namespace app\controllers\admin;

use app\controllers\BaseController;

class UserController extends BaseController
{
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionBlogPost(){
        // http://yii/web/index.php?r=admin/user/blog-post
        $arr = [1,2,3,4];
        $this->Debug($arr);
        return 'Blog Post';
    }
}