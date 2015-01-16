<?php
/* @var $this EmpresaRangoController */
/* @var $model EmpresaRango */

$this->breadcrumbs=array(
	'Empresa Rangos'=>array('index'),
	$model->empresa_rango_id,
);

$this->menu=array(
	array('label'=>'List EmpresaRango', 'url'=>array('index')),
	array('label'=>'Create EmpresaRango', 'url'=>array('create')),
	array('label'=>'Update EmpresaRango', 'url'=>array('update', 'id'=>$model->empresa_rango_id)),
	array('label'=>'Delete EmpresaRango', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->empresa_rango_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmpresaRango', 'url'=>array('admin')),
);
?>

<h1>View EmpresaRango #<?php echo $model->empresa_rango_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'empresa_rango_id',
		'empresa_id',
		'tipo_rango_id',
		'rango',
		'orden',
	),
)); ?>
