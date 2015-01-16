<?php
/* @var $this ProgramaEstudioController */
/* @var $model ProgramaEstudio */

$this->breadcrumbs=array(
	'Programa Estudios'=>array('index'),
	$model->programa_estudio_id=>array('view','id'=>$model->programa_estudio_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProgramaEstudio', 'url'=>array('index')),
	array('label'=>'Create ProgramaEstudio', 'url'=>array('create')),
	array('label'=>'View ProgramaEstudio', 'url'=>array('view', 'id'=>$model->programa_estudio_id)),
	array('label'=>'Manage ProgramaEstudio', 'url'=>array('admin')),
);
?>

<h1>Update ProgramaEstudio <?php echo $model->programa_estudio_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>