<?php
/* @var $this EsOptativoController */
/* @var $model EsOptativo */

$this->breadcrumbs=array(
	'Es Optativos'=>array('index'),
	$model->es_optativo_id=>array('view','id'=>$model->es_optativo_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EsOptativo', 'url'=>array('index')),
	array('label'=>'Create EsOptativo', 'url'=>array('create')),
	array('label'=>'View EsOptativo', 'url'=>array('view', 'id'=>$model->es_optativo_id)),
	array('label'=>'Manage EsOptativo', 'url'=>array('admin')),
);
?>

<h1>Update EsOptativo <?php echo $model->es_optativo_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>