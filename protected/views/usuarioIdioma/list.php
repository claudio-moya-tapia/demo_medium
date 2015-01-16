<?php
/* @var $this UsuarioIdiomaController */
/* @var $usuario Usuario */
/* @var $UsuarioIdioma UsuarioIdioma */

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
foreach ($aryUsuarioIdioma as $UsuarioIdioma) {

    $this->widget('zii.widgets.CDetailView', array(        
        'data' => $aryUsuarioIdioma,
        'attributes' => array(                         
            array(
                'label' => 'Idioma',
                'value' => $UsuarioIdioma->idioma->nombre
            ),
            
            array(
                'label' => 'Nivel del idioma',
                'value' => $UsuarioIdioma->idiomanivel->nombre
            )
        ),
    ));
    
    echo CHtml::link(CHtml::encode('Actualizar Usuario Idioma'), array('update', 'id'=>$UsuarioIdioma->usuario_idioma_id),array('class'=>'boton-2'));
    
    echo '<hr>';
}
?>
    
    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Crear'), array('create', 'id'=>$usuario->usuario_id)); ?>
        </div>        
    </div>
    
</div>

