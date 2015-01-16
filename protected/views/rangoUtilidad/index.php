<?php
/* @var $this RangoUtilidadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rango Utilidads',
);

$this->menu=array(
	array('label'=>'Create RangoUtilidad', 'url'=>array('create')),
	array('label'=>'Manage RangoUtilidad', 'url'=>array('admin')),
);
?>

<h1>Rango Utilidads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
