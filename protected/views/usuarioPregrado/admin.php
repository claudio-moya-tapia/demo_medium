<?php
/* @var $this UsuarioProfesionController */
/* @var $model UsuarioProfesion */

$this->breadcrumbs=array(
	'Usuario Pregrado'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UsuarioPregrado', 'url'=>array('index')),
	array('label'=>'Create UsuarioPregrado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-pregrado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador Usuario Pregrado</h1>

<p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-profesion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'usuario_pregrado_id',
		'usuario_id',
		'institucion_id',
		'carrera_id',
		/*
		'fecha_egreso',
		'fecha_titulacion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
