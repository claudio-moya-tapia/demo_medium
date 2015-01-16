var Usuario = {
    data: [],
    usuario_id: 0,
    tipoFuenteingreso_id: 0,
    sexo_id: 0,
    rut: '',
    nombre: '',
    fecha_nacimiento: '',
    fecha_creacion: '',
    identidad_id: 0,
    parse: function(item) {
        this.usuario_id = item.id;
        this.tipoFuenteingreso_id = item.tfi;
        this.sexo_id = item.si;
        this.rut = item.ru;
        this.nombre = item.nm + ' ' + item.ap + ' ' + item.am;
        this.fecha_nacimiento = item.fn;
        this.fecha_creacion = item.fc;
        this.identidad_id = item.ii;
    }
};

var Sexo = {
    data: [],
    sexo_id: 0,
    nombre: '',
    parse: function(item) {
        this.sexo_id = item.si;
        this.nombre = item.nm;
    },
    find: function(id) {
        this.parse(this.data[id]);
    }
};

var TipoFuenteingreso = {
    data: [],
    tipo_fuente_ingreso_id: 0,
    titulo: '',
    init: function() {
        this.tipo_fuente_ingreso_id = 0;
        this.titulo = '';
    },
    parse: function(item) {
        this.tipo_fuente_ingreso_id = item.ti;
        this.titulo = item.tt;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};

var UsuarioNatural = {
    data: [],
    usuario_id: 0,
    estado_civil_id: 0,
    pais_id: 0,
    region_id: 0,
    ciudad_id: 0,
    comuna_id: 0,
    direccion: 0,
    telefono_fijo: 0,
    telefono_celular: 0,
    email: 0,
    estadoCivil: '',
    pais: '',
    region: '',
    ciudad: '',
    comuna: '',
    init: function() {
        this.usuario_id = 0;
        this.estado_civil_id = 0;
        this.pais_id = 0;
        this.region_id = 0;
        this.ciudad_id = 0;
        this.comuna_id = 0;
        this.direccion = '';
        this.telefono_fijo = '';
        this.telefono_celular = '';
        this.email = '';

        EstadoCivil.find(this.estado_civil_id);
        this.estadoCivil = EstadoCivil.nombre;

        Pais.find(this.pais_id);
        this.pais = Pais.nombre;

        Region.find(this.region_id);
        this.region = Region.nombre;

        Ciudad.find(this.ciudad_id);
        this.ciudad = Ciudad.nombre;

        Comuna.find(this.comuna_id);
        this.comuna = Comuna.nombre;
    },
    parse: function(item) {
        this.usuario_id = item.ui;
        this.estado_civil_id = item.ec;
        this.pais_id = item.pi;
        this.region_id = item.ri;
        this.ciudad_id = item.ci;
        this.comuna_id = item.co;
        this.direccion = item.dr;
        this.telefono_fijo = item.tf;
        this.telefono_celular = item.tc;
        this.email = item.em;

        EstadoCivil.find(this.estado_civil_id);
        this.estadoCivil = EstadoCivil.nombre;

        Pais.find(this.pais_id);
        this.pais = Pais.nombre;

        Region.find(this.region_id);
        this.region = Region.nombre;

        Ciudad.find(this.ciudad_id);
        this.ciudad = Ciudad.nombre;

        Comuna.find(this.comuna_id);
        this.comuna = Comuna.nombre;
    },
    find: function(id) {
        if (typeof this.data[id] != 'undefined') {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};

var EstadoCivil = {
    data: [],
    estado_civil_id: 0,
    nombre: '',
    init: function() {
        this.estado_civil_id = 0;
        this.nombre = '';
    },
    parse: function(item) {
        this.estado_civil_id = item.ec;
        this.nombre = item.nm;
    },
    find: function(id) {

        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};

var Pais = {
    data: [],
    pais_id: 0,
    nombre: '',
    init: function() {
        this.pais_id = 0;
        this.nombre = '';
    },
    parse: function(item) {
        this.pais_id = item.pi;
        this.nombre = item.nm;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};

var Region = {
    data: [],
    region_id: 0,
    nombre: '',
    init: function() {
        this.region_id = 0;
        this.nombre = '';
    },
    parse: function(item) {
        
        this.region_id = item.ri;
        this.nombre = item.nm;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};

var Ciudad = {
    data: [],
    ciudad_id: 0,
    nombre: '',
    init: function() {
        this.ciudad_id = 0;
        this.nombre = '';
    },
    parse: function(item) {
        this.ciudad_id = item.ci;
        this.nombre = item.nm;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};

var Comuna = {
    data: [],
    comuna_id: 0,
    nombre: '',
    init: function() {
        this.comuna_id = 0;
        this.nombre = '';
    },
    parse: function(item) {
        this.comuna_id = item.cm;
        this.nombre = item.nm;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};

var Empresa = {
    data: [],
    empresa_id: 0,
    nombre: '',
    init: function() {
        this.empresa_id = 0;
        this.nombre = '';
    },
    parse: function(item) {
        this.empresa_id = item.ei;
        this.nombre = item.nm;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};

var UsuarioLaboral = {
    data: [],
    dataSearch: [],
    usuario_id: 0,
    empresa_id: 0,
    industria_id: 0,
    area_experiencia_id: 0,
    cargo_id: 0,
    email: 0,
    fecha_ingreso: 0,
    fecha_egreso: 0,
    actual_id: 0,
    empresa: '',
    cargo: '',
    init: function() {
        this.dataSearch = new Array();
        this.usuario_id = 0;
        this.empresa_id = 0;
        this.industria_id = 0;
        this.area_experiencia_id = 0;
        this.cargo_id = 0;
        this.email = 0;
        this.fecha_ingreso = 0;
        this.fecha_egreso = 0;
        this.actual_id = 0;
        this.empresa = '';
    },
    parse: function(item) {
        this.usuario_id = item.ui;
        this.empresa_id = item.ei;
        this.industria_id = item.ii;
        this.area_experiencia_id = item.ae;
        this.cargo_id = item.ci;
        this.email = item.em;
        this.fecha_ingreso = item.fi;
        this.fecha_egreso = item.fe;
        this.actual_id = item.ai;

        Empresa.find(this.empresa_id);
        this.empresa = Empresa.nombre;

        Cargo.find(this.cargo_id);
        this.cargo = Cargo.titulo;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    },
    findAll: function(id) {
        if (typeof this.data[id] != 'undefined') {
            this.dataSearch = this.data[id];
        } else {
            this.init();
        }
    }
};

var Cargo = {
    data: [],
    cargo_id: 0,
    titulo: '',
    init: function() {
        this.cargo_id = 0;
        this.nombre = '';
    },
    parse: function(item) {
        this.cargo_id = item.ci;
        this.titulo = item.tt;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};

var UsuarioPregrado = {
    data: [],
    dataSearch: [],
    usuario_id: 0,
    institucion_id: 0,
    carrera_id: 0,
    fecha_egreso: 0,
    fecha_titulacion: 0,
    institucion: '',
    carrera: '',
    init: function() {
        this.dataSearch = new Array();
        this.usuario_id = 0;
        this.institucion_id = 0;
        this.carrera_id = 0;
        this.fecha_egreso = 0;
        this.fecha_titulacion = 0;
    },
    parse: function(item) {
        this.usuario_id = item.ui;
        this.institucion_id = item.ii;
        this.carrera_id = item.ci;
        this.fecha_egreso = item.fe;
        this.fecha_titulacion = item.ft;

        Institucion.find(this.institucion_id);
        this.institucion = Institucion.nombre;

        Carrera.find(this.carrera_id);
        this.carrera = Carrera.nombre;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    },
    findAll: function(id) {

        if (typeof this.data[id] != 'undefined') {
            this.dataSearch = this.data[id];
        } else {
            this.init();
        }
    }
};

var Institucion = {
    data: [],
    institucion_id: 0,
    nombre: '',
    init: function() {
        this.institucion_id = 0;
        this.nombre = '';
    },
    parse: function(item) {
        this.institucion_id = item.ii;
        this.nombre = item.nm;
    },
    find: function(id) {

        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};

var Carrera = {
    data: [],
    carrera_id: 0,
    nombre: '',
    init: function() {
        this.carrera_id = 0;
        this.nombre = '';
    },
    parse: function(item) {
        this.carrera_id = item.ci;
        this.nombre = item.nm;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};

var UsuarioPostgrado = {
    data: [],
    dataSearch: [],
    usuario_id: 0,
    programa_estudio_id: 0,
    tipo_situacion_id: 0,
    tipo_estado_id: 0,
    fecha_matricula: 0,
    fecha_version: 0,
    programa_estudio: '',
    tipo_situacion: '',
    tipo_estado: '',
    init: function() {
        this.dataSearch = new Array();
        this.usuario_id = 0;
        this.programa_estudio_id = 0;
        this.tipo_situacion_id = 0;
        this.tipo_estado_id = 0;
        this.fecha_matricula = 0;
        this.fecha_version = 0;
    },
    parse: function(item) {

        this.usuario_id = item.ui;
        this.programa_estudio_id = item.pe;
        this.tipo_situacion_id = item.ts;
        this.tipo_estado_id = item.te;
        this.fecha_matricula = item.fm;
        this.fecha_version = item.fv;

        ProgramaEstudio.find(this.programa_estudio_id);
        this.programa_estudio = ProgramaEstudio.titulo;

        TipoEstado.find(this.tipo_estado_id);
        this.tipo_estado = TipoEstado.titulo;

        TipoSituacion.find(this.tipo_situacion_id);
        this.tipo_situacion = TipoSituacion.titulo;

    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    },
    findAll: function(id) {
        if (typeof this.data[id] != 'undefined') {
            this.dataSearch = this.data[id];
        } else {
            this.init();
        }
    }
};
var ProgramaEstudio = {
    data: [],
    programa_estudio_id: 0,
    titulo: '',
    init: function() {
        this.programa_estudio_id = 0;
        this.titulo = '';
    },
    parse: function(item) {
        this.programa_estudio_id = item.pi;
        this.titulo = item.tt;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};
var TipoEstado = {
    data: [],
    tipo_estado_id: 0,
    titulo: '',
    init: function() {
        this.tipo_estado_id = 0;
        this.titulo = '';
    },
    parse: function(item) {
        this.tipo_estado_id = item.ti;
        this.titulo = item.tt;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};
var TipoSituacion = {
    data: [],
    tipo_situacion_id: 0,
    titulo: '',
    init: function() {
        this.tipo_situacion_id = 0;
        this.titulo = '';
    },
    parse: function(item) {
        this.tipo_situacion_id = item.ti;
        this.titulo = item.tt;
    },
    find: function(id) {
        if (id > 0) {
            this.parse(this.data[id]);
        } else {
            this.init();
        }
    }
};
/**
 * 
 * @class Buscador
 * @extends Controller
 */
function Buscador() {
    this.init();
    this.aryImport = new Array();
}

Buscador.prototype = new Controller();
Buscador.prototype.constructor = Buscador;

Buscador.prototype.json = function() {

    this.aryImport.push('usuario');
    this.aryImport.push('sexo');
    this.aryImport.push('tipoFuenteingreso');
    this.aryImport.push('usuarioNatural');
    this.aryImport.push('estadoCivil');
    this.aryImport.push('pais');
    this.aryImport.push('region');
    this.aryImport.push('ciudad');
    this.aryImport.push('comuna');
    this.aryImport.push('empresa');
    this.aryImport.push('usuarioLaboral');
    this.aryImport.push('cargo');
    this.aryImport.push('usuarioPregrado');
    this.aryImport.push('institucion');
    this.aryImport.push('carrera');
    this.aryImport.push('usuarioPostgrado');
    this.aryImport.push('programaEstudio');
    this.aryImport.push('tipoEstado');
    this.aryImport.push('tipoSituacion');

    this.import();
};

Buscador.prototype.import = function() {
    if (this.aryImport.length > 0) {
        var buscador = this;
        var item = this.aryImport[this.aryImport.length - 1];
        this.aryImport.pop();

        var URL = Config.baseUrl + '/json/' + item + '.zip';
   
        JSZipUtils.getBinaryContent(URL, function(err, data) {
            if (err) {
                throw err; // or handle err
            }

            var zip = new JSZip(data);

            var f = item.charAt(0).toUpperCase();
            var clase = f + item.substr(1);
            eval(clase + '.data = ' + zip.file(item + '.js').asText() + ';');
            buscador.import();
        });

    } else {
        zip = null;
        JSZipUtils = null;
        this.createTable();
    }
};

Buscador.prototype.createTable = function() {

    var x = 0;
    var tr = '';
    var nextLimit = 5000;

    for (var x = 0; x < Usuario.data.length; x++) {

        Usuario.parse(Usuario.data[x]);
        Sexo.find(Usuario.sexo_id);
        TipoFuenteingreso.find(Usuario.tipoFuenteingreso_id);

        //start tr
        tr += '<tr>';

        //start td
        tr += '<td>' + Usuario.usuario_id + '</td>';
        tr += '<td>' + Usuario.rut + '</td>';
        tr += '<td>' + Usuario.nombre + '</td>';
        tr += '<td>' + Sexo.nombre + '</td>';
        tr += '<td>' + TipoFuenteingreso.titulo + '</td>';

        //usuario natural        
        UsuarioNatural.find(Usuario.usuario_id);

        tr += '<td>' + UsuarioNatural.estadoCivil + '</td>';
        tr += '<td>' + UsuarioNatural.pais + '</td>';
        tr += '<td>' + UsuarioNatural.region + '</td>';
        tr += '<td>' + UsuarioNatural.ciudad + '</td>';
        tr += '<td>' + UsuarioNatural.comuna + '</td>';
        tr += '<td>' + UsuarioNatural.direccion + '</td>';
        tr += '<td>' + UsuarioNatural.telefono_fijo + '</td>';
        tr += '<td>' + UsuarioNatural.telefono_celular + '</td>';
        tr += '<td>' + UsuarioNatural.email + '</td>';

        //usuario laboral
        var laboralEmpresa = '';
        var laboralIndustria = '';
        var laboralArea = '';
        var laboralCargo = '';
        var laboralEmail = '';
        var laboralFechaIngreso = '';
        var laboralFechaEgreso = '';

        UsuarioLaboral.findAll(Usuario.usuario_id);
    
        for (var i in UsuarioLaboral.dataSearch) {        
           
            UsuarioLaboral.parse(UsuarioLaboral.dataSearch[i]);
            laboralEmpresa += (parseInt(i) + 1) + ') ' + UsuarioLaboral.empresa + '';
            laboralCargo += (parseInt(i) + 1) + ') ' + UsuarioLaboral.cargo + '';
            laboralEmail += (parseInt(i) + 1) + ') ' + UsuarioLaboral.email + '';
            laboralFechaIngreso += (parseInt(i) + 1) + ') ' + UsuarioLaboral.fecha_ingreso + '';
            laboralFechaEgreso += (parseInt(i) + 1) + ') ' + UsuarioLaboral.fecha_egreso + '';
        }

        tr += '<td>' + laboralEmpresa + '</td>';
        tr += '<td>' + laboralIndustria + '</td>';
        tr += '<td>' + laboralArea + '</td>';
        tr += '<td>' + laboralCargo + '</td>';
        tr += '<td>' + laboralEmail + '</td>';
        tr += '<td>' + laboralFechaIngreso + '</td>';
        tr += '<td>' + laboralFechaEgreso + '</td>';

        //usuario pregrado
        var pregradoInstitucion = '';
        var pregradoCarrera = '';
        var pregradoFechaEgreso = '';
        var pregradoFechaTitulacion = '';
        var pregradoPorfesion = '';
        
        UsuarioPregrado.findAll(Usuario.usuario_id);
           
        for (var i in UsuarioPregrado.dataSearch) {
            UsuarioPregrado.parse(UsuarioPregrado.dataSearch[i]);
            
            pregradoInstitucion += (parseInt(i) + 1) + ') ' + UsuarioPregrado.institucion + '';
            pregradoCarrera += (parseInt(i)+1)+') '+UsuarioPregrado.carrera+'';   
            pregradoFechaEgreso += (parseInt(i)+1)+') '+ UsuarioPregrado.fecha_egreso+'';  
            pregradoFechaTitulacion += (parseInt(i)+1)+') '+ UsuarioPregrado.fecha_titulacion+'';  
        }

        tr += '<td>' + pregradoInstitucion + '</td>';
        tr += '<td>' + pregradoCarrera + '</td>';
        tr += '<td>' + pregradoFechaEgreso + '</td>';
        tr += '<td>' + pregradoFechaTitulacion + '</td>';

        //usuario postgrado
        var postgradoProgramaEstudio = '';
        var postgradoTipoSituacion = '';
        var postgradoTipoEstado = '';
        var postgradoFechaMatricula = '';
        var postgradoFechaVersion = '';
        
        UsuarioPostgrado.findAll(Usuario.usuario_id);
           
        for (var i in UsuarioPostgrado.dataSearch) {
            UsuarioPostgrado.parse(UsuarioPostgrado.dataSearch[i]);
            postgradoProgramaEstudio += (parseInt(i) + 1) + ') ' + UsuarioPostgrado.programa_estudio + '';
            postgradoTipoSituacion += (parseInt(i) + 1) + ') ' + UsuarioPostgrado.tipo_situacion + '';
            postgradoTipoEstado += (parseInt(i)+1)+') '+UsuarioPostgrado.tipo_estado+'';   
            postgradoFechaMatricula += (parseInt(i)+1)+') '+ UsuarioPostgrado.fecha_matricula+'';  
            postgradoFechaVersion += (parseInt(i)+1)+') '+ UsuarioPostgrado.fecha_version+'';  
        }

        tr += '<td>' + postgradoProgramaEstudio + '</td>';
        tr += '<td>' + postgradoTipoSituacion + '</td>';
        tr += '<td>' + postgradoTipoEstado + '</td>';
        tr += '<td>' + postgradoFechaMatricula + '</td>';
        tr += '<td>' + postgradoFechaVersion + '</td>';
        //end tr
        tr += '</tr>';

        //prevent varible memory limit
        if (x >= nextLimit) {
            document.getElementById('informeExcelBody').innerHTML += tr;
            tr = '';
            nextLimit += 5000;
        }

    }

    document.getElementById('informeExcelBody').innerHTML += tr;
    document.getElementById('tabla').value = '<table>' + document.getElementById('informeExcel').innerHTML + '</table>';

    this.aryImport = null;
    laboralEmpresa = null;
    laboralIndustria = null;
    laboralArea = null;
    laboralCargo = null;
    laboralEmail = null;
    laboralFechaIngreso = null;
    laboralFechaEgreso = null;
    pregradoInstitucion = null;
    pregradoCarrera = null;
    pregradoFechaEgreso = null;
    pregradoFechaTitulacion = null;
    pregradoPorfesion = null;
    x = null;
    tr = null;
    nextLimit = null;
    Usuario = null;
    UsuarioLaboral = null;
    UsuarioNatural = null;
    UsuarioPregrado = null;
    UsuarioPostgrado = null;
    Cargo = null;
    Sexo = null;
    TipoFuenteingreso = null;
    TipoSituacion = null;
    TipoEstado = null;
    PorgramaEstudio = null;
    EstadoCivil = null;
    Pais = null;
    Region = null;
    Ciudad = null;
    Ciudad = null;
    Comuna = null;
    Empresa = null;
    Institucion = null;
    Carrera = null;


    //this.downloadExcel();
};

Buscador.prototype.downloadExcel = function() {

    //var worksheet = 'InformePUC';
//    var table = document.getElementById('informeExcel').innerHTML;
//    var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>' + worksheet + '</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>' + document.getElementById('informeExcel').innerHTML + '</table></body></html>';
//

    //asincrono
//    var a = document.createElement('a');
//    //a.href = 'data:application/vnd.ms-excel,' + csv;
//    a.href = 'data:application/csv;charset=utf-8,'+encodeURIComponent($('#informeExcel').table2CSV({delivery:'value'}));
//    a.download = 'informe.csv';
//    a.click();
//    //sincrono
//    window.location.href = 'data:text/csv;charset=UTF-8,'+ encodeURIComponent($('#informeExcel').table2CSV({delivery:'value'}));

    //window.location.href = 'data:application/vnd.ms-excel,<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body><table>'+document.getElementById('informeExcel').innerHTML+'</table></body></html>';
};

Buscador.prototype.Resultado = function() {


};