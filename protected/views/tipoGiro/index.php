<?php
/* @var $this TipoGiroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Giros',
);

$this->menu=array(
	array('label'=>'Create TipoGiro', 'url'=>array('create')),
	array('label'=>'Manage TipoGiro', 'url'=>array('admin')),
);
?>

<h1>Tipo Giros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
