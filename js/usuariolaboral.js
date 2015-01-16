/**
 * 
 * @class UsuarioLaboral
 * @extends Controller
 */
function UsuarioLaboral() {
    this.init();

    this.areaComercial = '#' + this.name + '_area_comercial_id';
    this.Cargo = '#' + this.name + '_cargo_id';    
}

UsuarioLaboral.prototype = new Controller();
UsuarioLaboral.prototype.constructor = UsuarioLaboral;

UsuarioLaboral.prototype.create = function() {
    this.form();
};

UsuarioLaboral.prototype.update = function() {
    this.form();
};

UsuarioLaboral.prototype.ajaxCargoSuccess = function(aryCargo) {
        
    $(this.cargo).empty().append(new Option('(Seleccione)',''));    
    
    for(var x in aryCargo){        
        
        $(this.cargo).append(new Option(aryCargo[x].titulo,aryCargo[x].cargo_id));
    }
};

UsuarioLaboral.prototype.ajaxCargo = function(id) {
            
    var UsuarioLaboral = this;
    var cargoComercial = new CargoComercial();     
    
    $.get(cargoComercial.actionAjaxCargo, {
        id: id
    }, function(data) {
        UsuarioLaboral.ajaxCargoSuccess(JSON.parse(data));
    });
};

UsuarioLaboral.prototype.form = function() {

};