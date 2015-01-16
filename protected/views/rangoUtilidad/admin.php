<?php
/* @var $this RangoUtilidadController */
/* @var $model RangoUtilidad */

$this->breadcrumbs=array(
	'Utilidad'=>array('admin'),
	'Administrador',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#rango-utilidad-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador Utilidad</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rango-utilidad-grid',
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