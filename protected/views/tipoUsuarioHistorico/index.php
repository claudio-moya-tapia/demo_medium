<?php
/* @var $this TipoUsuarioHistoricoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Usuario Historicos',
);

$this->menu=array(
	array('label'=>'Create TipoUsuarioHistorico', 'url'=>array('create')),
	array('label'=>'Manage TipoUsuarioHistorico', 'url'=>array('admin')),
);
?>

<h1>Tipo Usuario Historicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
