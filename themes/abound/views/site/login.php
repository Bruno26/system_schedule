<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
?>

<div style="margin-top: 80px"></div>
<div class="page-header">
    <h1 align="center"><i>Iniciar Sesión</i></h1>
</div>
<div class="row-fluid">

    <div class="span6 offset3">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => "Acceso",
        ));
        ?>



        <!--<p>Please fill out the following form with your login credentials:</p>-->

        <div class="form">
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'login-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

            <p class="note">Los campos son obligatorios.</p>

            <div class="row-fluid">
                <div class="span6">

                    <?php echo $form->labelEx($model, 'Usuario'); ?>
                    <?php echo $form->textField($model, 'username'); ?>
                    <?php echo $form->error($model, 'username'); ?>
                </div>
                <div class="span6">

                    <?php echo $form->labelEx($model, 'Contraseña'); ?>
                    <?php echo $form->passwordField($model, 'password'); ?>
                    <?php echo $form->error($model, 'password'); ?>
                </div>

            </div><br><br> 


            <div class="row buttons" align="center">
                <?php echo CHtml::submitButton('Iniciar', array('class' => 'btn btn btn-primary')); ?>
            </div>

            <?php $this->endWidget(); ?>
        </div><!-- form -->

        <?php $this->endWidget(); ?>

    </div>

</div>