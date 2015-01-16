<?php

switch($this->action->id){
    case 'view':
        $actionName = 'Detalle';
        break;
    case 'update':
        $actionName = 'Actualizar';
        break;
    case 'create':
        $actionName = 'Crear';
        break;
    case 'list':
        $actionName = 'Listado';
        break;
    case 'manage':
        $actionName = 'Listado';
        break;
}

switch(get_class($this)){
    case 'UsuarioController':
        $tabSelectUsuario = 'tab-select';
        $sectionName = 'Persona';
        break;
    case 'UsuarioNaturalController':
        $tabSelectUsuarioNatural = 'tab-select';
        $sectionName = 'Datos Personales';
        break;
    case 'UsuarioLaboralController':
        $tabSelectUsuarioLaboral = 'tab-select';
        $sectionName = 'Datos Laborales';        
        break;
    case 'UsuarioPostgradoController':
        $tabSelectUsuarioPostgrado = 'tab-select';
        $sectionName = 'Datos PostGrado';        
        break;
    case 'UsuarioPregradoController':
        $tabSelectUsuarioPregrado = 'tab-select';
        $sectionName = 'Datos PreGrado';        
        break;
    case 'UsuarioComercialController':
        $tabSelectUsuarioComercial = 'tab-select';
        $sectionName = 'Datos Comerciales';        
        break;
//    case 'UsuarioDocenteController':
//        $tabSelectUsuarioDocente = 'tab-select';
//        $sectionName = 'Datos Docente';        
//        break;
    case 'UsuarioIdiomaController':
        $tabSelectUsuarioIdioma = 'tab-select';
        $sectionName = 'Idiomas';
        break;
    case 'UsuarioInteresController':
        $tabSelectUsuarioInteres = 'tab-select';
        $sectionName = 'Intereses';        
        break;
}

if(isset($model->usuario)){
    $rut = $model->usuario->rut;
    $nombreCompleto = $model->usuario->nombre.' '.$model->usuario->apellido_paterno.' '.$model->usuario->apellido_materno;
}else{
    $rut = $model->rut;
    $nombreCompleto = $model->nombre.' '.$model->apellido_paterno.' '.$model->apellido_materno;
}

echo '<h1>'.$actionName.' '.$sectionName.' '.$nombreCompleto.'</h1>';

?>

<ul class="tabs">
    <li class="tab">
        <?php echo CHtml::link(CHtml::encode('Persona'), array('usuario/view', 'id' => $model->usuario_id), array('class' => $tabSelectUsuario)); ?>
    </li>
    <li class="tab">
        <?php echo CHtml::link(CHtml::encode('Datos Personales'), array('usuarioNatural/view', 'id' => $model->usuario_id), array('class' => $tabSelectUsuarioNatural)); ?>
    </li>
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Datos Comerciales'), array('usuarioComercial/list', 'id' => $model->usuario_id), array('class' => $tabSelectUsuarioComercial)); ?>
    </li>
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Datos Laborales'), array('usuarioLaboral/list', 'id' => $model->usuario_id), array('class' => $tabSelectUsuarioLaboral)); ?>
    </li>
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Datos PreGrado'), array('usuarioPregrado/list', 'id' => $model->usuario_id), array('class' => $tabSelectUsuarioPregrado)); ?>
    </li>
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Datos PostGrado'), array('usuarioPostgrado/list', 'id' => $model->usuario_id), array('class' => $tabSelectUsuarioPostgrado)); ?>
    </li>
<!--    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Datos Docente'), array('usuarioDocente/view', 'id' => $model->usuario_id), array('class' => $tabSelectUsuarioDocente)); ?>
    </li>-->
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Idiomas'), array('usuarioIdioma/list', 'id' => $model->usuario_id), array('class' => $tabSelectUsuarioIdioma)); ?>
    </li>
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Intereses'), array('usuarioInteres/list', 'id' => $model->usuario_id), array('class' => $tabSelectUsuarioInteres)); ?>
    </li>
</ul>

<div class="clear"></div>