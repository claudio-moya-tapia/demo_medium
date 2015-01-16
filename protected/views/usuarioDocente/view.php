<?php
/* @var $this UsuarioDocenteController */
/* @var $model UsuarioDocente */

$this->breadcrumbs = array(
    'Usuario Docentes' => array('index'),
    $model->usuario->nombre,
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $model
));
?>

<div class="form">

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'label' => 'Nombre y Apellido',
            'value' => $model->usuario->nombre . ' ' . $model->usuario->apellido_paterno
        ),
        array(
            'label' => 'Tipo Docente',
            'value' => $model->tipo_docente->titulo
        ),
        array(
            'label' => 'Tipo Area Especialidad',
            'value' => $model->tipo_area_especialidad->titulo
        ),
        array(
            'label' => 'Tipo Estado Laboral',
            'value' => $model->tipo_estado_laboral_docente->titulo
        ),
    ),
));
?>
<div class="botones">
      <div class="btn-izq">
<?php
     if($model->usuario_docente_id == '')
    {		
        echo CHtml::link(CHtml::encode('Crear'), array('create', 'id'=>$model->usuario_id));
    }
?>
        </div>    
</div>
 
<div class="botones">
      <div class="btn-izq">
<?php
     if($model->usuario_docente_id != '')
    {		
        echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id'=>$model->usuario_docente_id));
    }
?>
        </div>    
</div>
</div>