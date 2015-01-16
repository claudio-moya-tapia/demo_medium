<?php
/* @var $this ClubController */
/* @var $model Club */

$this->breadcrumbs=array(
	'Clubs'=>array('index'),
	$model->club_id,
);

$this->menu=array(
	array('label'=>'List Club', 'url'=>array('index')),
	array('label'=>'Create Club', 'url'=>array('create')),
	array('label'=>'Update Club', 'url'=>array('update', 'id'=>$model->club_id)),
	array('label'=>'Delete Club', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->club_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Club', 'url'=>array('admin')),
);
?>

<h1>View Club #<?php echo $model->club_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'club_id',
		'institucion_id',
		'facultad_id',
		'carrera_id',
		'escuela_id',
		'programa_estudio_id',
		'titulo',
	),
)); ?>
