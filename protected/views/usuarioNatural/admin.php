<?php
/* @var $this UsuarioNaturalController */
/* @var $model UsuarioNatural */

$this->breadcrumbs=array(
	'Usuario Naturals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UsuarioNatural', 'url'=>array('index')),
	array('label'=>'Create UsuarioNatural', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-natural-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Usuario Naturals</h1>

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
	'id'=>'usuario-natural-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'usuario_natural_id',
		'usuario_id',
		'estado_civil_id',
		'pais_id',
		'region_id',
		'ciudad_id',
		/*
		'comuna_id',
		'telefono_fijo',
		'telefono_celular',
		'email',
		'imagen',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
