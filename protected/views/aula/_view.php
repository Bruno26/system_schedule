<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_aula')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_aula),array('view','id'=>$data->id_aula)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_piso')); ?>:</b>
	<?php echo CHtml::encode($data->str_piso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nu_aula')); ?>:</b>
	<?php echo CHtml::encode($data->nu_aula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('piso_aula')); ?>:</b>
	<?php echo CHtml::encode($data->piso_aula); ?>
	<br />


</div>