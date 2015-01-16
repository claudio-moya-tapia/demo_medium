<?php
/* @var $this RangoEmpleadoController */
/* @var $model RangoEmpleado */

$this->breadcrumbs=array(
	'Empleados'=>array('admin'),
	$model->titulo=>array('view','id'=>$model->rango_empleado_id),
	'Actualizar',
);
?>

<h1>Actualizar Empleado <?php echo $model->titulo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>