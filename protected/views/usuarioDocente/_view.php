<?php
/* @var $this UsuarioDocenteController */
/* @var $data UsuarioDocente */
?>

<div class="view">

      <b><?php echo CHtml::encode($data->getAttributeLabel('usuario_docente_id')); ?>:</b>
      <?php echo CHtml::link(CHtml::encode($data->usuario_docente_id), array('view', 'id'=>$data->usuario_docente_id)); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
      <?php echo CHtml::encode($data->usuario_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('tipo_docente_id')); ?>:</b>
      <?php echo CHtml::encode($data->tipo_docente_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('tipo_area_especialidad_id')); ?>:</b>
      <?php echo CHtml::encode($data->tipo_area_especialidad_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('tipo_estado_laboral_docente_id')); ?>:</b>
      <?php echo CHtml::encode($data->tipo_estado_laboral_docente_id); ?>
      <br />

</div>