<?php
/* @var $this TipoInstitucionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Institucions',
);

$this->menu=array(
	array('label'=>'Create TipoInstitucion', 'url'=>array('create')),
	array('label'=>'Manage TipoInstitucion', 'url'=>array('admin')),
);
?>

<h1>Tipo Institucions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
