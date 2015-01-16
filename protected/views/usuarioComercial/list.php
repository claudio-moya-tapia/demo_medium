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
foreach ($aryUsuarioComercial as $UsuarioComercial) {

    
    $this->widget('zii.widgets.CDetailView', array(        
        'data' => $UsuarioComercial,
        'attributes' => array(              
            array(
                'label' => 'Usuario',
                'value' => $UsuarioComercial->usuario->nombre . ' ' . $UsuarioComercial->usuario->apellido_paterno
            ),
            array(
                'label' => 'Tipo Empleo',
                'value' => $UsuarioComercial->actual->titulo
            ),
            array(
                'label' => 'Empresa',
                'value' => $UsuarioComercial->empresa->nombre
            ),
            array(
                'label' => 'Email',
                'value' => $UsuarioComercial->email
            ),
            array(
                'label' => 'Sector Industrial',
                'value' => $UsuarioComercial->industria->titulo
            ),
            array(
                'label' => 'Área experiencia',
                'value' => $UsuarioComercial->area_experiencia->titulo
            ),
            array(
                'label' => 'Cargo',
                'value' => $UsuarioComercial->cargo->titulo
            ),
            array(
                'label' => 'Fecha Ingreso',
                'value' => $this->stringFormat->applyFecha($UsuarioComercial->fecha_ingreso)
            ),
            array(
                'label' => 'Fecha Egreso',
                'value' => $this->stringFormat->applyFecha($UsuarioComercial->fecha_egreso)
            ),
        ),
    ));
    
    echo CHtml::link(CHtml::encode('Actualizar Usuario Laboral'), array('update', 'id'=>$UsuarioComercial->usuario_laboral_id),array('class'=>'boton-2'));
    echo '<hr>';
    
}
?>
    
    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Crear'), array('create', 'id'=>$usuario->usuario_id)); ?>
        </div>        
    </div>

</div>