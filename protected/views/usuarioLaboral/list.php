<?php
/* @var $this UsuarLaboralController */
/* @var $usuario Usuario */
/* @var $UsuarioLaboral UsuarioLaboral */

$this->breadcrumbs = array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view','id' => $usuario->usuario_id),
    $usuario->rut,
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $usuario
));
?>

<div class="form">
<?php
foreach ($aryUsuarioLaboral as $UsuarioLaboral) {

    
    $this->widget('zii.widgets.CDetailView', array(        
        'data' => $UsuarioLaboral,
        'attributes' => array(              
            array(
                'label' => 'Usuario',
                'value' => $UsuarioLaboral->usuario->nombre . ' ' . $UsuarioLaboral->usuario->apellido_paterno
            ),
            array(
                'label' => 'Tipo Empleo',
                'value' => $UsuarioLaboral->actual->titulo
            ),
            array(
                'label' => 'Empresa',
                'value' => $UsuarioLaboral->empresa->nombre
            ),
            array(
                'label' => 'Email',
                'value' => $UsuarioLaboral->email
            ),
            array(
                'label' => 'Sector Industrial',
                'value' => $UsuarioLaboral->industria->titulo
            ),
            array(
                'label' => 'Área experiencia',
                'value' => $UsuarioLaboral->area_experiencia->titulo
            ),
            array(
                'label' => 'Cargo',
                'value' => $UsuarioLaboral->cargo->titulo
            ),
            array(
                'label' => 'Fecha Ingreso',
                'value' => $this->stringFormat->applyFecha($UsuarioLaboral->fecha_ingreso)
            ),
            array(
                'label' => 'Fecha Egreso',
                'value' => $this->stringFormat->applyFecha($UsuarioLaboral->fecha_egreso)
            ),
        ),
    ));
    
    echo CHtml::link(CHtml::encode('Actualizar Usuario Laboral'), array('update', 'id'=>$UsuarioLaboral->usuario_laboral_id),array('class'=>'boton-2'));
    echo '<hr>';
    
}
?>
    
    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Crear'), array('create', 'id'=>$usuario->usuario_id)); ?>
        </div>        
    </div>

</div>