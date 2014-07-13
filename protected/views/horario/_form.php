<?php
Yii::app()->clientScript->registerScript('Horario', "
    $('#AddHorario').click(function() {
        var hora = $('#Horario_fk_hora').val();
        var horaText  = $('#Horario_fk_hora').children(':selected').text();
        var dia = $('#Horario_fk_dia').val();
        var diaText  = $('#Horario_fk_dia').children(':selected').text();
        var aula = $('#Horario_fk_aula').val();
        var materia = $('#Horario_fk_materia').val();
        
        var datos = 'horaPost='+hora+'&diaPost='+dia+'&aulaPost='+aula+'&materiaPost='+materia;
        
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

        if(conteoUnicoHour>=1){bootbox.alert('El Dia seleccionado ya tiene la hora asignada.');return false}
        
            $.ajax({
                url: '" . CController::createUrl('Horario/BuscarDisponibilidad') . "',
                type: 'POST',
                data: datos,
                async: true,
                dataType: 'json',
                success: function(data) {
                    if (data == 1) {
                        //boque para insertar el nuevo horario a la seccion
                        $.ajax({
                               url: '" . CController::createUrl('Horario/RegistrarHorario') . "',
                               type: 'POST',
                               data: datos+'&seccionPost='+$('#Seccion_id_seccion').val(),
                               async: true,
                               dataType: 'json',
                               success: function(data) {
                                   if (data == 1) {
                                        bootbox.alert('Registro con Exito');
                                        $('#ListadoHorario').yiiGridView('update', {//Actualización automatica griewView
                                            data: $(this).serialize()
                                        });
                                        $('#ListadoHorario').yiiGridView('reload');
                                        return false;
                                   }else{
                                       bootbox.alert('El Aula selecciona no esta diponible');return false;
                                   }
                               },
                               error: function(data) {
                                   alert('A ocurrido un error aqui');
                               }
                        })//fin del bloque se insertar 
                    }else{
                        bootbox.alert('El Aula selecciona no esta diponible');return false;
                    }
                },
                error: function(data) {
                    alert('A ocurrido un error');
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
        <div class="span3">
            <?php
            echo $form->dropDownListRow($model, 'fk_materia', Materia::FindMateriasSeccion($seccion->id_seccion), array('title' => 'Seleccione un aula', 'class' => 'span12 vacio', 'prompt' => 'Seleccione'));
            ?>           
        </div>
    </div>

</div>

<div align="right" >
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'button',
        'id' => 'AddHorario',
        'type' => 'primary',
        'label' => 'Agregar',
    ));
    ?>
</div>
<div style="margin-top:20px"></div>
<div class="row-fluid">

    <div class="span12 CC" id="listadoCC">
        <?php
        $model->fk_seccion = $seccion->id_seccion;
        /* GridView que lista a los consejo comunales asociados a una */
        $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'id' => 'ListadoHorario',
            'type' => 'striped bordered',
            'responsiveTable' => true,
            'dataProvider' => $model->search(),
            'columns' => array(
                'fk_hora' => array(
                    'name' => 'fk_hora',
                    'value' => '$data->fkHora->descripcion',
                    'headerHtmlOptions' => array('style' => 'width: 110px; text-align: center'),
                    'htmlOptions' => array('style' => 'text-align: center', 'width' => '10px','class'=>'Hourtext'),
                ),
                'fk_dia' => array(
                    'name' => 'fk_dia',
                    'value' => '$data->fkDia->descripcion',
                    'headerHtmlOptions' => array('style' => 'width: 110px; text-align: center'),
                    'htmlOptions' => array('style' => 'text-align: center', 'width' => '10px','class'=>'Daytext'),
                ),
                'fk_aula' => array(
                    'name' => 'fk_aula',
                    'value' => '$data->fkAula->piso_aula',
                    'headerHtmlOptions' => array('style' => 'width: 110px; text-align: center'),
                    'htmlOptions' => array('style' => 'text-align: center', 'width' => '10px'),
                ),
                'fk_materia' => array(
                    'name' => 'fk_materia',
                    'value' => '$data->fkMateria->str_materia',
                    'headerHtmlOptions' => array('style' => 'width: 110px; text-align: center'),
                    'htmlOptions' => array('style' => 'text-align: center', 'width' => '10px'),
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'header' => 'Acción',
                    'htmlOptions' => array('width' => '1', 'style' => 'text-align: center;'),
                    'template' => '{delete}',
                    'buttons' => array(
                        'delete' => array(
                            'label' => 'Eliminar',
                            'icon' => 'icon-trash',
                            'size' => 'medium',
//                            'url' => '$this->grid->controller->createUrl("SectoresN/delete", array("id"=>$data->id_sectores_n))',
                        ),
                    ),
                ),
            ),
        ));
        ?>
    </div>
</div>
<!--<div width="50%" class="table-responsive">
    <table class="table" id="HorarioCarrera">
        <tr>
            <td class="info"><b>HORA</b></td>
            <td class="info"><b>DIA</b></td>
            <td class="info"><b>AULA</b></td>
            <td class="info"><b>MATERIA</b></td>
            <td class="info"><b>ACCIÓN</b></td>
        </tr>
    </table>
</div>-->



<?php $this->endWidget(); ?>
