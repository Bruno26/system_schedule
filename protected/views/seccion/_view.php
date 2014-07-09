<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_seccion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_seccion),array('view','id'=>$data->id_seccion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_carrares')); ?>:</b>
	<?php echo CHtml::encode($data->str_carrares); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nu_trimestre')); ?>:</b>
	<?php echo CHtml::encode($data->nu_trimestre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nu_seccion')); ?>:</b>
	<?php echo CHtml::encode($data->nu_seccion); ?>
	<br />


</div>