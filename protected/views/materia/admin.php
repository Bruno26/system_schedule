<?php
$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registrar', 'active' => false, 'url' => $this->createUrl('create')),
        array('label' => 'Administrar Materias', 'active' => true),
    ),
        )
);
?>

<h1 align="center"><i>Administración de Materia</i></h1><br>

<div class="search-form" style="display:none">
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'materia-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'carrera' => array(
            'name' => 'carrera',
            'value' => '$data->carrera',
            'htmlOptions' => array('width' => '107px'),
            'filter' => CHtml::listData(VswCarreraMaterias::model()->findAll(array('order' => 'carrera')), 'carrera', 'carrera'),
        ),
        'trayecto' => array(
            'name' => 'trayecto',
            'value' => '$data->trayecto',
            'htmlOptions' => array('width' => '107px'),
            'filter' => CHtml::listData(VswCarreraMaterias::model()->findAll(array('order' => 'trayecto')), 'trayecto', 'trayecto'),
        ),
        'trimestre' => array(
            'name' => 'trimestre',
            'value' => '$data->trimestre',
            'htmlOptions' => array('width' => '107px'),
            'filter' => CHtml::listData(VswCarreraMaterias::model()->findAll(array('order' => 'trimestre')), 'trimestre', 'trimestre'),
        ),
        'seccion' => array(
            'name' => 'seccion',
            'value' => '$data->seccion',
            'htmlOptions' => array('width' => '107px'),
            'filter' => CHtml::listData(VswCarreraMaterias::model()->findAll(array('order' => 'seccion')), 'seccion', 'seccion'),
        ),
        'str_materia' => array(
            'name' => 'str_materia',
            'value' => '$data->str_materia',
            'htmlOptions' => array('width' => '107px'),
            'filter' => CHtml::listData(VswCarreraMaterias::model()->findAll(array('order' => 'str_materia')), 'str_materia', 'str_materia'),
        ),
        'str_corto_materia' => array(
            'name' => 'str_corto_materia',
            'value' => '$data->str_corto_materia',
            'htmlOptions' => array('width' => '107px'),
            'filter' => CHtml::listData(VswCarreraMaterias::model()->findAll(array('order' => 'str_corto_materia')), 'str_corto_materia', 'str_corto_materia'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header' => 'Acción',
            'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
            'template' => '{ver}{delete}',
            'buttons' => array(
                'ver' => array(
                    'url' => 'Yii::app()->createUrl("materia/view", array("id"=>$data->id_materia))',
                    'label' => 'Ver Detalle',
                    'icon' => 'eye-open',
                    'size' => 'medium',
                ),
                'delete' => array(
                    'label' => 'Adjuntar Archivos',
                    'icon' => 'icon-trash',
                    'size' => 'medium',
                    'options' => array('style' => 'margin-left:7px;',),
                    'url' => 'Yii::app()->createUrl("materia/delete", array("id"=>$data->id_materia))',
                ),
            ),
        ),
    ),
));
?>
