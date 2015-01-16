<?php
/* @var $this UsuarioPostgradoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Postgrados',
);

$this->menu=array(
	array('label'=>'Create UsuarioPostgrado', 'url'=>array('create')),
	array('label'=>'Manage UsuarioPostgrado', 'url'=>array('admin')),
);
?>

<h1>Usuario Postgrados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
