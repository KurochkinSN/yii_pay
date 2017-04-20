<?php
    use app\components\MyWidget;
?>
<h1>Show TIME</h1>
<?php
   //echo MyWidget::widget(['name' => 'Сергей']);
?>

<?php MyWidget::begin()?>
    <h1>здорова мир</h1>
<?php MyWidget::end()?>
----
<?php MyWidget::begin()?>
<h1>здорова мир</h1>
<?php MyWidget::end()?>
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

//DebugFunction($cats);
//DebugFunction(count($cats[0]->products));
//DebugFunction($cats);

/*
foreach ($cats AS $cat){
    echo "<ul><li>{$cat->title}</li>";
        $products = $cat->products;
        foreach ($products AS $product){
            echo '<ul>';
                echo "<li>{$product->title}</li>";
            echo '</ul>';
        }
    echo "</ul>";
    //echo $cat->title . '<br>';
    //echo $cat['title'] . '<br>';
}

//$this->registerJs($script, \yii\web\View::POS_LOAD);
 */
?>
