<?php
/* @var $this UsuarioNaturalController */
/* @var $model UsuarioNatural */

$this->breadcrumbs = array(
    'Usuario' => array('usuario/view','id'=>$model->usuario_id),
    'Usuario Natural',
);

$this->menu = array(
    array('label' => 'Crear UsuarioNatural', 'url' => array('create','id'=>$model->usuario_id)),   
);
?>

<h1>Usuario Natural</h1>

<?php
if ($model->usuario_natural_id > 0) {
    
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            array(
                'label' => 'Estado Civil',
                'value' => $model->estado_civil_id
            ),
        ),
    ));
}
?>