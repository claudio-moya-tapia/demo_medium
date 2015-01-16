<?php
/* @var $this TipoSituacionPostgradoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Situacion Postgrados',
);

$this->menu=array(
	array('label'=>'Create TipoSituacionPostgrado', 'url'=>array('create')),
	array('label'=>'Manage TipoSituacionPostgrado', 'url'=>array('admin')),
);
?>

<h1>Tipo Situacion Postgrados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
