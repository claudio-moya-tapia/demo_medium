<?php
/* @var $this UsuarioComercialController */
/* @var $model UsuarioLaboral */

$this->breadcrumbs=array(
	'Usuario Laborals'=>array('index'),
	$model->usuario_laboral_id=>array('view','id'=>$model->usuario_laboral_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsuarioLaboral', 'url'=>array('index')),
	array('label'=>'Create UsuarioLaboral', 'url'=>array('create')),
	array('label'=>'View UsuarioLaboral', 'url'=>array('view', 'id'=>$model->usuario_laboral_id)),
	array('label'=>'Manage UsuarioLaboral', 'url'=>array('admin')),
);
?>

<h1>Update UsuarioLaboral <?php echo $model->usuario_laboral_id; ?></h1>

<?php $this->renderPartial('_form', array(
    'model' => $model,
    'listEmpresa' => $listEmpresa,
    'listIndustria' => $listIndustria,
    'listAreaExperiencia' => $listAreaExperiencia,
    'listCargo' => $listCargo,
        )); ?>