<?php
/* @var $this RangoEmpleadoController */
/* @var $model RangoEmpleado */

$this->breadcrumbs=array(
	'Empleados'=>array('admin'),
	$model->titulo,
);
?>

<h1>Detalle Empleado #<?php echo $model->titulo; ?></h1>

<div class="form">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'titulo',
	),
)); ?>
    
    <div class="botones">
        <div class="btn-izq">
        <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->rango_empleado_id)); ?>
        </div>        
    </div>
</div>