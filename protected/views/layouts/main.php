<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
       
   
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <!-- link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" / -->
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
        <!--
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        -->

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
       </head>
     
    <body>

        <!--contenedor principal-->
        <div class="cont-principal">
            <!--header-->
            <div class="header">
                <div class="logo">
                    <a href="<?php echo Yii::app()->baseUrl; ?>">                        
                        <?php echo CHtml::image(Yii::app()->baseUrl . '/images/logo-uc.jpg', 'Pontificia Universidad Católica de Chile'); ?>            
                    </a>
                </div>
                <div class="tags">
                    <h1>Sistema de Administración PUC</h1>
                    <h2>Admisión y Ventas</h2>
                </div>
                <div class="logout">                    
                        <?php
                        if(Yii::app()->user->isGuest){
                        
                        ?>
                            <p>Bienvenido: <strong>Invitado</strong></p>                           
                        <?php
                        }else{
                        ?>
                             <p>Bienvenido: <strong><?php echo CHtml::encode(Yii::app()->user->name); ?></strong></p>
                             <div class="btn-salir">                        
                                <?php echo CHtml::link('Salir', array('site/logout')); ?>
                            </div>
                        <?php
                        }                        
                        ?>
                </div>
                <!--fin header-->
                <div class="clear"></div>
            </div>
            <!--navegación-->
            <?php
            if(!Yii::app()->user->isGuest){
            ?>
                <ul class="nav">
                    <li class="home">                    
                        <?php echo CHtml::link(CHtml::encode(''), array('/site/index')); ?>
                    </li>
                    <li class="user">Persona</li>
                    <li class="li">                    
                        <?php echo CHtml::link(CHtml::encode('Crear'), array('/usuario/create')); ?>
                    </li>
                    <li class="li">
                        <?php echo CHtml::link(CHtml::encode('Administrar'), array('/usuario/admin')); ?>
                    </li>
                    <li class="buscar">Buscador</li>
                    <li class="li">                   
                        <?php echo CHtml::link(CHtml::encode('Buscar'), array('/buscador')); ?>
                    </li>
                    <li class="li">                   
                        <?php echo CHtml::link(CHtml::encode('Filtros'), array('/buscadorFiltro/admin')); ?>
                    </li>
                    
                    <?php
                    if(Yii::app()->user->name != 'puc_admin'){
                    ?>
                        <li class="last">                   
                           <?php echo CHtml::link(CHtml::encode(''), array('javascript:void()')); ?>
                        </li>
                    <?php                    
                    }                    
                    ?>                    

                <?php
                if(Yii::app()->user->name == 'puc_admin'){
                ?>
                
                    <li class="admin">Administración</li>               
                    <li class="li"><a href="javascript:void(0);" value="0" id="persona" onclick="Shared.fade(id,'DatosPersonaId')">Persona</a></li>
                    
                    <div id="DatosPersonaId" class="divli">
                            <li class="li2">                    
                            <?php echo CHtml::link(CHtml::encode('Tipo Fuente Ingreso'), array('/tipoFuenteIngreso/admin')); ?>
                            </li>  
                            <li class="li2">                    
                            <?php echo CHtml::link(CHtml::encode('Intereses'), array('/interes/admin')); ?>
                            </li>  
                            <li class="li2">                    
                                <?php echo CHtml::link(CHtml::encode('Idioma'), array('/idioma/admin')); ?>
                            </li> 
                            <li class="li2">                    
                                <?php echo CHtml::link(CHtml::encode('Idioma Nivel'), array('/idiomaNivel/admin')); ?>
                            </li> 
                    </div>
                    
                    <li class="li"><a href="javascript:void(0);" value="0" id="comercial" onclick="Shared.fade(id,'DatosComercialId')">Comercial</a></li>
                    
                    <div id="DatosComercialId" class="divli">
                            <li class="li2">                    
                                <?php echo CHtml::link(CHtml::encode('Industria'), array('/industria/admin')); ?>
                            </li> 
                            <li class="li2">                    
                                <?php echo CHtml::link(CHtml::encode('Empresa'), array('/empresa/admin')); ?>
                            </li>                               
                            <li class="li2">
                                <?php echo CHtml::link(CHtml::encode('Área experiencia'), array('/areaExperiencia/admin')); ?>
                            </li>
                             <li class="li2">                    
                                <?php echo CHtml::link(CHtml::encode('Cargo'), array('/Cargo/admin')); ?>
                            </li>
                    </div>
                    <li class="li"><a href="javascript:void(0);" value="0" id="academico" onclick="Shared.fade(id,'DatosAcademicoId')">Académico</a></li>
                    
                    <div id="DatosAcademicoId" class="divli">
                            <li class="li2">                    
                                 <?php echo CHtml::link(CHtml::encode('Institución'), array('/institucion/admin')); ?>
                            </li>
                            <li class="li2">
                                <?php echo CHtml::link(CHtml::encode('Carrera'), array('/carrera/admin')); ?>
                            </li>
                    </div>
                    
                    <li class="li"><a href="javascript:void(0);" value="0" id="demografico" onclick="Shared.fade(id,'DatosDemograficoId')">Demográfico</a></li>
                  
                    <div id="DatosDemograficoId" class="divli">
                            <li class="li2">
                                <?php echo CHtml::link(CHtml::encode('Pais - Region - Ciudad - Comuna'), array('/pais/admin')); ?>
                            </li>
                    </div>   
                    <li class="li"><a href="javascript:void(0);"  value="0" id="demografico" onclick="Shared.fade(id,'DatosRangosId')">Rangos</a></li>
                    
                    <div id="DatosRangosId" class="divli">
                            <li class="li2">
                                <?php echo CHtml::link(CHtml::encode('Antiguedad'), array('/tipoAntiguedad/admin')); ?>
                            </li>
                            <li class="li2">
                                <?php echo CHtml::link(CHtml::encode('Empleado'), array('/rangoEmpleado/admin')); ?>
                            </li>
                            <li class="li2">
                                <?php echo CHtml::link(CHtml::encode('Utilidad'), array('/rangoUtilidad/admin')); ?>
                            </li>
                            <li class="li2">
                                <?php echo CHtml::link(CHtml::encode('Perdida'), array('/rangoPerdida/admin')); ?>
                            </li>
                            <li class="li2">
                                <?php echo CHtml::link(CHtml::encode('Facturacion'), array('/rangoFacturacion/admin')); ?>
                            </li>
                    </div>
                <?php
                }
                ?>
                <!--fin navegación-->
            </ul>
            <?php
            }
            ?>
            <!--contenedor derecho-->
            <div class="cont-derecha">
                <!--migas-->               
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- migas -->
                <?php endif ?>
                <!--caja-->
                <br />
                <?php echo $content; ?>                
                <!--fin contenedor derecho-->
            </div>

            <!--fin contenedor principal-->
            <div class="clear"></div>

            <!--footer-->
            <div class="clear"></div>
            <div class="footer">
                <h4>Sistema de Administración PUC</h4>
                <div class="clear"></div>
                <h5>Admisión y Ventas</h5>
                <!--fin footer-->
            </div>

        </div>

    </body>
</html>
