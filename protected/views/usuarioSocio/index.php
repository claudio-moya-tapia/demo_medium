<?php
/* @var $this UsuarioSocioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Socios',
);

$this->menu=array(
	array('label'=>'Create UsuarioSocio', 'url'=>array('create')),
	array('label'=>'Manage UsuarioSocio', 'url'=>array('admin')),
);
?>

<h1>Usuario Socios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
