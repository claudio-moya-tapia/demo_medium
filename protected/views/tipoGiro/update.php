<?php
/* @var $this TipoGiroController */
/* @var $model TipoGiro */

$this->breadcrumbs=array(
	'Tipo Giros'=>array('index'),
	$model->tipo_giro_id=>array('view','id'=>$model->tipo_giro_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoGiro', 'url'=>array('index')),
	array('label'=>'Create TipoGiro', 'url'=>array('create')),
	array('label'=>'View TipoGiro', 'url'=>array('view', 'id'=>$model->tipo_giro_id)),
	array('label'=>'Manage TipoGiro', 'url'=>array('admin')),
);
?>

<h1>Update TipoGiro <?php echo $model->tipo_giro_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>