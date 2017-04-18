<h1>Show TIME</h1>

<button class="btn btn-success" id="btn">Click me...</button>
<?php $this->beginBlock('block1'); ?>
    <h1>Заголовок страницы</h1>
<?php $this->endBlock(); ?>
<?php
    //$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']);
    //$this->registerJs("$('.container').append('<p>Show!!!</p>');", \yii\web\View::POS_LOAD);
    //$this->registerCSS('.container{background: #ccc;}');
$script = <<< JS
$('#btn').on('click', function() {
  $.ajax({
    url: 'index.php?r=post/index',
    data: {'test': '123'},
    //type: 'GET',
    type: 'POST',
    success: function(res) {
      console.log(res);
    },
    error: function() {
      alert('error');
    }
  });
});
JS;
$this->registerJs($script);
//$this->registerJs($script, \yii\web\View::POS_LOAD);
?>
