<?php
/* @var $this AreaExperienciaController */
/* @var $model AreaExperiencia */

$this->breadcrumbs=array(
	'Area Experiencia'=>array('admin'),
	$model->titulo=>array('view','id'=>$model->area_experiencia_id),
	'Actualizar',
);
?>

<h1>Actualizar Area Experiencia #<?php echo $model->titulo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>