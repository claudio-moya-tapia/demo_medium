<?php
/* @var $this IdentidadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Identidads',
);

$this->menu=array(
	array('label'=>'Create Identidad', 'url'=>array('create')),
	array('label'=>'Manage Identidad', 'url'=>array('admin')),
);
?>

<h1>Identidads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
