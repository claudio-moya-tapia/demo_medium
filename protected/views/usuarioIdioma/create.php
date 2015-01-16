<?php
/* @var $this UsuarioIdiomaController */
/* @var $model UsuarioIdioma */

$this->breadcrumbs = array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view','id' => $usuario->usuario_id),
    'Persona Idioma' => array('usuarioIdioma/list','id' => $usuario->usuario_id),
    'Create',
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $usuario
));

$this->renderPartial('_form', array(
    'model' => $model,
    'ListIdiomas' => $ListIdiomas,
    'ListNiveles' => $ListNiveles
));
?>