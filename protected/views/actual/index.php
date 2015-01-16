<?php
/* @var $this ActualController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actuals',
);

$this->menu=array(
	array('label'=>'Create Actual', 'url'=>array('create')),
	array('label'=>'Manage Actual', 'url'=>array('admin')),
);
?>

<h1>Actuals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
