/**
 * 
 * @class UsuarioPegrado
 * @extends Controller
 */
function UsuarioPegrado() {
    this.init();
}

UsuarioPegrado.prototype = new Controller();
UsuarioPegrado.prototype.constructor = UsuarioPegrado;

UsuarioPegrado.prototype.create = function() {};
UsuarioPegrado.prototype.update = function() {};


UsuarioPegrado.prototype.parseADDCarrerasList = function(json) {

    $('#UsuarioPregrado_carrera').empty().append(new Option('(Seleccione)', ''));
    for (var i in json) {

        $("#UsuarioPregrado_carrera").append(new Option(json[i].nombre, json[i].carrera_id));

    }
};


