<?php
/* @var $this RangoPerdidaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rango Perdidas',
);

$this->menu=array(
	array('label'=>'Create RangoPerdida', 'url'=>array('create')),
	array('label'=>'Manage RangoPerdida', 'url'=>array('admin')),
);
?>

<h1>Rango Perdidas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
