<?php
/* @var $this IdiomaNivelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Idioma Nivels',
);

$this->menu=array(
	array('label'=>'Create IdiomaNivel', 'url'=>array('create')),
	array('label'=>'Manage IdiomaNivel', 'url'=>array('admin')),
);
?>

<h1>Idioma Nivels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
