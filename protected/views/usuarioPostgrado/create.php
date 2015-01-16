<?php
/* @var $this UsuarioPostgradoController */
/* @var $model UsuarioPostgrado */

$this->breadcrumbs=array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view', 'id' => $usuario->usuario_id),
    'Datos PostGrado' => array('list', 'id' => $usuario->usuario_id),
    $usuario->rut,
);


$this->renderPartial('//usuario/_tabs', array(
    'model' => $usuario
));

$this->renderPartial('_form', 
        array(
            'model' => $model,
            'usuario' => $usuario,
            'listProgramaEstudio' => $listProgramaEstudio,
            'listEstados' => $listEstados,
            'listSituaciones' => $listSituaciones,
        
        )); 
?>