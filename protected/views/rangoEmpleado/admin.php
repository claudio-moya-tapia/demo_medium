<?php
/* @var $this RangoEmpleadoController */
/* @var $model RangoEmpleado */

$this->breadcrumbs=array(
	'Empleados'=>array('admin'),
	'Administrador',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#rango-empleado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador Empleados</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rango-empleado-grid',
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