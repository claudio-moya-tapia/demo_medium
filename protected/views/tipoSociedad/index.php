<?php
/* @var $this TipoSociedadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Sociedads',
);

$this->menu=array(
	array('label'=>'Create TipoSociedad', 'url'=>array('create')),
	array('label'=>'Manage TipoSociedad', 'url'=>array('admin')),
);
?>

<h1>Tipo Sociedads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
