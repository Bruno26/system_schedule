<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'horario-form',
    'type' => 'vertical',
    'enableAjaxValidation' => false,
        ));
?>

<?php
//$this->breadcrumbs = array(
//    'Registrar',
//);
$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Consultar Aulas Disponibles', 'active' => true, 'url' => $this->createUrl('consultar')),
        array('label' => 'Ver Aulas Registradas', 'active' => false, 'url' => $this->createUrl('admin')),
        array('label' => 'Registrar Aulas', 'active' => false, 'url' => $this->createUrl('create')),
    ),
        )
);
?>
<div class="info">
        <?php if (isset($error)) {
    Yii::app()->user->setFlash('succes', '<strong>Atención</strong> ¡No existen aulas registradas para el día '.$dia.' de '.$hora);
    $this->widget('bootstrap.widgets.TbAlert', array(
        'block' => true, // display a larger alert block?
        'fade' => true, // use transitions?
        'closeText' => 'x', // close link text - if set to false, no close link is displayed
        'alerts' => array(// configurations per alert type
            'succes' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
        ),
    ));
}?>
    </div>
<div class="row-fluid">
    <div>
        <div class="span3">
            <?php
            echo $form->dropDownListRow($model, 'fk_hora', Maestro::FindMaestrosByPadreSelect(9, 'id_maestro'), array('title' => 'Seleccione una Hora', 'class' => 'span12 vacio', 'prompt' => 'Seleccione'));
            ?>
        </div>
        <div class="span3">
            <?php
            echo $form->dropDownListRow($model, 'fk_dia', Maestro::FindMaestrosByPadreSelect(1, 'id_maestro'), array('title' => 'Seleccione un dia', 'class' => 'span12 vacio', 'prompt' => 'Seleccione'));
            ?>
        </div>
        <div class="span3">
            <?php
            //$criteria = new CDbCriteria;
            //$criteria->order = 'piso_aula ASC';
            //echo $form->dropDownListRow($model, 'fk_aula', CHtml::listData(Aula::model()->findAll($criteria), 'id_aula', 'piso_aula'), array('title' => 'Seleccione un aula', 'class' => 'span12 vacio', 'prompt' => 'Seleccione'));
            ?>           
        </div>     
  
<div align="left" class="span6" >
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'id' => 'AddHorario',
        'type' => 'primary',
        'label' => 'Consultar',
    ));
    ?> 
</div>
<?php
$this->widget(
        'bootstrap.widgets.TbBox', array(
    'title' => 'Lista de aulas Disponibles',
    'content' => $this->renderPartial('_disponibles', array('html' =>$html), true)
        )
);
?>
<?php $this->endWidget(); ?>
