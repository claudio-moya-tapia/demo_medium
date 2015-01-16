<?php
/* @var $this UsuarioComercialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Laborals',
);

$this->menu=array(
	array('label'=>'Create UsuarioLaboral', 'url'=>array('create')),
	array('label'=>'Manage UsuarioLaboral', 'url'=>array('admin')),
);
?>

<h1>Usuario Laborals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
