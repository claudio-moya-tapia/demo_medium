<?php
/* @var $this TipoSociedadController */
/* @var $model TipoSociedad */

$this->breadcrumbs=array(
	'Tipo Sociedads'=>array('index'),
	$model->tipo_sociedad_id=>array('view','id'=>$model->tipo_sociedad_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoSociedad', 'url'=>array('index')),
	array('label'=>'Create TipoSociedad', 'url'=>array('create')),
	array('label'=>'View TipoSociedad', 'url'=>array('view', 'id'=>$model->tipo_sociedad_id)),
	array('label'=>'Manage TipoSociedad', 'url'=>array('admin')),
);
?>

<h1>Update TipoSociedad <?php echo $model->tipo_sociedad_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>