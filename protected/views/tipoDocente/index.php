<?php
/* @var $this TipoDocenteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Docentes',
);

$this->menu=array(
	array('label'=>'Create TipoDocente', 'url'=>array('create')),
	array('label'=>'Manage TipoDocente', 'url'=>array('admin')),
);
?>

<h1>Tipo Docentes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
