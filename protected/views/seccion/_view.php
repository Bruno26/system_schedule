<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_seccion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_seccion),array('view','id'=>$data->id_seccion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_carrera')); ?>:</b>
	<?php echo CHtml::encode($data->fk_carrera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_trayecto')); ?>:</b>
	<?php echo CHtml::encode($data->fk_trayecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_trimestre')); ?>:</b>
	<?php echo CHtml::encode($data->fk_trimestre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nu_seccion')); ?>:</b>
	<?php echo CHtml::encode($data->nu_seccion); ?>
	<br />


</div>