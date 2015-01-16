<?php
/* @var $this RangoFacturacionController */
/* @var $model RangoFacturacion */

$this->breadcrumbs = array(
    'Facturaciones' => array('admin'),
    'Administrador',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#rango-facturacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador Facturaciones</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'rango-facturacion-grid',
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
