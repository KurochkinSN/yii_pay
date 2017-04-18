<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php
$this->beginPage();
//$this->title = 'Article';
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <div class="container">
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><?=Html::a('Главная', '/web/')?></li>
                <li role="presentation"><?=Html::a('Статьи', ['post/index'])?></li>
                <li role="presentation"><?=Html::a('Статья', ['post/show'])?></li>
            </ul>
            <?php //DebugFunction($this->blocks); ?>
            <?php if (isset($this->blocks['block1'])): ?>
                <?php echo $this->blocks['block1'];  ?>
            <?php endif; ?>
            <?= $content ?>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>