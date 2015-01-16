<?php
/* @var $this TipoCargoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Cargos',
);

$this->menu=array(
	array('label'=>'Create TipoCargo', 'url'=>array('create')),
	array('label'=>'Manage TipoCargo', 'url'=>array('admin')),
);
?>

<h1>Tipo Cargos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
