<?php
/* @var $this TipoEstadoUsuarioHistoricoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Estado Usuario Historicos',
);

$this->menu=array(
	array('label'=>'Create TipoEstadoUsuarioHistorico', 'url'=>array('create')),
	array('label'=>'Manage TipoEstadoUsuarioHistorico', 'url'=>array('admin')),
);
?>

<h1>Tipo Estado Usuario Historicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
