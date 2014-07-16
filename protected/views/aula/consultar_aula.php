<?php
Yii::app()->clientScript->registerScript('Horario', "
    $('#AddHorario').click(function() {
        var hora = $('#Horario_fk_hora').val();
        var horaText  = $('#Horario_fk_hora').children(':selected').text();
        var dia = $('#Horario_fk_dia').val();
        var diaText  = $('#Horario_fk_dia').children(':selected').text();
        var aula = $('#Horario_fk_aula').val();
        var materia = $('#Horario_fk_materia').val();
        
        var datos = 'horaPost='+hora+'&diaPost='+dia+'&aulaPost='+aula;
        
        var conteo = parseInt(0);
        $('.vacio').each(function(){
            if($(this).val()== ''){
                conteo++;
            }
        });
        
        var conteoUnicoHour = parseInt(0);
        $('#ListadoHorario tr').each(function() {
            var horaTable= $(this).find('td:eq(0)').html();
            var diaTable = $(this).find('td:eq(1)').html();
            if(horaTable==horaText && diaTable==diaText){ conteoUnicoHour++; }
        });        
            $.ajax({
                url: '" . CController::createUrl('Horario/BuscarDisponibilidad') . "',
                type: 'POST',
                data: datos,
                async: true,
                dataType: 'json',
                success: function(data) {
                    if(data == 1){
                    bootbox.alert('El Aula esta disponible');
                    }else{
                    bootbox.alert('El Aula no esta disponible');
                    }
                },
                error: function(data) {
                    alert('Ha ocurrido un error');
                }
            })
    });
");

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'horario-form',
    'type' => 'vertical',
    'enableAjaxValidation' => false,
        ));
?>
<div class="info">
        <?php if (isset($error)) {
    Yii::app()->user->setFlash('error', '<strong>Error</strong> ¡Debe seleccionar todos los campos!.');
    $this->widget('bootstrap.widgets.TbAlert', array(
        'block' => true, // display a larger alert block?
        'fade' => true, // use transitions?
        'closeText' => 'x', // close link text - if set to false, no close link is displayed
        'alerts' => array(// configurations per alert type
            'error' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
        ),
    ));
}?>
    </div>
<?php
//$this->breadcrumbs = array(
//    'Registrar',
//);
echo "<br><br><br><br><br>";
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
            $criteria = new CDbCriteria;
            $criteria->order = 'piso_aula ASC';
            echo $form->dropDownListRow($model, 'fk_aula', CHtml::listData(Aula::model()->findAll($criteria), 'id_aula', 'piso_aula'), array('title' => 'Seleccione un aula', 'class' => 'span12 vacio', 'prompt' => 'Seleccione'));
            ?>           
        </div>
  <div class="row-fluid">      
  

<div align="left" class="span6" >
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'button',
        'id' => 'AddHorario',
        'type' => 'primary',
        'label' => 'Consultar',
    ));
    ?>
</div>  
</div>

<?php $this->endWidget(); ?>
