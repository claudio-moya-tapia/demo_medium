<?php
/* @var $this TipoNivelEducacionalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Nivel Educacionals',
);

$this->menu=array(
	array('label'=>'Create TipoNivelEducacional', 'url'=>array('create')),
	array('label'=>'Manage TipoNivelEducacional', 'url'=>array('admin')),
);
?>

<h1>Tipo Nivel Educacionals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
