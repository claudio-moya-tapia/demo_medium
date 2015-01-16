<?php
/* @var $this TipoNivelEducacionalController */
/* @var $model TipoNivelEducacional */

$this->breadcrumbs=array(
	'Tipo Nivel Educacionals'=>array('index'),
	$model->nivel_educacional_id,
);

$this->menu=array(
	array('label'=>'List TipoNivelEducacional', 'url'=>array('index')),
	array('label'=>'Create TipoNivelEducacional', 'url'=>array('create')),
	array('label'=>'Update TipoNivelEducacional', 'url'=>array('update', 'id'=>$model->nivel_educacional_id)),
	array('label'=>'Delete TipoNivelEducacional', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nivel_educacional_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoNivelEducacional', 'url'=>array('admin')),
);
?>

<h1>View TipoNivelEducacional #<?php echo $model->nivel_educacional_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nivel_educacional_id',
		'titulo',
	),
)); ?>
