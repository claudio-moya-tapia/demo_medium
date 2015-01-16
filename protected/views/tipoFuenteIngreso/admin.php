<?php
/* @var $this TipoFuenteIngresoController */
/* @var $model TipoFuenteIngreso */

$this->breadcrumbs=array(
	'Tipo Fuente Ingresos'=>array('admin'),
	'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-fuente-ingreso-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Tipo Fuente Ingresos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipo-fuente-ingreso-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
		'titulo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php echo CHtml::link(CHtml::encode('Crear'), array('create'), array('class' => 'boton-admin')); ?>