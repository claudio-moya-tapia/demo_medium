<?php
/* @var $this TipoCharlaController */
/* @var $model TipoCharla */

$this->breadcrumbs=array(
	'Tipo Charlas'=>array('index'),
	$model->tipo_charla_id,
);

$this->menu=array(
	array('label'=>'List TipoCharla', 'url'=>array('index')),
	array('label'=>'Create TipoCharla', 'url'=>array('create')),
	array('label'=>'Update TipoCharla', 'url'=>array('update', 'id'=>$model->tipo_charla_id)),
	array('label'=>'Delete TipoCharla', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_charla_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoCharla', 'url'=>array('admin')),
);
?>

<h1>View TipoCharla #<?php echo $model->tipo_charla_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_charla_id',
		'titulo',
	),
)); ?>
