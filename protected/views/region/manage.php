<?php
/* @var $this    RegionController */
/* @var $model Region */

$this->breadcrumbs = array(
    $model->pais->nombre  => ('pais/manage/' + $model->pais_id + ''),
    'Regiones' => '',
    $model->region_id,
);
?>
<?php
$this->menu = array(
    array('label' => 'Agregar Region', 'url' => array('region/create/' . $model->pais_id)),
);
?>
<table>

<?php foreach ($listRegion as $region_id => $region_nombre): ?>
        <tr>
            <td><?php echo $region_nombre; ?></td>
            <td class="button-column">

                <a class="view" title="Ver" href="<?php echo Yii::app()->request->baseUrl . '/ciudad/manage/' . $region_id; ?>">
                    <img src="/yii/project/puc_dev/assets/23a06aff/gridview/view.png" alt="Ver"> 
                </a>
                <a class="update" title="Actualizar" href="<?php echo Yii::app()->request->baseUrl . '/region/update/' . $region_id; ?>">
                    <img src="/yii/project/puc_dev/assets/23a06aff/gridview/update.png" alt="Actualizar">
                </a> 
                <a class="delete" title="Borrar" href="<?php echo Yii::app()->request->baseUrl . '/region/delete/' . $region_id; ?>">
                    <img src="/yii/project/puc_dev/assets/23a06aff/gridview/delete.png" alt="Borrar">
                </a>
            </td>
        </tr>
<?php endforeach; ?>
</table>