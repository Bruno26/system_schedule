<?php
$this->widget(
        'bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Registra', 'active' => false, 'url' => $this->createUrl('create')),
        array('label' => 'Ver', 'active' => true),
        array('label' => 'Actualizar Sección', 'url' => array('update', 'id' => $model->id_seccion)),
        array('label' => 'Administrar Sección', 'active' => false, 'url' => $this->createUrl('admin')),
    ),
        )
);
?>

<h1 align="center">Detalle de la Seccion</h1>
<div width="50%" class="table-responsive">
    <table class="table">
        <tr>
            <td class="info"><b>CARRERA</b></td>
            <td class="active"><?= $model->fkCarrera->descripcion ?></td>
        </tr>
        <tr>
            <td class="info"><b>TRAYECTO</b></td>
            <td class="active"><?= $model->fkTrayecto->descripcion ?></td>
        </tr>
        <tr>
            <td class="info"><b>TRIMESTRE</b></td>
            <td class="active"><?= $model->fkTrimestre->descripcion ?></td>
        </tr>
        <tr>
            <td class="info"><b>SECCION</b></td>
            <td class="active"><?= $model->nu_seccion ?></td>
        </tr>
    </table>
</div>



