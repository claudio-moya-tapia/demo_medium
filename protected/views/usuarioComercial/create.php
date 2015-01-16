<?php
/* @var $this UsuarioComercialController */
/* @var $model UsuarioLaboral */

$this->breadcrumbs=array(
	'Usuario Comercial'=>array('index'),
	'Create',
);

?>

<h1>Create UsuarioComercial</h1>

<?php $this->renderPartial('_form', array(
    'model' => $model,
    'listEmpresa' => $listEmpresa,
    'listIndustria' => $listIndustria,
    'listAreaExperiencia' => $listAreaExperiencia,
    'listCargo' => $listCargo,
));
?>