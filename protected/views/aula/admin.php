<?php
//$this->breadcrumbs = array(
//    'Registrar',
//);

$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Ver Aulas Registradas', 'active' => true, 'url' => $this->createUrl('admin')),
        array('label' => 'Registrar Aulas', 'active' => false, 'url' => $this->createUrl('create')),
    ),
        )
);
?>

<h1>Listado de Aulas Disponibles</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'aula-grid',
    'dataProvider' => $model->search(),
    'responsiveTable' => true,
    'filter' => $model,
    'columns' => array(
        'str_piso' => array(
            'name' => 'str_piso',
            //'value' => '$data->fkTrayecto->descripcion',
            'htmlOptions' => array('width' => '107px'),
            'filter' => Aula::BuscarPiso(),
        ),
        'nu_aula' => array(
            'name' => 'nu_aula',
            //'value' => '$data->fkTrimestre->descripcion',
            'htmlOptions' => array('width' => '107px'),
            'filter' => Aula::BuscarNumeroAula(),
        ),
        //'es_activo' => array(
            //'name' => 'es_activo',
            //'value' => '($data->es_activo == 1)?"Disponible":"No Disponible"',
            //'htmlOptions' => array('width' => '107px'),
        //),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
			'header'=>'Acciones',
			'template'=>'{update}',
			'buttons' => array(
			//'borrar' => array(
                        //'label' => 'Borrar Registro',
                        //'options' => array('style' => 'margin-left:5px;', 'confirm' => '¿Desea borrar éste registro?'),
                        //'url' => 'Yii::app()->createUrl("/aula/borrar/", array("id"=>$data->id_aula))',
                        //'icon' => 'icon-trash ',
                        //'size' => 'medium',
                    //),
			),
        ),
    ),
));
?>

