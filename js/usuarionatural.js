/**
 * 
 * @class UsuarioNatural
 * @extends Controller
 */
function UsuarioNatural() {
    this.init();
    this.telefonoFijo = '#'+this.name+'_telefono_fijo';
    this.telefonoCelular = '#'+this.name+'_telefono_celular';
}

UsuarioNatural.prototype = new Controller();
UsuarioNatural.prototype.constructor = UsuarioNatural;

UsuarioNatural.prototype.create = function() {
    this.form();
};

UsuarioNatural.prototype.update = function() {
    this.form();
};

UsuarioNatural.prototype.form = function() {
    Shared.init();
    Shared.setLocacion('UsuarioNatural');
    
    Documento.uploadify('#DocumentoUpload');
    Documento.onUploadSuccess = this.onUploadSuccess;

    $(this.telefonoFijo).formatter({
        'pattern': '{{999999999}}',
        'persistent': false
    });

    $(this.telefonoCelular).formatter({
        'pattern': '{{999999999}}',
        'persistent': false
    });

    if($('#UsuarioNatural_imagen').val() != 'images/empty.gif'){
        $('#UsuarioNatural_img').attr('src', Config.baseUrl + $('#UsuarioNatural_imagen').val());
    }
};

/**
 *      
 * @param {Documento} DocumentoJson description
 * @returns void
 */
UsuarioNatural.prototype.onUploadSuccess = function(DocumentoJson) {

    $('#UsuarioNatural_imagen').val(DocumentoJson.url);
    $('#UsuarioNatural_img').attr('src', Config.baseUrl + DocumentoJson.url);
};
