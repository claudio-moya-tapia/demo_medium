<?php
/* @var $this UsuarioIdiomaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuario Idiomas',
);

$this->menu=array(
	array('label'=>'Create UsuarioIdioma', 'url'=>array('create')),
	array('label'=>'Manage UsuarioIdioma', 'url'=>array('admin')),
);
?>

<h1>Usuario Idiomas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
