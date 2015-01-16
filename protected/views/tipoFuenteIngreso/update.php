<?php
/* @var $this TipoFuenteIngresoController */
/* @var $model TipoFuenteIngreso */

$this->breadcrumbs = array(
    'Tipo Fuente Ingresos' => array('admin'),
    $model->titulo => array('view', 'id' => $model->tipo_fuente_ingreso_id),
    'Actualizar',
);
?>

<h1>Actualizar TipoFuenteIngreso #<?php echo $model->titulo; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>