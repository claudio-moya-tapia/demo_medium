<?php
/* @var $this UsuarioCursoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Cursos',
);

$this->menu=array(
	array('label'=>'Create UsuarioCurso', 'url'=>array('create')),
	array('label'=>'Manage UsuarioCurso', 'url'=>array('admin')),
);
?>

<h1>Usuario Cursos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
