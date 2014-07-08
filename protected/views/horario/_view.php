<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_horario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_horario),array('view','id'=>$data->id_horario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_hora')); ?>:</b>
	<?php echo CHtml::encode($data->fk_hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_dia')); ?>:</b>
	<?php echo CHtml::encode($data->fk_dia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_aula')); ?>:</b>
	<?php echo CHtml::encode($data->fk_aula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_materia')); ?>:</b>
	<?php echo CHtml::encode($data->fk_materia); ?>
	<br />


</div>