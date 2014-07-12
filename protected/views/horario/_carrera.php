<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'type' => 'vertical',
        ));
?>
<div class="row-fluid">
    <div>
        <div class="span3">
            <?php echo $form->textFieldRow($seccion, 'fk_carrera', array('readonly' => true, 'value' => $seccion->fkCarrera->descripcion, 'class' => 'span12')); ?>
        </div>
        <div class="span3">
            <?php echo $form->textFieldRow($seccion, 'fk_trayecto', array('readonly' => true, 'value' => $seccion->fkTrayecto->descripcion, 'class' => 'span12')); ?>
        </div>
        <div class="span3">
            <?php echo $form->textFieldRow($seccion, 'fk_trimestre', array('readonly' => true, 'value' => $seccion->fkTrimestre->descripcion, 'class' => 'span12')); ?>
        </div>
        <div class="span3">
            <?php echo $form->textFieldRow($seccion, 'nu_seccion', array('readonly' => true, 'value' => $seccion->nu_seccion, 'class' => 'span12')); ?>
            <?php echo $form->hiddenField($seccion,'id_seccion',array('type'=>"hidden",'value' => $seccion->id_seccion)); ?>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>
