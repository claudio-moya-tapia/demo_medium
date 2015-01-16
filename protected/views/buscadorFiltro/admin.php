<?php
/* @var $this BuscadorFiltroController */
/* @var $model BuscadorFiltro */

$this->breadcrumbs=array(
	'Buscador Filtros'=>array('admin'),
	'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#buscador-filtro-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Filtros de Buscador</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'buscador-filtro-grid',
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