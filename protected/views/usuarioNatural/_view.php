<?php
/* @var $this UsuarioNaturalController */
/* @var $data UsuarioNatural */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('usuario_natural_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->usuario_natural_id), array('view', 'id' => $data->usuario_natural_id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
    <?php echo CHtml::encode($data->usuario_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('estado_civil_id')); ?>:</b>
    <?php echo CHtml::encode($data->estado_civil_id); ?>
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

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('telefono_fijo')); ?>:</b>
      <?php echo CHtml::encode($data->telefono_fijo); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('telefono_celular')); ?>:</b>
      <?php echo CHtml::encode($data->telefono_celular); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
      <?php echo CHtml::encode($data->email); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('imagen')); ?>:</b>
      <?php echo CHtml::encode($data->imagen); ?>
      <br />

     */ ?>

</div>