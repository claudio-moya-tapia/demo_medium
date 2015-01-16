<?php
/* @var $this RangoFacturacionController */
/* @var $model RangoFacturacion */

$this->breadcrumbs=array(
	'Facturaciones'=>array('admin'),
	'Crear',
);
?>

<h1>Crear Facturacion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>