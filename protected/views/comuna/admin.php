<?php
/* @var $this ComunaController */
/* @var $model Comuna */

$this->breadcrumbs = array(
    'Paises'=>array('pais/admin'),
    'Regiones'=>array('region/admin','id'=>$model->pais_id),
    'Ciudades'=>array('ciudad/admin','pais_id'=>$model->pais_id,'region_id'=>$model->region_id),
    'Comunas',
    'Administrar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comuna-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Comunas de <?php echo $model->ciudad->nombre; ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comuna-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array (
                    'name'=>'pais_id',
                    'value'=>'$data->pais->nombre',
                    'type'=>'text',
                    'filter'=>false,
                ),
                array (
                    'name'=>'region_id',
                    'value'=>'$data->region->nombre',
                    'type'=>'text',
                    'filter'=>false,
                ),
                array (
                    'name'=>'ciudad_id',
                    'value'=>'$data->ciudad->nombre',
                    'type'=>'text',
                    'filter'=>false,
                ),
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php echo CHtml::link(CHtml::encode('Crear'), array('create','id'=>$model->ciudad_id),array('class'=>'boton-admin')); ?>