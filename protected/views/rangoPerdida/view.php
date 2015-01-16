<?php
/* @var $this RangoPerdidaController */
/* @var $model RangoPerdida */

$this->breadcrumbs=array(
	'Perdidas'=>array('admin'),
	$model->titulo,
);
?>

<h1>Detalle RangoPerdida #<?php echo $model->titulo; ?></h1>

<div class="form">    
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'titulo',
	),
)); ?>

    <div class="botones">
        <div class="btn-izq">
        <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->rango_perdida_id)); ?>
        </div>        
    </div>
</div>
