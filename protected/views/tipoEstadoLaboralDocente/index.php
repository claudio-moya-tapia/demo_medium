<?php
/* @var $this TipoEstadoLaboralDocenteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Estado Laboral Docentes',
);

$this->menu=array(
	array('label'=>'Create TipoEstadoLaboralDocente', 'url'=>array('create')),
	array('label'=>'Manage TipoEstadoLaboralDocente', 'url'=>array('admin')),
);
?>

<h1>Tipo Estado Laboral Docentes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
