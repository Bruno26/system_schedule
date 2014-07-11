<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'horario-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'fk_seccion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fk_hora',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fk_aula',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fk_materia',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fk_dia',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'es_activo'); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
