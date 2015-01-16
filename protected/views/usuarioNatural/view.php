<?php
/* @var $this UsuarioNaturalController */
/* @var $model UsuarioNatural */

$this->breadcrumbs = array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view', 'id' => $model->usuario_id),
    $model->usuario->rut,
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $model
));
?>

<div class="form">
    <?php
    if ($model->usuario_natural_id > 0) {
        echo CHtml::image($model->imagen, 'imagen', array('id' => 'UsuarioNatural_img', 'style' => 'width:auto;max-height:100px'));

        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'attributes' => array(
                array(
                    'label' => 'Usuario',
                    'value' => $model->usuario->nombre . ' ' . $model->usuario->apellido_paterno
                ),
                array(
                    'label' => 'Estado Civil',
                    'value' => $model->estado_civil->nombre
                ),
                array(
                    'label' => 'País',
                    'value' => $model->pais->nombre
                ),
                array(
                    'label' => 'Región',
                    'value' => $model->region->nombre
                ),
                array(
                    'label' => 'Ciudad',
                    'value' => $model->ciudad->nombre
                ),
                array(
                    'label' => 'Comuna',
                    'value' => $model->comuna->nombre
                ),
                'direccion',
                'telefono_fijo',
                'telefono_celular',
                'email',
            ),
        ));
    }


    if ($model->usuario_natural_id > 0) {
        
        $botones = CHtml::link(CHtml::encode('Actualizar'), array('update', 'id'=>$model->usuario_natural_id));
        //$botones .= CHtml::link(CHtml::encode('Borrar'), array('delete', 'id'=>$model->usuario_natural_id), array('id'=>'btnBorrar'));
////        
//        $this->menu = array(
//            array('label' => 'Actualizar Usuario Natural', 'url' => array('update', 'id' => $model->usuario_natural_id)),
//            array('label' => 'Borrar Usuario Natural', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->usuario_natural_id), 'confirm' => '¿Esta seguro que desea eliminar este item?')),
//        );
        
    } else {        
        $botones = CHtml::link(CHtml::encode('Crear'), array('create', 'id' => $model->usuario_id));
    }
    ?>

    <div class="botones">
        <div class="btn-izq">
            <?php echo $botones; ?>
        </div>        
    </div>

</div>
