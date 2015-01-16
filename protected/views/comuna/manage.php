<?php
/* @var $this    ComunaController */
/* @var $model Comuna */

$this->breadcrumbs = array(
    $model->pais->nombre => ('pais/manage/' + $model->pais_id + ''),
    $model->region->nombre  => ('region/manage/' + $model->region_id + ''),
    $model->ciudad->nombre  => ('region/manage/' + $model->region_id + ''),
    'Comunas' => '',
    $model->comuna_id,
);
?>
<?php
$this->menu = array(
    array('label' => 'Agregar Comuna', 'url' => array('/comuna/create/' . $model->ciudad_id)),
);
?>
<table>

<?php foreach ($listComuna as $comuna_id => $comuna_nombre): ?>
        <tr>
            <td><?php echo $comuna_nombre; ?></td>
            <td class="button-column">

                <a class="view" title="Ver" href="<?php echo Yii::app()->request->baseUrl . '/comuna/view/' . $comuna_id; ?>">
                    <img src="/yii/project/puc_dev/assets/23a06aff/gridview/view.png" alt="Ver"> 
                </a>
                <a class="update" title="Actualizar" href="<?php echo Yii::app()->request->baseUrl . '/comuna/update/' . $comuna_id; ?>">
                    <img src="/yii/project/puc_dev/assets/23a06aff/gridview/update.png" alt="Actualizar">
                </a> 
                <a class="delete" title="Borrar" href="<?php echo Yii::app()->request->baseUrl . '/comuna/delete/' . $comuna_id; ?>">
                    <img src="/yii/project/puc_dev/assets/23a06aff/gridview/delete.png" alt="Borrar">
                </a>
            </td>
        </tr>
<?php endforeach; ?>
</table>