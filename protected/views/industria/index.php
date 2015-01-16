<?php
/* @var $this IndustriaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Industrias',
);

$this->menu=array(
	array('label'=>'Create Industria', 'url'=>array('create')),
	array('label'=>'Manage Industria', 'url'=>array('admin')),
);
?>

<h1>Industrias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
