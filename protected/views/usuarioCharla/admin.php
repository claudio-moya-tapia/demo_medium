<?php
/* @var $this UsuarioCharlaController */
/* @var $model UsuarioCharla */

$this->breadcrumbs=array(
	'Usuario Charlas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UsuarioCharla', 'url'=>array('index')),
	array('label'=>'Create UsuarioCharla', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-charla-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Usuario Charlas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-charla-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'usuario_charla_id',
		'usuario_id',
		'charla_id',
		'institucion_id',
		'facultad_id',
		'carrera_id',
		/*
		'escuela_id',
		'programa_estudio_id',
		'tipo_charla_id',
		'fecha_creacion',
		'asisto',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
