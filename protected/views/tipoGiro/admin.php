<?php
/* @var $this TipoGiroController */
/* @var $model TipoGiro */

$this->breadcrumbs=array(
	'Tipo Giros'=>array('admin'),
	'Administrador',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-giro-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador Tipo Giros</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipo-giro-grid',
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