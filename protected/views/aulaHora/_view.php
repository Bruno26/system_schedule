<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_aula_hora')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id_aula_hora), array('view', 'id' => $data->id_aula_hora)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('fk_dia')); ?>:</b>
    <?php echo CHtml::encode($data->fk_dia); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('fk_aula')); ?>:</b>
    <?php echo CHtml::encode($data->fk_aula); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('fk_hora')); ?>:</b>
    <?php echo CHtml::encode($data->fk_hora); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('es_activo')); ?>:</b>
    <?php echo CHtml::encode($data->es_activo); ?>
    <br />


</div>