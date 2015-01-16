<?php
/* @var $this UsuarioLaboralController */
/* @var $model UsuarioLaboral */
/* @var $usuario Usuario */

$this->breadcrumbs = array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view', 'id' => $model->usuario_id),
    'Datos Laborales' => array('list', 'id' => $model->usuario_id),
    $usuario->rut,
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $model
));

$this->renderPartial('_form', array(
    'model' => $model,
    'listEmpresa' => $listEmpresa,
    'listIndustria' => $listIndustria,
    'listAreaExperiencia' => $listAreaExperiencia,
    'listCargo' => $listCargo,
));
?>