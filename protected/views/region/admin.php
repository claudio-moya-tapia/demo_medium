<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Paises'=>array('pais/admin'),
        'Regiones',
	'Administrar',
);

Yii::app()->clientScript->registerScript('search', "    
$('.search-button').click(function(){        
	$('.search-form').toggle();        
	return false;
});
$('.search-form form').submit(function(){
	$('#region-grid').yiiGridView('update', {
		data: $(this).serialize()
	});        
	return false;
});
");
?>

<h1>Administrar Regiones de <?php echo $model->pais->nombre; ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'region-grid',
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
                    'name'=>'nombre',
                    'value'=>'CHtml::link($data->nombre, array("ciudad/admin","pais_id"=>$data->pais_id,"region_id"=>$data->region_id))',
                    'type'=>'raw',
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php echo CHtml::link(CHtml::encode('Crear'), array('create','id'=>$model->pais_id),array('class'=>'boton-admin')); ?>
