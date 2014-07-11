<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_seccion',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_carrera',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_trayecto',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fk_trimestre',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'nu_seccion',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
