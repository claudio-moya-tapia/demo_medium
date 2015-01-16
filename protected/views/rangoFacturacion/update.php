<?php
/* @var $this RangoFacturacionController */
/* @var $model RangoFacturacion */

$this->breadcrumbs=array(
	'Facturaciones'=>array('admin'),
	$model->titulo=>array('view','id'=>$model->rango_facturacion_id),
	'Actualizar',
);
?>

<h1>Actualizar Facturacion #<?php echo $model->titulo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>