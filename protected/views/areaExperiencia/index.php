<?php
/* @var $this AreaExperienciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Area Experiencia',
);

$this->menu=array(
	array('label'=>'Create AreaExperiencia', 'url'=>array('create')),
	array('label'=>'Manage AreaExperiencia', 'url'=>array('admin')),
);
?>

<h1>Area Experiencia</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
