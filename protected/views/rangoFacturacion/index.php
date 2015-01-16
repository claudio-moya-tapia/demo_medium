<?php
/* @var $this RangoFacturacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rango Facturacions',
);

$this->menu=array(
	array('label'=>'Create RangoFacturacion', 'url'=>array('create')),
	array('label'=>'Manage RangoFacturacion', 'url'=>array('admin')),
);
?>

<h1>Rango Facturacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
