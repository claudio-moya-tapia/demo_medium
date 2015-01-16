<?php
/* @var $this TipoAreaEspecialidadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Area Especialidads',
);

$this->menu=array(
	array('label'=>'Create TipoAreaEspecialidad', 'url'=>array('create')),
	array('label'=>'Manage TipoAreaEspecialidad', 'url'=>array('admin')),
);
?>

<h1>Tipo Area Especialidads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
