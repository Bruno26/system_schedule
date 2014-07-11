<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'seccion-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Los campos con<span class="required">*</span> son obligatorios.</p><br>

<div class="row-fluid">
    <div>
        <div class="span6">

            <?php
            echo $form->dropDownListRow($model, 'fk_carrera', Maestro::FindMaestrosByPadreSelect(29), array('title' => 'Seleccione un estado', 'class' => 'span8', 'prompt' => 'Seleccione'));
            ?>
        </div>
        <div class="span6">
            <?php
            echo $form->dropDownListRow($model, 'fk_trayecto', Maestro::FindMaestrosByPadreSelect(35), array('title' => 'Seleccione un estado', 'class' => 'span8', 'prompt' => 'Seleccione'));
            ?>
        </div>
    </div>
    <div>
        <div class="span6">
            <?php
            echo $form->dropDownListRow($model, 'fk_trimestre', Maestro::FindMaestrosByPadreSelect(40), array('title' => 'Seleccione un estado', 'class' => 'span8', 'prompt' => 'Seleccione'));
            ?>           
        </div>
        <div class="span6">
            <?php echo $form->textFieldRow($model, 'nu_seccion', array('class' => 'span8')); ?>
        </div>
    </div>

</div>
<div>

    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? 'Guardar' : 'Guardar',
        ));
        ?>
    </div>
</div>

<?php $this->endWidget(); ?>
