<?php
/* @var $this TipoGiroController */
/* @var $model TipoGiro */

$this->breadcrumbs=array(
	'Tipo Giros'=>array('index'),
	$model->tipo_giro_id,
);

$this->menu=array(
	array('label'=>'List TipoGiro', 'url'=>array('index')),
	array('label'=>'Create TipoGiro', 'url'=>array('create')),
	array('label'=>'Update TipoGiro', 'url'=>array('update', 'id'=>$model->tipo_giro_id)),
	array('label'=>'Delete TipoGiro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_giro_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoGiro', 'url'=>array('admin')),
);
?>

<h1>View TipoGiro #<?php echo $model->tipo_giro_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_giro_id',
		'titulo',
	),
)); ?>
