<?php
/* @var $buscadorFiltro BuscadorFiltro */

$this->breadcrumbs = array(
    'Buscador Filtros' => array('buscadorFiltro/admin'),
    $buscadorFiltro->titulo,
);

//var jsFiltroItem = php filtro item json;
?>



<h1>Buscador Filtro Items #<?php echo $buscadorFiltro->titulo; ?></h1>

<ul class="tabs">
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Filtro'), array('buscadorFiltro/view', 'id' => $model->buscador_filtro_id)); ?>
    </li>
    <li class="tab">
        <?php echo CHtml::link(CHtml::encode('Filtro items'), array('buscadorFiltroItem/manage', 'id' => $model->buscador_filtro_id), array('class' => 'tab-select')); ?>
    </li>
</ul>
<div class="clear"></div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'buscador-filtro-item-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<?php 
echo $form->hiddenField($model,'buscador_filtro_id'); 
echo CHtml::hiddenField('buscadorFiltroJson', $aryJson);
?>




<div class="caja2">    
    <p class="tit">Datos laborales</p>

    <div class="c1">        
        <label><input type="checkbox" id="selectAll_industria" />Industria</label>
        <div id="industriaDiv" class="c-radios">
             <input id="industria" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][industria]">
        </div>
    </div>
    <div class="c1 p60">           
        <label><input type="checkbox" id="selectAll_empresa" />Empresa</label>
        <div id="empresaDiv" class="c-radios">
        <input id="empresa" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][empresa]">
        </div>
    </div>
    <div class="clear"></div>
    
    <div class="c1">        
        <label><input type="checkbox" id="selectAll_area_experiencia" />Area experiencia</label>
        <div id="areaexperienciaDiv" class="c-radios">
        <input id="area_experiencia" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][area_experiencia]">
        </div>
    </div>
    <div class="c1 p60">          
        <label><input type="checkbox" id="selectAll_cargo" />Cargos</label>
        <div id="cargoDiv" class="c-radios">
            <input id="cargo" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][cargo]">
        </div>
    </div>
    <div class="clear"></div>
    
    <p class="tit">Datos pregrado</p>
    <div class="c1">        
        <label><input type="checkbox" id="selectAll_institucion" />Instituciones</label>
        <div id="institucionDiv" class="c-radios">
            <input id="institucion" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][institucion]">
        </div>
    </div>    
    <div class="c1 p60">        
        <label><input type="checkbox" id="selectAll_carrera" />Carreras</label>
        <div id="carreraDiv" class="c-radios">
            <input id="carrera" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][carrera]">
        </div>
    </div>
    <div class="clear"></div>
    
    <div class="c1">        
        <label><input type="checkbox" id="selectAll_institucion" />Fecha egreso</label>
        <div id="fechaegresoDiv" class="c-radios">
            <input id="fecha_egreso" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][fecha_egreso]">
        </div>
    </div>  
    
       <div class="clear"></div>
       
        <p class="tit">Datos postgrado</p>
    <div class="c1">        
        <label><input type="checkbox" id="selectAll_programa_estudio" />Programa de estudio</label>
        <div id="programaestudioDiv" class="c-radios">
            <input id="programa_estudio" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][programa_estudio]">
        </div>
    </div>    
    <div class="c1 p60">        
        <label><input type="checkbox" id="selectAll_tipo_estado_postgrado" />Estado</label>
        <div id="tipoestadoDiv" class="c-radios">
            <input id="tipo_estado_postgrado" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][tipo_estado_postgrado]">
        </div>
    </div>
    <div class="clear"></div>
        <div class="c1">        
        <label><input type="checkbox" id="selectAll_tipo_situacion_postgrado" />Situación</label>
        <div id="tiposituacionDiv" class="c-radios">
            <input id="tipo_situacion_postgrado" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][tipo_situacion_postgrado]">
 
        </div>
    </div>    
    <div class="c1 p60">        
        <label><input type="checkbox" id="selectAll_version" />Versión</label>
        <div id="fechaversionDiv" class="c-radios">
            <input id="version" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][version]">

        </div>
    </div>
    <div class="clear"></div>
    
    
    
    <p class="tit">Datos usuario</p>
    <div class="c1">        
        <label><input type="checkbox" id="selectAll_tipo_fuente_ingreso" />Fuente de Ingreso</label>
        <div id="fuenteingresoDiv" class="c-radios">
            <input id="tipo_fuente_ingreso" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][tipo_fuente_ingreso]">
        </div>
    </div>    
    <div class="clear"></div>
       <p class="tit">Datos demográficos</p>
    
    <div class="c1">        
        <label><input type="checkbox" id="selectAll_pais" />Paises</label>
        <div id="paisDiv" class="c-radios">
              <input id="pais" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][pais]">

        </div>
    </div>    
    
    <div class="c1 p60">        
        <label><input type="checkbox" id="selectAll_region" />Regiones</label>
        <div id="regionDiv" class="c-radios">
            <input id="region" type="hidden" value="0" name="BuscadorFiltroJQ[tabla][region]">
        </div>
    </div>   
    
    <div class="clear"></div>
 
<!--    <div class="row buttons3">
        <?php echo CHtml::submitButton('Guardar'); ?>
    </div>-->
    <div class="row buttons3">
     <input type="button" name="enviar" id="enviar" value="Guardar">
    </div>
</div>

<?php $this->endWidget(); ?>