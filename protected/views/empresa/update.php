<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('admin'),
	$model->nombre=>array('view','id'=>$model->empresa_id),
	'Actualizar',
);
?>

<h1>Actualizar Empresa #<?php echo $model->nombre; ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'listPais' => $listPais,
    'listRegion' => $listRegion,
    'listCiudad' => $listCiudad,
    'listComuna' => $listComuna,
    'listTipoSociedad' => $listTipoSociedad,
    'listTipoAntiguedad'=> $listTipoAntiguedad,
    'listRangoEmpleado'=> $listRangoEmpleado,
    'listRangoUtilidad'=>$listRangoUtilidad,
    'listRangoPerdida'=>$listRangoPerdida,
    'listRangoFacturacion'=>$listRangoFacturacion,
    'listGiro' => $listGiro
));
?>