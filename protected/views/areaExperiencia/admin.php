<?php
/* @var $this AreaExperienciaController */
/* @var $model AreaExperiencia */

$this->breadcrumbs = array(
    'Area Experiencia' => array('admin'),
    'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#area-experiencia-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Area Experiencia</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'area-experiencia-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(        
        'titulo',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>

<?php echo CHtml::link(CHtml::encode('Crear'), array('create'),array('class'=>'boton-admin')); ?>