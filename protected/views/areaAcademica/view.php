<?php
/* @var $this AreaAcademicaController */
/* @var $model AreaAcademica */

$this->breadcrumbs=array(
	'Area Academicas'=>array('index'),
	$model->area_academica_id,
);

$this->menu=array(
	array('label'=>'List AreaAcademica', 'url'=>array('index')),
	array('label'=>'Create AreaAcademica', 'url'=>array('create')),
	array('label'=>'Update AreaAcademica', 'url'=>array('update', 'id'=>$model->area_academica_id)),
	array('label'=>'Delete AreaAcademica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->area_academica_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AreaAcademica', 'url'=>array('admin')),
);
?>

<h1>View AreaAcademica #<?php echo $model->area_academica_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'area_academica_id',
		'titulo',
	),
)); ?>
