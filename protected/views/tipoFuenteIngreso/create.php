<?php
/* @var $this TipoFuenteIngresoController */
/* @var $model TipoFuenteIngreso */

$this->breadcrumbs = array(
    'Tipo Fuente Ingresos' => array('admin'),
    'Crear',
);
?>

<h1>Crear Tipo Fuente Ingreso</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>