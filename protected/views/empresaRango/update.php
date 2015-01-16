<?php
/* @var $this EmpresaRangoController */
/* @var $model EmpresaRango */

$this->breadcrumbs=array(
	'Empresa Rangos'=>array('index'),
	$model->empresa_rango_id=>array('view','id'=>$model->empresa_rango_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmpresaRango', 'url'=>array('index')),
	array('label'=>'Create EmpresaRango', 'url'=>array('create')),
	array('label'=>'View EmpresaRango', 'url'=>array('view', 'id'=>$model->empresa_rango_id)),
	array('label'=>'Manage EmpresaRango', 'url'=>array('admin')),
);
?>

<h1>Update EmpresaRango <?php echo $model->empresa_rango_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>