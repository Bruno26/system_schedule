<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('aula-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<?php
$this->breadcrumbs = array(
    'Aulas' => array('index'),
    'Administración',
);

$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registrar Aula', 'active' => false, 'url' => $this->createUrl('create')),
        array('label' => 'Administrar Aula', 'active' => true, 'url' => $this->createUrl('admin')),
    ),
        )
);
?>

<br><h1 align='center'>Administración de las Aulas</h1><br>


<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'aula-grid',
        'dataProvider' => $model->search(),
//        'filter' => $model,
        'columns' => array(
            'str_piso',
            'nu_aula',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
            ),
        ),
    ));
    ?>
<br>

