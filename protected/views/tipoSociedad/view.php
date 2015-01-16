<?php
/* @var $this TipoSociedadController */
/* @var $model TipoSociedad */

$this->breadcrumbs=array(
	'Tipo Sociedads'=>array('index'),
	$model->tipo_sociedad_id,
);

$this->menu=array(
	array('label'=>'List TipoSociedad', 'url'=>array('index')),
	array('label'=>'Create TipoSociedad', 'url'=>array('create')),
	array('label'=>'Update TipoSociedad', 'url'=>array('update', 'id'=>$model->tipo_sociedad_id)),
	array('label'=>'Delete TipoSociedad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_sociedad_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoSociedad', 'url'=>array('admin')),
);
?>

<h1>View TipoSociedad #<?php echo $model->tipo_sociedad_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_sociedad_id',
		'titulo',
	),
)); ?>
