<?php
/* @var $this IdiomaController */
/* @var $model Idioma */

$this->breadcrumbs=array(
	'Idiomas'=>array('admin'),
	$model->nombre=>array('view','id'=>$model->idioma_id),
	'Actualizar',
);
?>

<h1>Actualizar Idioma #<?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>