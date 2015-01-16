<?php
/* @var $this UsuariLaboralController */
/* @var $model UsuarioLaboral */
/* @var $usuario Usuario */

$this->breadcrumbs = array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view', 'id' => $model->usuario_id),
    'DatosLaborales' => array('list', 'id' => $model->usuario_id),
    $usuario->rut,
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $usuario
));

$this->renderPartial('_form', array(
    'model' => $model,
    'listEmpresa' => $listEmpresa,
    'listIndustria' => $listIndustria,
    'listAreaExperiencia' => $listAreaExperiencia,
    'listCargo' => $listCargo,
)); 
?>