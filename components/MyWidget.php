<?php

namespace app\components;

use yii\base\Widget;

class MyWidget extends Widget
{
    public $name;

    public function init()
    {
        parent::init();
        if ($this->name === null) $this->name = 'Гость';

        ob_start(); //Буферизируем контент между тегами MyWidget::begin() и MyWidget::end()
    }

    public function run(){
        $content = ob_get_clean();
        $content = mb_strtoupper($content, 'utf-8');
        $name = $this->name;
        return $this->render('my', compact('content', 'name'));
        //return $this->render('my', ['name' => $this->name]);
    }
}