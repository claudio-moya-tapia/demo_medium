<?php
/* @var $this TipoAntiguedadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Antiguedads',
);

$this->menu=array(
	array('label'=>'Create TipoAntiguedad', 'url'=>array('create')),
	array('label'=>'Manage TipoAntiguedad', 'url'=>array('admin')),
);
?>

<h1>Tipo Antiguedads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
