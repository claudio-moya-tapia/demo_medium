<?php
/* @var $this CharlaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Charlas',
);

$this->menu=array(
	array('label'=>'Create Charla', 'url'=>array('create')),
	array('label'=>'Manage Charla', 'url'=>array('admin')),
);
?>

<h1>Charlas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
