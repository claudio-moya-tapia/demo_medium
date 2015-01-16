<?php
/* @var $this ComunaController */
/* @var $model Comuna */

$this->breadcrumbs = array(
    'Comunas' => array('admin', 'pais_id' => $model->pais_id, 'region_id' => $model->region_id, 'ciudad_id' => $model->ciudad_id),
    'Crear',
);
?>

<h1>Crear Comuna</h1>
<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'listPais' => $listPais,
    'listRegion' => $listRegion,
    'listCiudad' => $listCiudad
));
?>