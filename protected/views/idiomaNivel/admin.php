<?php
/* @var $this IdiomaNivelController */
/* @var $model IdiomaNivel */

$this->breadcrumbs=array(
	'Idioma Niveles'=>array('admin'),
	'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#idioma-nivel-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Idioma Niveles</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'idioma-nivel-grid',
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
