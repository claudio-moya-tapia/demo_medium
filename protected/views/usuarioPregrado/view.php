<?php
/* @var $this UsuarioPregradoController */
/* @var $model UsuarioPregrado */

$this->breadcrumbs = array(
    'Usuarios' => array('usuario/admin'),
    'Usuario' => array('usuario/view', 'id' => $model->usuario_id),
    'Usuario Pregrado' => array('list', 'id' => $model->usuario_id),
    $usuario->rut,
);
?>

<h1>Detalle Usuario Pregrado #<?php echo $usuario->rut.' '.$usuario->nombre.' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno; ?></h1>

<ul class="tabs">
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Usuario'), array('usuario/view', 'id' => $usuario->usuario_id)); ?>
    </li>
    <li class="tab">
        <?php echo CHtml::link(CHtml::encode('Usuario Natural'), array('usuarioNatural/view', 'id' => $usuario->usuario_id)); ?>
    </li>
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Usuario Comercial'), array('usuarioComercial/list', 'id' => $usuario->usuario_id)); ?>
    </li>
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Usuario Pregrado'), array('usuarioPregradon/list', 'id' => $usuario->usuario_id), array('class' => 'tab-select')); ?>
    </li>
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Idiomas'), array('usuarioIdioma/list', 'id' => $usuario->usuario_id)); ?>
    </li>
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Intereses'), array('usuarioInteres/list', 'id' => $usuario->usuario_id)); ?>
    </li>
</ul>
<div class="clear"></div>

<div class="form">
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
           'attributes' => array(
            array(
                'label' => 'Usuario',
                'value' => $model->usuario->nombre . ' ' . $model->usuario->apellido_paterno
            ),
            array(
                'label' => 'Institución',
                'value' => $model->institucion->nombre
            ),
            array(
                'label' => 'Carrera',
                'value' => $model->carrera->nombre
            ),
            array(
                'label' => 'Fecha Egreso',
                'value' => $this->stringFormat->applyFecha($model->fecha_egreso)
            ),
            array(
                'label' => 'Fecha Titulación',
                'value' => $this->stringFormat->applyFecha($model->fecha_titulacion)
            ),
        ),
    ));
    ?>

    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id'=>$model->usuario_pregrado_id)); ?>
        </div>        
    </div>
    
</div>