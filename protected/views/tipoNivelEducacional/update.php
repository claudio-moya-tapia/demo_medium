<?php
/* @var $this TipoNivelEducacionalController */
/* @var $model TipoNivelEducacional */

$this->breadcrumbs=array(
	'Tipo Nivel Educacionals'=>array('index'),
	$model->nivel_educacional_id=>array('view','id'=>$model->nivel_educacional_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoNivelEducacional', 'url'=>array('index')),
	array('label'=>'Create TipoNivelEducacional', 'url'=>array('create')),
	array('label'=>'View TipoNivelEducacional', 'url'=>array('view', 'id'=>$model->nivel_educacional_id)),
	array('label'=>'Manage TipoNivelEducacional', 'url'=>array('admin')),
);
?>

<h1>Update TipoNivelEducacional <?php echo $model->nivel_educacional_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>