<?php
/* @var $this UsuarioPostgradoController */
/* @var $model UsuarioPostgrado */

$this->breadcrumbs=array(
	'Usuario Postgrados'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UsuarioPostgrado', 'url'=>array('index')),
	array('label'=>'Create UsuarioPostgrado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-postgrado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Usuario Postgrados</h1>

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
	'id'=>'usuario-postgrado-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'usuario_postgrado_id',
		'usuario_id',
                'programa_estudio_id',
		'tipo_estado_postgrado_id',
		'tipo_situacion_postgrado_id',
            /*
		'fecha_matricula',
                'fecha_version',
              */
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
