<?php
/* @var $this UsuarioNaturalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Naturals',
);

$this->menu=array(
	array('label'=>'Create UsuarioNatural', 'url'=>array('create')),
	array('label'=>'Manage UsuarioNatural', 'url'=>array('admin')),
);
?>

<h1>Usuario Naturals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
