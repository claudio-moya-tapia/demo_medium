<?php
/* @var $usuarioNatural UsuarioNatural */

$this->breadcrumbs = array(
    'Buscador'
);
?>

<h1>Buscador</h1>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'buscador-form',
    'enableAjaxValidation' => false,
    'action'=>Yii::app()->createUrl('buscador/Resultado'),
    'htmlOptions'=>array('target'=>'_blank'),
));
?>
<!--caja-->
<div class="caja">
    <p>
        <label for="filtrar">Filtrar por:</label>        
        <?php echo CHtml::dropDownList('Buscador[buscadorfiltro]', '', $listFiltro, array('class' => 'select-largo', 'id' => 'filtrar')); ?> 
        
    </p>
    Inicio: <input type="text" name="inicio" value="0" /><br>
    Limite: <input type="text" name="limite" value="100" />

    <p class="relative h110"><label for="datos">Datos de:</label>
        <span class="c-r">
            <input class="check" type="checkbox" id="personal" name="Buscador[filtroDato][]" value="personal" checked="checked" />
            <label class="label" for="natural">Personal</label><br /><br />     
            <input class="check" type="checkbox" id="natural" name="Buscador[filtroDato][]" value="natural"/>
            <label class="label" for="natural">Natural</label><br /><br />                        
            <input class="check" type="checkbox" id="comercial" name="Buscador[filtroDato][]" value="comercial" />
            <label for="comercial" class="label">Comercial</label><br /><br />
        </span>
        <div class="clear"></div>
    </p>    

    <div class="clear"></div>
    
    <div class="row buttons2">
        <div class="buscadorSubmitA">
            <?php echo CHtml::submitButton('Buscar'); ?>
        </div>
        <div class="buscadorSubmitB">
            <?php echo CHtml::submitButton('Descarga excel'); ?>
        </div>
        
    </div>    
</div>

<?php $this->endWidget(); ?>

<?php
        
    if(count($aryUsuario) > 0){
             
        
//        echo '<table>';
//        echo '<tr>';
//            echo '<th>ID</th>';
//            echo '<th>Rut</th>';
//            echo '<th>Nombre</th>';
//            echo '<th>Sexo</th>';
//            echo '<th>Región</th>';
//            
//            
//        echo '</tr>';
//      
//        foreach($aryUsuario['natural'] as $usuarioNatural){
//                    
//            echo '<tr>';
//                echo '<td>'.$usuarioNatural->usuario_id.'</td>';
//                echo '<td>'.$usuarioNatural->usuario->rut.'</td>';
//                echo '<td>'.$usuarioNatural->usuario->nombre.' '.$usuarioNatural->usuario->apellido_paterno.' '.$usuarioNatural->usuario->apellido_paterno.'</td>';
//                echo '<td>'.$usuarioNatural->usuario->sexo->nombre.'</td>';
//                echo '<td>'.$usuarioNatural->region->nombre.'</td>';
//            echo '</tr>';
//        }
//        
//        echo '</table>';
    }    
    ?>
