<?php
/* @var $this UsuarioInteresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Interes',
);

$this->menu=array(
	array('label'=>'Create UsuarioInteres', 'url'=>array('create')),
	array('label'=>'Manage UsuarioInteres', 'url'=>array('admin')),
);
?>

<h1>Usuario Interes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
