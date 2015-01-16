<?php
/* @var $this CarreraController */
/* @var $model Carrera */

$this->breadcrumbs=array(
	'Carreras'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#carrera-grid').yiiGridView('update', {
		data: $(this).serialize()
	}); 
	return false;
});
");
?>

<h1>Administrador de Carreras</h1>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'carrera-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'carrera_id',
		'nombre',
		'carrera_vertical_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
