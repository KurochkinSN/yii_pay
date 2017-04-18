<h1>Test action</h1>
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
// \app\controllers\DebugView($item); <-вызов функции из класса BasController
//DebugFunction($item); //<-вызов функции из отдельного коневого файла функции который прописан web/index
//DebugFunction($model);
?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>

<?php $form = ActiveForm::begin(['options' => ['id' => 'testForm']]); ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'email')->label('Email:')->input('email');  ?>
<?= $form->field($model, 'text')->label('Сообщение:')->textarea(['rows' => 5, 'style' => 'resize:none']);  ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success'])?>
<?php ActiveForm::end(); ?>
