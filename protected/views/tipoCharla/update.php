<?php
/* @var $this TipoCharlaController */
/* @var $model TipoCharla */

$this->breadcrumbs=array(
	'Tipo Charlas'=>array('index'),
	$model->tipo_charla_id=>array('view','id'=>$model->tipo_charla_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoCharla', 'url'=>array('index')),
	array('label'=>'Create TipoCharla', 'url'=>array('create')),
	array('label'=>'View TipoCharla', 'url'=>array('view', 'id'=>$model->tipo_charla_id)),
	array('label'=>'Manage TipoCharla', 'url'=>array('admin')),
);
?>

<h1>Update TipoCharla <?php echo $model->tipo_charla_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>