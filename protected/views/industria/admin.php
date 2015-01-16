<?php
/* @var $this IndustriaController */
/* @var $model Industria */

$this->breadcrumbs=array(
	'Industrias'=>array('admin'),
	'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#industria-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Industrias</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'industria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
		'titulo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php echo CHtml::link(CHtml::encode('Crear'), array('create'),array('class'=>'boton-admin')); ?>