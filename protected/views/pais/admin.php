<?php
/* @var $this PaisController */
/* @var $model Pais */

$this->breadcrumbs = array(
    'Paises' => array('admin'),
    'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pais-grid').yiiGridView('update', {
//		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Paises</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'pais-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'nombre',
            'value' => 'CHtml::link($data->nombre, array("region/admin","id"=>$data->pais_id))',
            'type' => 'raw',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>

<?php echo CHtml::link(CHtml::encode('Crear'), array('create'), array('class' => 'boton-admin')); ?>