<?php
/* @var $this IdiomaNivelController */
/* @var $model IdiomaNivel */

$this->breadcrumbs=array(
	'Idioma Niveles'=>array('admin'),
	$model->nombre=>array('view','id'=>$model->idioma_nivel_id),
	'Actualizar',
);
?>

<h1>Actualizar Idioma Nivel #<?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>