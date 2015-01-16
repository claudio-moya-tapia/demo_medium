<?php
/* @var $this TipoRangoController */
/* @var $model TipoRango */

$this->breadcrumbs=array(
	'Tipo Rangos'=>array('index'),
	$model->tipo_rango_id=>array('view','id'=>$model->tipo_rango_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoRango', 'url'=>array('index')),
	array('label'=>'Create TipoRango', 'url'=>array('create')),
	array('label'=>'View TipoRango', 'url'=>array('view', 'id'=>$model->tipo_rango_id)),
	array('label'=>'Manage TipoRango', 'url'=>array('admin')),
);
?>

<h1>Update TipoRango <?php echo $model->tipo_rango_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>