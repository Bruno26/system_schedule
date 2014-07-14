<style>
    table {
        border-collapse: collapse;
    }

    table, th {
        border: 1px solid black;
    }
</style>
<?php
$pdf = Yii::createComponent('application.extensions.MPDF57.mpdf');

$html = '<div align="center">' . $html . '</div>';

$html.='carrera: ' . $carrera->carrera;
$html.='trayecto: ' . str_replace('-', '', $carrera->trayecto);
$html.='seccion: ' . $carrera->seccion;
echo $html;


$footer.= '<div align="center">' . date('Y-m-d') . '</div>';

$mpdf = new mPDF('win-1252', 'LETTER', 7, '', 15, 15, 9, 12, 5, 7);
$mpdf->setAutoTopMargin;
$mpdf->SetHTMLFooter(($footer));
$mpdf->WriteHTML($html);
$mpdf->Output('Horario-' . $carrera->carrera . '-' . str_replace('-', '', $carrera->trayecto) . '-' . $carrera->trimestre . '.pdf', 'D');
exit;
?>