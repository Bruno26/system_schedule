<div class="view">

<?php
<div class="row-fluid">
    <div>
        <div class="span3">
            <?php
            echo $form->dropDownListRow($model, 'fk_hora', Maestro::FindMaestrosByPadreSelect(9, 'id_maestro'), array('title' => 'Seleccione una Hora', 'class' => 'span12 vacio', 'prompt' => 'Seleccione'));
            ?>
        </div>
        <div class="span3">
            <?php
            echo $form->dropDownListRow($model, 'fk_dia', Maestro::FindMaestrosByPadreSelect(1, 'id_maestro'), array('title' => 'Seleccione un dia', 'class' => 'span12 vacio', 'prompt' => 'Seleccione'));
            ?>
        </div>
        <div class="span3">
            <?php
            $criteria = new CDbCriteria;
            $criteria->order = 'piso_aula ASC';
            echo $form->dropDownListRow($model, 'fk_aula', CHtml::listData(Aula::model()->findAll($criteria), 'id_aula', 'piso_aula'), array('title' => 'Seleccione un aula', 'class' => 'span12 vacio', 'prompt' => 'Seleccione'));
            ?>           
        </div>
        <div class="span3">
            <?php
            echo $form->dropDownListRow($model, 'fk_materia', Materia::FindMateriasSeccion($seccion->id_seccion), array('title' => 'Seleccione un aula', 'class' => 'span12 vacio', 'prompt' => 'Seleccione'));
            ?>           
        </div>
    </div>

</div>
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
