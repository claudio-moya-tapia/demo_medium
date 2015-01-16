/**
 * 
 * @class Empresa
 * @extends Controller
 */
function Empresa() {
    this.init();
    this.rut = '';
    this.rutTxt = '#'+this.name+'_rut';
    this.telefonoFijo = '#'+this.name+'_telefono_fijo';
    this.telefonoCelular = '#'+this.name+'_telefono_celular';
    this.telefonoFax = '#'+this.name+'_telefono_fax';
}

Empresa.prototype = new Controller();
Empresa.prototype.constructor = Empresa;

Empresa.prototype.create = function() {
    this.form();
};

Empresa.prototype.update = function() {
    this.form();
};

Empresa.prototype.form = function() {
    Shared.init();
    Shared.setLocacion(this.name);  
    
    var empresa = this;
    
    $(empresa.rutTxt).Rut({
        on_error: function() {
            alert('El rut ingresado es incorrecto.');
        },
        on_success: function() {
                        
            empresa.rut = $.Rut.quitarFormato($(empresa.rutTxt).val());            
            empresa.ajaxSearch();
        }
    });
    
    $(this.telefonoFijo).formatter({
        'pattern': '2-{{999}}-{{9999}}',
        'persistent': false
    });

    $(this.telefonoCelular).formatter({
        'pattern': '9-{{9999}}-{{9999}}',
        'persistent': false
    });
    
    $(this.telefonoFax).formatter({
        'pattern': '2-{{9999}}-{{9999}}',
        'persistent': false
    });
};

Empresa.prototype.ajaxSearch = function() {
        
    var empresa = this;
    
    $.get(this.getActionUrl('ajaxSearch'), {
        id: empresa.rut
    }, function(data) {

        empresa.empresa_id = JSON.parse(data).empresa_id;
        empresa.ajaxSearchSuccess();
    });
};

Empresa.prototype.ajaxSearchSuccess = function() {
    
    if(this.empresa_id > 0){
        Shared.redirectTo(this.getActionUrl('update/')+this.empresa_id);
    }
};