<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'materia-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Los campos con<span class="required">*</span> son obligatorios.</p><br>

<div class="row-fluid">
    <div>
        <div class="span6">

            <?php
            echo $form->dropDownListRow($model, 'carrera', Maestro::FindMaestrosByPadreSelect(29), array(
                'title' => 'Seleccione una carrera',
                'class' => 'span8 Limpiar',
                'ajax' => array(
                    'type' => 'POST',
                    'url' => CController::createUrl('Materia/BuscarTrayecto'),
                    'update' => '#' . CHtml::activeId($model, 'trayecto'),
                ),
                'prompt' => 'Seleccione'
            ));
            ?>
        </div>
        <div class="span6">
            <?php
            echo $form->dropDownListRow($model, 'trayecto', array(), array(
                'title' => 'Seleccione',
                'class' => 'span8',
                'ajax' => array(
                    'type' => 'POST',
                    'url' => CController::createUrl('Materia/BuscarTrimestre'),
                    'update' => '#' . CHtml::activeId($model, 'trimestre'),
                ),
                'prompt' => 'Seleccione'
            ));
            ?>
        </div>
    </div>
    <div>
        <div class="span6">
            <?php
            echo $form->dropDownListRow($model, 'trimestre', array(), array(
                'title' => 'Seleccione',
                'class' => 'span8',
                'ajax' => array(
                    'type' => 'POST',
                    'url' => CController::createUrl('Materia/BuscarSeccion'),
                    'update' => '#' . CHtml::activeId($model, 'fk_seccion'),
                ),
                'prompt' => 'Seleccione'
            ));
            ?>           
        </div>
        <div class="span6">
            <?php
            echo $form->dropDownListRow($model, 'fk_seccion', array(), array(
                'title' => 'Seleccione',
                'class' => 'span8',
                'prompt' => 'Seleccione'
            ));
            ?>
        </div>
    </div>
    <div>
        <div class="span6">
            <?php
            echo $form->textFieldRow($model, 'str_materia', array('class' => 'span8')); 
            ?>           
        </div>
        <div class="span6">
            <?php echo $form->textFieldRow($model, 'str_corto_materia', array('class' => 'span8')); ?>
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
