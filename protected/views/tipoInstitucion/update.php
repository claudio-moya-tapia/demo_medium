<?php
/* @var $this TipoInstitucionController */
/* @var $model TipoInstitucion */

$this->breadcrumbs=array(
	'Tipo Institucions'=>array('index'),
	$model->tipo_institucion_id=>array('view','id'=>$model->tipo_institucion_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoInstitucion', 'url'=>array('index')),
	array('label'=>'Create TipoInstitucion', 'url'=>array('create')),
	array('label'=>'View TipoInstitucion', 'url'=>array('view', 'id'=>$model->tipo_institucion_id)),
	array('label'=>'Manage TipoInstitucion', 'url'=>array('admin')),
);
?>

<h1>Update TipoInstitucion <?php echo $model->tipo_institucion_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>