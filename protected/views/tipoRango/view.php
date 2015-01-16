<?php
/* @var $this TipoRangoController */
/* @var $model TipoRango */

$this->breadcrumbs=array(
	'Tipo Rangos'=>array('index'),
	$model->tipo_rango_id,
);

$this->menu=array(
	array('label'=>'List TipoRango', 'url'=>array('index')),
	array('label'=>'Create TipoRango', 'url'=>array('create')),
	array('label'=>'Update TipoRango', 'url'=>array('update', 'id'=>$model->tipo_rango_id)),
	array('label'=>'Delete TipoRango', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_rango_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoRango', 'url'=>array('admin')),
);
?>

<h1>View TipoRango #<?php echo $model->tipo_rango_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_rango_id',
		'numero_empleado',
		'utilidad',
		'perdida',
	),
)); ?>
