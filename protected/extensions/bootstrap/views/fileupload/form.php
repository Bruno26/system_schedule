<?php echo CHtml::beginForm($this->url, 'post', $this->htmlOptions); ?>

<!--<h3>Digitalización de Documentos</h3>-->

<div class="fileupload-buttonbar">

    <!-- The fileinput-button span is used to style the file input field as button -->
    <span id='BtnAdjuntar' style='float:right; margin-right: 30px;' class="btn btn-success fileinput-button"> <i class="icon-plus icon-white"></i>
        <span>Agregar Archivos...</span>
        <?php
        if ($this->hasModel()) :
            echo CHtml::activeFileField($this->model, $this->attribute, $htmlOptions) . "\n";
        else :
            echo CHtml::fileField($name, $this->value, $htmlOptions) . "\n";
        endif;
//            echo '<pre>';var_dump($htmlOptions);die;
        ?>

    </span>
    <!--div class="row-fluid" style="margin-top:1%;">
<div class="span3">
    <?php //echo $form->labelEx($model, 'fk_tipo_documento'); ?>
    <?php //echo $form->dropDownList($model, 'fk_tipo_documento', CHtml::listData(Maestro::model()->findAll('padre=:padre', array(':padre' => '84')), 'id_maestro', 'descripcion'), array('empty' => 'Seleccione..', 'title' => 'Seleccione un tipo de documento'), array('class' => 'span6'));
    ?>
</div>

</div-->

    <!--        <button type="submit" class="btn btn-primary start">
                <i class="icon-upload icon-white"></i>
                <span>Iniciar Carga</span>
            </button>-->
    <!--        <button type="reset" class="btn btn-warning cancel">
                <i class="icon-ban-circle icon-white"></i>
                <span>Cancelar</span>
            </button>
            <button type="button" class="btn btn-danger delete">
                <i class="icon-trash icon-white"></i>
                <span>Eliminar</span>
            </button>-->

        <!--<input type="checkbox" class="toggle">-->

    <div class="span5 fileupload-progress fade">
        <!-- The global progress bar -->

        <div class="progress progress-success progress-striped active" role="progressbar">
            <div class="bar" style="width:0;"></div>
        </div>
        <!-- The extended global progress information -->
        <div class="progress-extended">&nbsp;</div>
    </div>
</div>
<!-- The loading indicator is shown during image processing -->
<div class="fileupload-loading"></div>
<br>
<!-- The table listing the files available for upload/download -->
<div class="row-fluid">
    <table class="table table-striped">
        <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody>
    </table>
</div>
<?php echo CHtml::endForm(); ?>


