<?php
$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registrar', 'active' => false, 'url' => $this->createUrl('create')),
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
$model->es_activo ='true';
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'seccion-grid',
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
        ),
    ),
));
?>
