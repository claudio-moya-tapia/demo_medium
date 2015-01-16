<?php
/* @var $this EmpresaController */
/* @var $data Empresa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('empresa_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->empresa_id), array('view', 'id'=>$data->empresa_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais_id')); ?>:</b>
	<?php echo CHtml::encode($data->pais_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region_id')); ?>:</b>
	<?php echo CHtml::encode($data->region_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad_id')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comuna_id')); ?>:</b>
	<?php echo CHtml::encode($data->comuna_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_sociedad_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_sociedad_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('rut')); ?>:</b>
	<?php echo CHtml::encode($data->rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('razon_social')); ?>:</b>
	<?php echo CHtml::encode($data->razon_social); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_postal')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_postal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('giro_id')); ?>:</b>
	<?php echo CHtml::encode($data->giro_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_antiguedad_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_antiguedad_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_empleado_id')); ?>:</b>
	<?php echo CHtml::encode($data->rango_empleado_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_utilidad_id')); ?>:</b>
	<?php echo CHtml::encode($data->rango_utilidad_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_perdida_id')); ?>:</b>
	<?php echo CHtml::encode($data->rango_perdida_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_facturacion_id')); ?>:</b>
	<?php echo CHtml::encode($data->rango_facturacion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_fijo')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_fijo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_celular')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_fax')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_fax); ?>
	<br />

	*/ ?>

</div>