<?php
/* @var $this InteresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Interes',
);

$this->menu=array(
	array('label'=>'Create Interes', 'url'=>array('create')),
	array('label'=>'Manage Interes', 'url'=>array('admin')),
);
?>

<h1>Interes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
