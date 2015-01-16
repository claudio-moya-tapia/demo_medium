<?php
/* @var $this TipoCargoController */
/* @var $model TipoCargo */

$this->breadcrumbs = array(
    'Tipo Cargo' => array('admin'),
    'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-cargo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Tipo Cargo</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'tipo-cargo-grid',
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

<?php echo CHtml::link(CHtml::encode('Crear'), array('create'), array('class' => 'boton-admin')); ?>