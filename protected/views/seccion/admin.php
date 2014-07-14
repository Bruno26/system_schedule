<?php
$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registrar Sección', 'active' => false, 'url' => $this->createUrl('create')),
        array('label' => 'Administrar Sección', 'active' => true),
    ),
        )
);

$this->menu = array(
    array('label' => 'Create Seccion', 'url' => array('create')),
);
?>
<h1 align="center"><i>Administración de Secciones</i></h1><br>


</div><!-- search-form -->

<?php
if (isset($_GET['error'])) {
    Yii::app()->user->setFlash('error', '<strong>Gestione primero el horario.</strong> ');
    $this->widget('bootstrap.widgets.TbAlert', array(
        'block' => true, // display a larger alert block?
        'fade' => true, // use transitions?
        'closeText' => 'x', // close link text - if set to false, no close link is displayed
        'alerts' => array(// configurations per alert type
            'error' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
        ),
    ));
}

$model->es_activo = 'true';
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id' => 'seccion-grid',
    'responsiveTable' => true,
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'fk_carrera' => array(
            'name' => 'fk_carrera',
            'value' => '$data->fkCarrera->descripcion',
            'htmlOptions' => array('width' => '107px'),
            'filter' => Maestro::FindMaestrosByPadreSelect(29),
        ),
        'fk_trayecto' => array(
            'name' => 'fk_trayecto',
            'value' => '$data->fkTrayecto->descripcion',
            'htmlOptions' => array('width' => '107px'),
            'filter' => Maestro::FindMaestrosByPadreSelect(35),
        ),
        'fk_trimestre' => array(
            'name' => 'fk_trimestre',
            'value' => '$data->fkTrimestre->descripcion',
            'htmlOptions' => array('width' => '107px'),
            'filter' => Maestro::FindMaestrosByPadreSelect(40),
        ),
        'nu_seccion' => array(
            'name' => 'nu_seccion',
            'value' => '$data->nu_seccion',
            'htmlOptions' => array('width' => '107px'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header' => 'Acción',
            'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
            'template' => '{ver}{delete}{horario}{imprimir}',
            'buttons' => array(
                'ver' => array(
                    'url' => 'Yii::app()->createUrl("seccion/view", array("id"=>$data->id_seccion))',
                    'label' => 'Ver Detalle',
                    'icon' => 'eye-open',
                    'size' => 'medium',
                ),
                'delete' => array(
                    'label' => 'Eliminar',
                    'icon' => 'icon-trash',
                    'size' => 'medium',
                    'options' => array('style' => 'margin-left:7px;',),
                    'url' => 'Yii::app()->createUrl("seccion/delete", array("id"=>$data->id_seccion))',
                ),
                'horario' => array(
                    'label' => 'Ver horaio',
                    'icon' => 'icon-calendar',
                    'size' => 'medium',
                    'options' => array('style' => 'margin-left:7px;',),
                    'url' => 'Yii::app()->createUrl("horario/index", array("id"=>$data->id_seccion))',
                ),
                'imprimir' => array(
                    'label' => 'Imprimir Horario',
                    'icon' => 'icon-print',
                    'size' => 'medium',
                    'options' => array('style' => 'margin-left:7px;',),
                    'url' => 'Yii::app()->createUrl("horario/view", array("id"=>$data->id_seccion))',
                ),
            ),
        ),
    ),
));
?>
