<?php
/* @var $this RangoEmpleadoController */
/* @var $model RangoEmpleado */

$this->breadcrumbs=array(
	'Empleados'=>array('admin'),
	'Crear',
);
?>

<h1>Crear Empleado</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>