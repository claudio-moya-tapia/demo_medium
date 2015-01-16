<?php
/* @var $this ProgramaEstudioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Programa Estudios',
);

$this->menu=array(
	array('label'=>'Create ProgramaEstudio', 'url'=>array('create')),
	array('label'=>'Manage ProgramaEstudio', 'url'=>array('admin')),
);
?>

<h1>Programa Estudios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
