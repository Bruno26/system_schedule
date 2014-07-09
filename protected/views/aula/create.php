<?php
$this->breadcrumbs = array(
    'Aulas' => array('index'),
    'Create',
);
$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registrar Aula', 'active' => true, 'url' => $this->createUrl('index')),
        array('label' => 'Administrar Aula', 'active' => false, 'url' => $this->createUrl('admin')),
    ),
        )
);
?>

<h1 align='center'>Registrar Aula</h1><br>
<?php
$this->widget(
        'bootstrap.widgets.TbBox', array(
    'title' => 'Registro de Aula',
    'headerIcon' => 'icon-user',
    'content' => $this->renderPartial('_form', array('model' => $model), TRUE),
        )
);

//echo $this->renderPartial('_form', array('model' => $model)); ?>