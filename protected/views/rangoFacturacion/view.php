<?php
/* @var $this RangoFacturacionController */
/* @var $model RangoFacturacion */

$this->breadcrumbs=array(
	'Facturaciones'=>array('admin'),
	$model->titulo,
);
?>

<h1>Detalle Facturacion #<?php echo $model->titulo; ?></h1>

<div class="form">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'titulo',
	),
)); ?>

    <div class="botones">
        <div class="btn-izq">
        <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->rango_facturacion_id)); ?>
        </div>        
    </div>
</div>
