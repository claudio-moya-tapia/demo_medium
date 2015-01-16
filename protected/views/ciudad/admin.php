<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs = array(
    'Paises'=>array('pais/admin'),
    'Regiones'=>array('region/admin','id'=>$model->pais_id),
    'Ciudades',
    'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ciudad-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Ciudades de <?php echo $model->region->nombre; ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'ciudad-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'pais_id',
            'value' => '$data->pais->nombre',
            'type' => 'text',
            'filter'=>false,
        ),
        array(
            'name' => 'region_id',
            'value' => '$data->region->nombre',
            'type' => 'text',
            'filter'=>false,
        ),
        array(
            'name' => 'nombre',
            'value' => 'CHtml::link($data->nombre, array("comuna/admin","pais_id"=>$data->pais_id,"region_id"=>$data->region_id,"ciudad_id"=>$data->ciudad_id))',
            'type' => 'raw',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>

<?php echo CHtml::link(CHtml::encode('Crear'), array('create','id'=>$model->region_id),array('class'=>'boton-admin')); ?>