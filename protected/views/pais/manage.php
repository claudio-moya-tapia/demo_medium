<?php
/* @var $this    PaisController */
/* @var $model Pais */

$this->breadcrumbs = array(
    'Paises',
);
?>

<table class="items">
    <thead>
        <tr>
            <th>Pais</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $i=0;
    foreach ($listPais as $pais_id => $pais_nombre): 
        
        if($i%2==0){
            $class = 'even';
        }else{
            $class = 'odd';
        }
        $i++;
    ?>
        <tr class="<?php echo $class; ?>">
            <td><?php echo $pais_nombre; ?></td>
            <td>

                <a class="view" title="Ver" href="<?php echo Yii::app()->request->baseUrl . '/region/manage/' . $pais_id; ?>">
                    <img src="/yii/project/puc_dev/assets/23a06aff/gridview/view.png" alt="Ver"> 
                </a>
                <a class="update" title="Actualizar" href="<?php echo Yii::app()->request->baseUrl . '/pais/update/' . $pais_id; ?>">
                    <img src="/yii/project/puc_dev/assets/23a06aff/gridview/update.png" alt="Actualizar">
                </a> 
                <a class="delete" title="Borrar" href="<?php echo Yii::app()->request->baseUrl . '/pais/delete/' . $pais_id; ?>">
                    <img src="/yii/project/puc_dev/assets/23a06aff/gridview/delete.png" alt="Borrar">
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
   
<?php echo CHtml::link(CHtml::encode('Crear'), array('create'), array('class' => 'boton-admin')); ?>