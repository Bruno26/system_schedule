<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'aula-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Los Campos con <span class="required"> * </span> Son requeridos.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'str_piso',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nu_aula',array('class'=>'span5')); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
