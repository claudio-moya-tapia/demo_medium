<?php
/* @var $this EsOptativoController */
/* @var $model EsOptativo */

$this->breadcrumbs=array(
	'Es Optativos'=>array('index'),
	$model->es_optativo_id,
);

$this->menu=array(
	array('label'=>'List EsOptativo', 'url'=>array('index')),
	array('label'=>'Create EsOptativo', 'url'=>array('create')),
	array('label'=>'Update EsOptativo', 'url'=>array('update', 'id'=>$model->es_optativo_id)),
	array('label'=>'Delete EsOptativo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->es_optativo_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EsOptativo', 'url'=>array('admin')),
);
?>

<h1>View EsOptativo #<?php echo $model->es_optativo_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'es_optativo_id',
		'titulo',
	),
)); ?>
