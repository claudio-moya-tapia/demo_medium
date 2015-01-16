<?php
/* @var $this UsuarioLaboralController */
/* @var $model UsuarioLaboral */

$this->breadcrumbs=array(
	'Usuario Laborales'=>array('index'),
	'Manage',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-laboral-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-laboral-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'usuario_laboral_id',
		'usuario_id',
		'empresa_id',
		'industria_id',
		'area_experiencia_id',
		'cargo_id',
                'email',
		/*
		'fecha_ingreso',
		'fecha_egreso',
		'actual_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
