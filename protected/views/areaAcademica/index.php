<?php
/* @var $this AreaAcademicaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Area Academicas',
);

$this->menu=array(
	array('label'=>'Create AreaAcademica', 'url'=>array('create')),
	array('label'=>'Manage AreaAcademica', 'url'=>array('admin')),
);
?>

<h1>Area Academicas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
