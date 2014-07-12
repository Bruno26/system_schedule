<div class="view">

<?php
//var_dump($data);die;
$activo = ($model->es_activo==1)?'Disponible':'No Disponible';
//var_dump($activo);die;
$this->widget('bootstrap.widgets.TbGridView', array(
   'dataProvider' => $model->search(),
   'filter' => $model,
   'template' => "{items}",
   'columns' => array(
        array(
            'name' => 'id_aula',
            'header' => 'ID',
            'htmlOptions' => array('color' =>'width: 60px'),
        ),
        array(
            'name' => 'str_piso',
            'header' => 'Piso',
        ),
        array(
            'name' => 'nu_aula',
            'header' => 'Aula Numero',
        ),
        array(
            'name' => 'piso_aula',
            'header' => 'Piso',
        ),
        array(
            'name' => 'es_activo',
            'header' => 'Disponible',
            'value' => '$data->es_activo',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header' => 'Acciones',
            'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
                //'template' => '{ver}{actualizar}{activar}{desactivar}{delete}{observacion}',
                'deleteConfirmation' => '¿Seguro que quiere cambiar el Estatus de Este Promotor?',
            //'value' => $activo,
        ),
    ),
));
?>


</div>
