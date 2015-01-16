<?php
/* @var $this EsOptativoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Es Optativos',
);

$this->menu=array(
	array('label'=>'Create EsOptativo', 'url'=>array('create')),
	array('label'=>'Manage EsOptativo', 'url'=>array('admin')),
);
?>

<h1>Es Optativos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
