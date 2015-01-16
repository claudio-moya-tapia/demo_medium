<?php
/* @var $this IdiomaController */
/* @var $model Idioma */

$this->breadcrumbs=array(
	'Idiomas'=>array('admin'),
	'Crear',
);
?>

<h1>Crear Idioma</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>