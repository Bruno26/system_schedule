<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'horario-form',
    'type' => 'vertical',
    'enableAjaxValidation' => false,
        ));
?>
<div class="row-fluid">
    <div>
        <div class="span3">
            <?php
            echo $form->dropDownListRow($model, 'fk_hora', Maestro::FindMaestrosByPadreSelect(9, 'id_maestro'), array('title' => 'Seleccione una Hora', 'class' => 'span12', 'prompt' => 'Seleccione'));
            ?>
        </div>
        <div class="span3">
            <?php
            echo $form->dropDownListRow($model, 'fk_dia', Maestro::FindMaestrosByPadreSelect(1, 'id_maestro'), array('title' => 'Seleccione un dia', 'class' => 'span12', 'prompt' => 'Seleccione'));
            ?>
        </div>
        <div class="span3">
            <?php
            $criteria = new CDbCriteria;
            $criteria->order = 'piso_aula ASC';
            echo $form->dropDownListRow($model, 'fk_aula', CHtml::listData(Aula::model()->findAll($criteria), 'id_aula', 'piso_aula'), array('title' => 'Seleccione un aula', 'class' => 'span12', 'prompt' => 'Seleccione'));
            ?>           
        </div>
        <div class="span3">
            <?php
            echo $form->dropDownListRow($model, 'fk_materia', Materia::FindMateriasSeccion($seccion->id_seccion), array('title' => 'Seleccione un aula', 'class' => 'span12', 'prompt' => 'Seleccione'));
            ?>           
        </div>
    </div>

</div>

<div align="right" >
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'button',
        'id' => 'AddHorario',
        'type' => 'primary',
        'label' => 'Agregar',
    ));
    ?>
</div>
<div style="margin-top:20px"></div>

<div width="50%" class="table-responsive">
    <table class="table" id="HorarioCarrera">
        <tr>
            <td class="info"><b>HORA</b></td>
            <td class="info"><b>DIA</b></td>
            <td class="info"><b>AULA</b></td>
            <td class="info"><b>MATERIA</b></td>
            <td class="info"><b>ACCIÓN</b></td>
        </tr>
    </table>
</div>



<?php $this->endWidget(); ?>
