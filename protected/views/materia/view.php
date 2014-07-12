<?php
$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registra', 'active' => false, 'url' => $this->createUrl('create')),
        array('label' => 'Ver', 'active' => true),
        array('label' => 'Administrar Materias', 'active' => false, 'url' => $this->createUrl('admin')),
    ),
        )
);
?>

<h1 align="center">Detalle de la Materia </h1>
<div width="50%" class="table-responsive">
    <table class="table">
        <tr>
            <td class="info"><b>CARRERA</b></td>
            <td class="active"><?= $model->carrera ?></td>
        </tr>
        <tr>
            <td class="info"><b>TRAYECTO</b></td>
            <td class="active"><?= $model->trayecto ?></td>
        </tr>
        <tr>
            <td class="info"><b>TRIMESTRE</b></td>
            <td class="active"><?= $model->trimestre ?></td>
        </tr>
        <tr>
            <td class="info"><b>SECCION</b></td>
            <td class="active"><?= $model->seccion ?></td>
        </tr>
        <tr>
            <td class="info"><b>MATERIA</b></td>
            <td class="active"><?= $model->str_materia ?></td>
        </tr>
    </table>
</div>

