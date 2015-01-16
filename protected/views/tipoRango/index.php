<?php
/* @var $this TipoRangoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Rangos',
);

$this->menu=array(
	array('label'=>'Create TipoRango', 'url'=>array('create')),
	array('label'=>'Manage TipoRango', 'url'=>array('admin')),
);
?>

<h1>Tipo Rangos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
