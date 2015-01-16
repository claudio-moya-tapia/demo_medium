<?php
/* @var $this InteresController */
/* @var $model Interes */

$this->breadcrumbs=array(
	'Interes'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#interes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administración de Interes</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'interes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


<?php echo CHtml::link(CHtml::encode('Crear'), array('create'), array('class' => 'boton-admin')); ?>