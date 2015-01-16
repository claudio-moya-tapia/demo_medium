/**
 * 
 * @class Usuario
 * @extends Controller
 */
function Usuario() {
    this.init();    
    this.usuario_id = 0;
    this.rut = '';
}

Usuario.prototype = new Controller();
Usuario.prototype.constructor = Usuario;

Usuario.prototype.create = function() {
    this.checkUserRut();
    $('#btnSubmit').click(function(){
    if($('#Usuario_identidad_id_0').is(":checked")){
        var rut = $("#Usuario_rut").val();
       
        if($.Rut.validar(rut)){

             $("#usuario-form").submit();
            }else{
                   alert('El rut ingresado es incorrecto.');
            }
        }else if($('#Usuario_identidad_id_1').is(":checked")){

            $("#usuario-form").submit();
        }
    });
};

Usuario.prototype.update = function() {
    this.checkUserRut();
    $('#btnSubmit').click(function(){
    if($('#Usuario_identidad_id_0').is(":checked")){
        var rut = $("#Usuario_rut").val();
       
        if($.Rut.validar(rut)){

             $("#usuario-form").submit();
            }else{
                   alert('El rut ingresado es incorrecto.');
            }
        }else if($('#Usuario_identidad_id_1').is(":checked")){

            $("#usuario-form").submit();
        }
    });
};

Usuario.prototype.checkUserRut = function() {
    this.init();  
    $("#Usuario_rut").focusout(function() {
        if($('#Usuario_identidad_id_0').is(":checked")){
            var rut = $("#Usuario_rut").val();
            if($.Rut.validar(rut)){
              
            }else{
                  alert('El rut ingresado es incorrecto.');
            }
        }
    });
};

Usuario.prototype.ajaxSearch = function() {
        
    var usuario = this;
    
    $.get(this.getActionUrl('ajaxSearch'), {
        
        id: usuario.rut
    }, function(data) {

        usuario.usuario_id = JSON.parse(data).usuario_id;
        usuario.ajaxSearchSuccess();
    });
};

/**
 * 
 * @returns {void}
 */
Usuario.prototype.ajaxSearchSuccess = function() {
    
    if(this.usuario_id > 0){        
        Shared.redirectTo(this.getActionUrl('update/')+this.usuario_id);
    }
};
