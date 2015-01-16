<?php
/* @var $this    CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs = array(
   
    $model->pais->nombre => ('pais/manage/' + $model->pais_id + ''),
    $model->region->nombre  => ('region/manage/' + $model->region_id + ''),
    'Ciudades' => '',
    $model->ciudad_id,
);
?>
<?php
$this->menu = array(
    array('label' => 'Agregar Ciudad', 'url' => array('/ciudad/create/' . $model->region_id)),
);
?>
<table>

<?php foreach ($listCiudad as $ciudad_id => $ciudad_nombre): ?>
        <tr>
            <td><?php echo $ciudad_nombre; ?></td>
            <td class="button-column">

                <a class="view" title="Ver" href="<?php echo Yii::app()->request->baseUrl . '/comuna/manage/' . $ciudad_id; ?>">
                    <img src="/yii/project/puc_dev/assets/23a06aff/gridview/view.png" alt="Ver"> 
                </a>
                <a class="update" title="Actualizar" href="<?php echo Yii::app()->request->baseUrl . '/ciudad/update/' . $ciudad_id; ?>">
                    <img src="/yii/project/puc_dev/assets/23a06aff/gridview/update.png" alt="Actualizar">
                </a> 
                <a class="delete" title="Borrar" href="<?php echo Yii::app()->request->baseUrl . '/ciudad/delete/' . $ciudad_id; ?>">
                    <img src="/yii/project/puc_dev/assets/23a06aff/gridview/delete.png" alt="Borrar">
                </a>
            </td>
        </tr>
<?php endforeach; ?>
</table>