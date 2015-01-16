<?php
/* @var $this UsuarioPregradoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Pregrado',
);

$this->menu=array(
	array('label'=>'Create UsuarioPregrado', 'url'=>array('create')),
	array('label'=>'Manage UsuarioPregrado', 'url'=>array('admin')),
);
?>

<h1>Usuario Profesions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
