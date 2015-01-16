/**
 * 
 * @class UsuarioComercial
 * @extends Controller
 */
function UsuarioComercial() {
    this.init();

    this.areaComercial = '#' + this.name + '_area_comercial_id';
    this.Cargo = '#' + this.name + '_cargo_id';    
}

UsuarioComercial.prototype = new Controller();
UsuarioComercial.prototype.constructor = UsuarioComercial;

UsuarioComercial.prototype.create = function() {
    this.form();
};

UsuarioComercial.prototype.update = function() {
    this.form();
};

UsuarioComercial.prototype.ajaxCargoSuccess = function(aryCargo) {
        
    $(this.cargo).empty().append(new Option('(Seleccione)',''));    
    
    for(var x in aryCargo){        
        
        $(this.cargo).append(new Option(aryCargo[x].titulo,aryCargo[x].cargo_id));
    }
};

UsuarioComercial.prototype.ajaxCargo = function(id) {
            
    var UsuarioLaboral = this;
    var cargoComercial = new CargoComercial();     
    
    $.get(cargoComercial.actionAjaxCargo, {
        id: id
    }, function(data) {
        UsuarioLaboral.ajaxCargoSuccess(JSON.parse(data));
    });
};

UsuarioComercial.prototype.form = function() {

};