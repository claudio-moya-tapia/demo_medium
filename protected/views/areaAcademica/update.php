<?php
/* @var $this AreaAcademicaController */
/* @var $model AreaAcademica */

$this->breadcrumbs=array(
	'Area Academicas'=>array('index'),
	$model->area_academica_id=>array('view','id'=>$model->area_academica_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AreaAcademica', 'url'=>array('index')),
	array('label'=>'Create AreaAcademica', 'url'=>array('create')),
	array('label'=>'View AreaAcademica', 'url'=>array('view', 'id'=>$model->area_academica_id)),
	array('label'=>'Manage AreaAcademica', 'url'=>array('admin')),
);
?>

<h1>Update AreaAcademica <?php echo $model->area_academica_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>