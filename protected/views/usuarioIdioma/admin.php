<?php
/* @var $this UsuarioIdiomaController */
/* @var $model UsuarioIdioma */

$this->breadcrumbs=array(
	'Usuario Idiomas'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-idioma-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrados Usuario Idiomas</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-idioma-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'usuario_idioma_id',
		'usuario_id',
		'idioma_id',
		'idioma_nivel_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
