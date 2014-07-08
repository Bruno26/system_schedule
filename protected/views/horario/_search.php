<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_horario',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_hora',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_dia',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_aula',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_materia',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
