<?php
/* @var $this TipoInstitucionController */
/* @var $model TipoInstitucion */

$this->breadcrumbs=array(
	'Tipo Institucions'=>array('index'),
	$model->tipo_institucion_id,
);

$this->menu=array(
	array('label'=>'List TipoInstitucion', 'url'=>array('index')),
	array('label'=>'Create TipoInstitucion', 'url'=>array('create')),
	array('label'=>'Update TipoInstitucion', 'url'=>array('update', 'id'=>$model->tipo_institucion_id)),
	array('label'=>'Delete TipoInstitucion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_institucion_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoInstitucion', 'url'=>array('admin')),
);
?>

<h1>View TipoInstitucion #<?php echo $model->tipo_institucion_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_institucion_id',
		'titulo',
	),
)); ?>
