<?php
/* @var $this UsuarioCursoController */
/* @var $model UsuarioCurso */

$this->breadcrumbs=array(
	'Usuario Cursos'=>array('index'),
	$model->usuario_cuso_id,
);

$this->menu=array(
	array('label'=>'List UsuarioCurso', 'url'=>array('index')),
	array('label'=>'Create UsuarioCurso', 'url'=>array('create')),
	array('label'=>'Update UsuarioCurso', 'url'=>array('update', 'id'=>$model->usuario_cuso_id)),
	array('label'=>'Delete UsuarioCurso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usuario_cuso_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsuarioCurso', 'url'=>array('admin')),
);
?>

<h1>View UsuarioCurso #<?php echo $model->usuario_cuso_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usuario_cuso_id',
		'usuario_id',
		'curso_id',
		'fecha_creacion',
	),
)); ?>
