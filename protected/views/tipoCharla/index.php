<?php
/* @var $this TipoCharlaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Charlas',
);

$this->menu=array(
	array('label'=>'Create TipoCharla', 'url'=>array('create')),
	array('label'=>'Manage TipoCharla', 'url'=>array('admin')),
);
?>

<h1>Tipo Charlas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
