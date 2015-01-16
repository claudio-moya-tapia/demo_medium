<?php
/* @var $this UsuarioCharlaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Charlas',
);

$this->menu=array(
	array('label'=>'Create UsuarioCharla', 'url'=>array('create')),
	array('label'=>'Manage UsuarioCharla', 'url'=>array('admin')),
);
?>

<h1>Usuario Charlas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
