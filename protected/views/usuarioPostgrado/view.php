<?php
/* @var $this UsuarioPostgradoController */
/* @var $model UsuarioPostgrado */

$this->breadcrumbs=array(
        'Usuarios' => array('usuario/admin'),
        'Usuario' => array('usuario/view', 'id' => $model->usuario_id),
        'Usuario Postgrados' => array('list', 'id' => $model->usuario_id),
        $usuario->rut,
);

?>

<h1>Detalle Usuario PostGrado #<?php echo $usuario->rut.' '.$usuario->nombre.' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno; ?></h1>

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
        <?php echo CHtml::link(CHtml::encode('Usuario Profesión'), array('usuarioProfesion/list', 'id' => $usuario->usuario_id), array('class' => 'tab-select')); ?>
    </li>
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Idiomas'), array('usuarioIdioma/list', 'id' => $usuario->usuario_id)); ?>
    </li>
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Intereses'), array('usuarioInteres/list', 'id' => $usuario->usuario_id)); ?>
    </li>
</ul>

<div class="clear"></div>
    <?php 
    $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	   'attributes' => array(
            array(
                'label' => 'Usuario',
                'value' => $model->usuario->nombre . ' ' . $model->usuario->apellido_paterno
            ),
            array(
                'label' => 'Programa Estudio',
                'value' => $model->programa_estudio_id->titulo
            ),
            array(
                'label' => 'Estado',
                'value' => $model->tipo_estado_postgrado->nombre
            ),
            array(
                'label' => 'Situacion',
                'value' => $model->tipo_situacion_postgrado->nombre
            ),
            array(
                'label' => 'Fecha Matricula',
                'value' => $this->stringFormat->applyFecha($model->fecha_matricula)
            ),
               array(
                'label' => 'Fecha Version',
                'value' => $this->stringFormat->applyFecha($model->fecha_version)
            ),
        ),
)); ?>
