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
    'method' => 'get',    
    'action'=>Yii::app()->createUrl('buscador/resultado'),
    'htmlOptions'=>array('target'=>'buscadorResultado'),
));
?>

<!--caja-->
<div class="caja">
    <p>
        <label for="filtrar">Filtrar por:</label>        
        <?php echo CHtml::dropDownList('Buscador[buscadorfiltro]', '', $listFiltro, array('class' => 'select-largo', 'id' => 'filtrar')); ?> 
        
    </p>

    <p class="relative h110"><label for="datos">Datos de:</label>
        <span class="c-r">
            <input class="check" type="checkbox"  disabled="disabled" id="personal" name="Buscador[filtroDato][]" value="personal" checked="checked" />
            <label class="label" for="natural">Personal</label><br /><br />     
            <input class="check" type="checkbox" id="natural" name="Buscador[filtroDato][]" value="natural"/>
            <label class="label" for="natural">Natural</label><br /><br />                        
            <input class="check" type="checkbox" id="laboral" name="Buscador[filtroDato][]" value="laboral" />
            <label for="Laboral" class="label">Laboral</label><br /><br />
            <input class="check" type="checkbox" id="pregrado" name="Buscador[filtroDato][]" value="pregrado" />
            <label for="Pregrado" class="label">Pregrado</label><br /><br />
            <input class="check" type="checkbox" id="postgrado" name="Buscador[filtroDato][]" value="postgrado" />
            <label for="Postgrado" class="label">Postgrado</label><br /><br />
        </span>
        <div class="clear"></div>
    </p>    

    <p>
        <label for="filtrar">Excel por partes</label>        
        <select name="inicio">
            <option value="0">Parte 1</option>
            <option value="5000">Parte 2</option>
            <option value="10000">Parte 3</option>
            <option value="15000">Parte 4</option>
        </select>
        (1.5MB aprox por archivo)
    </p>
    
    <div class="clear"></div>
    
    <div class="row buttons2">
        
        <div class="buscadorSubmitB">
            <?php echo CHtml::submitButton('Descarga excel'); ?>
<!--            <a href="<?php Yii::app()->params['baseUrlLinux']?>/buscador/json" target="_blank">Descargar Excel version Speedy Gonzales</a>-->
        </div>        
    </div>    
</div>

<?php $this->endWidget(); ?>


<iframe src="<?php echo Yii::app()->getBaseUrl(true).'/buscador/tmp' ?>" id="buscadorResultado" name="buscadorResultado"></iframe>