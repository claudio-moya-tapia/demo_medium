<?php
/* @var $this TipoAreaEspecialidadController */
/* @var $model TipoAreaEspecialidad */

$this->breadcrumbs=array(
	'Tipo Area Especialidads'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TipoAreaEspecialidad', 'url'=>array('index')),
	array('label'=>'Create TipoAreaEspecialidad', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-area-especialidad-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tipo Area Especialidads</h1>

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
	'id'=>'tipo-area-especialidad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'tipo_area_especialida_id',
		'titulo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
