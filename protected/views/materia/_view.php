<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_materia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_materia),array('view','id'=>$data->id_materia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_seccion')); ?>:</b>
	<?php echo CHtml::encode($data->fk_seccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_materia')); ?>:</b>
	<?php echo CHtml::encode($data->str_materia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_corto_materia')); ?>:</b>
	<?php echo CHtml::encode($data->str_corto_materia); ?>
	<br />


</div>