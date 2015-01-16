var Empresa = {
    data: [],
    empresa_id: 0,
    nombre: '',
    parse: function(item) {
        this.empresa_id = item.ei;
        this.nombre = item.nm;
    }
};

var Cargo = {
    data: [],
    cargo_id: 0,
    titulo: '',
    parse: function(item) {
        this.cargo_id = item.ci;
        this.titulo = item.tt;
    }
};

var Carrera = {
    data: [],
    carrera_id: 0,
    nombre: '',
    parse: function(item) {
        this.carrera_id = item.ci;
        this.nombre = item.nm;
    }
};

var Institucion = {
    data: [],
    institucion_id: 0,
    nombre: '',
    parse: function(item) {
        this.institucion_id = item.ii;
        this.nombre = item.nm;
    }
};

var Pais = {
    data: [],
    pais_id: 0,
    nombre: '',
    parse: function(item) {
        this.pais_id = item.pi;
        this.nombre = item.nm;
    }
};

var Region = {
    data: [],
    region_id: 0,
    nombre: '',
    parse: function(item) {
        this.region_id = item.ri;
        this.nombre = item.nm;
    }
};

var TipoSituacion = {
    data: [],
    tipo_situacion_postgrado_id: 0,
    titulo: '',
    parse: function(item) {
        this.tipo_situacion_postgrado_id = item.ti;
        this.titulo = item.tt;
    }
};

var TipoEstado = {
    data: [],
    tipo_estado_postgrado_id: 0,
    titulo: '',
    parse: function(item) {
        this.tipo_estado_postgrado_id = item.ti;
        this.titulo = item.tt;
    }
};

var ProgramaEstudio = {
    data: [],
    programa_estudio_id: 0,
    titulo: '',
    parse: function(item) {
        this.programa_estudio_id = item.pi;
        this.titulo = item.tt;
    }
};

var FechaVersion = {
    data: [],
    year: '',
    parse: function(item) {
        this.year = item.fc;
    }
};

var FechaEgreso = {
    data: [],
    year: '',
    parse: function(item) {
        this.year = item.yr;
    }
};

var TipoFuenteingreso = {
    data: [],
    tipo_fuente_ingreso_id: 0,
    titulo: '',
    parse: function(item) {
        this.tipo_fuente_ingreso_id = item.ti;
        this.titulo = item.tt;
    }
};

var Industria = {
    data: [],
    industria_id: 0,
    titulo: '',
    parse: function(item) {
        this.industria_id = item.ii;
        this.titulo = item.tt;
    }
};

var AreaExperiencia = {
    data: [],
    area_experiencia_id: 0,
    titulo: '',
    parse: function(item) {
        this.area_experiencia_id = item.ai;
        this.titulo = item.tt;
    }
};


/**
 * 
 * @class BuscadorFiltroItem
 * @extends Controller
 */
function BuscadorFiltroItem() {
    this.init();
    this.aryJson = new Array();
    this.aryImport = new Array();
}

BuscadorFiltroItem.prototype = new Controller();
BuscadorFiltroItem.prototype.constructor = BuscadorFiltroItem;

BuscadorFiltroItem.prototype.selectCheckbox = function(id, checked) {

    $("input[name='BuscadorFiltroItem[tabla][" + id + "][]']").each(function() {
        this.checked = checked;
    });
};

BuscadorFiltroItem.prototype.setCheckbox = function(id) {

    var obj = this;
    $('#selectAll_' + id).click(function() {

        if ($(this).attr('checked') == 'checked') {
            obj.selectCheckbox(id, true);
        } else {
            obj.selectCheckbox(id, false);
        }
    });
};

BuscadorFiltroItem.prototype.json = function() {

    this.aryImport.push('fechaVersion');
    this.aryImport.push('tipoFuenteingreso');
    this.aryImport.push('fechaEgreso');
    this.aryImport.push('industria');
    this.aryImport.push('areaExperiencia');
    this.aryImport.push('pais');
    this.aryImport.push('region');
    this.aryImport.push('empresa');
    this.aryImport.push('cargo');
    this.aryImport.push('institucion');
    this.aryImport.push('carrera');
    this.aryImport.push('programaEstudio');
    this.aryImport.push('tipoEstado');
    this.aryImport.push('tipoSituacion');

    this.import();
};



BuscadorFiltroItem.prototype.import = function() {


    if (this.aryImport.length > 0) {
        var BuscadorFiltroItem = this;
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
            BuscadorFiltroItem.import();
        });

    } else {
        zip = null;
        JSZipUtils = null;
        this.manageJson();
    }
};
BuscadorFiltroItem.prototype.inputChecked = function(tabla,nombre, tablaId, bool) {
//    console.log("inputChecked"+' '+' '+nombre+' '+tabla+' '+bool);
    var Input = '';
    if (bool) {
        Input = '<input type="checkbox" value='+tablaId+' name="BuscadorFiltroItem[tabla][' + tabla + '][]" checked id="BuscadorFiltroItem_tabla_' + tabla + '_' + tablaId + '"/><label for="BuscadorFiltroItem_tabla_' + tabla + '_' + tablaId + '">' + nombre + '</label><br />';
    } else {
        Input = '<input type="checkbox" value='+tablaId+' name="BuscadorFiltroItem[tabla][' + tabla + '][]" id="BuscadorFiltroItem_tabla_' + tabla + '_' + tablaId + '"/><label for="BuscadorFiltroItem_tabla_' + tabla + '_' + tablaId + '">' + nombre + '</label><br />';
    }
    return Input;
};

BuscadorFiltroItem.prototype.manageJson = function() {
    var buscadorJsonitem = JSON.parse($('#buscadorFiltroJson').val());
    var start = false;
    //empresa
    for (var x in Empresa.data) {
        start = false;
        Empresa.parse(Empresa.data[x]);

        for (var y in buscadorJsonitem) {
            if ((buscadorJsonitem[y]['tabla'] == 'empresa') && (buscadorJsonitem[y]['tabla_id'] == Empresa.data[x].value.ei)) {
                var start = true;
                break;
            }
        }
        if (start) {
            $('#empresaDiv').append(this.inputChecked('empresa',Empresa.data[x].value.nm, Empresa.data[x].value.ei,true));
        } else {
            $('#empresaDiv').append(this.inputChecked('empresa',Empresa.data[x].value.nm, Empresa.data[x].value.ei,false));
        }
    }
     //Cargo
    for (var x in Cargo.data) {
        start = false;
        Cargo.parse(Cargo.data[x]);
        for (var y in buscadorJsonitem) {
            if ((buscadorJsonitem[y]['tabla'] == 'cargo') && (buscadorJsonitem[y]['tabla_id'] == Cargo.data[x].value.ci)) {
                start = true;
                break;
            } else {
                start = false;
            }
        }
        if (start) {
            $('#cargoDiv').append(this.inputChecked('cargo',Cargo.data[x].value.tt, Cargo.data[x].value.ci,true));
        } else {
             $('#cargoDiv').append(this.inputChecked('cargo',Cargo.data[x].value.tt, Cargo.data[x].value.ci,false));
        }


    }
    //Carrera
    for (var x in Carrera.data) {
        start = false;
        Carrera.parse(Carrera.data[x]);
        for (var y in buscadorJsonitem) {
            if ((buscadorJsonitem[y]['tabla'] == 'carrera' && buscadorJsonitem[y]['tabla_id'] == Carrera.data[x].value.ci)) {
                start = true;
                break;
            }
        }
        if (start) {
            $('#carreraDiv').append(this.inputChecked('carrera',Carrera.data[x].value.nm, Carrera.data[x].value.ci,true));
        } else {
             $('#carreraDiv').append(this.inputChecked('carrera',Carrera.data[x].value.nm, Carrera.data[x].value.ci,false));
        }
    }
    //Institucion
    for (var x in Institucion.data) {
        start = false;
        Institucion.parse(Institucion.data[x]);
        for (var y in buscadorJsonitem) {
            if ((buscadorJsonitem[y]['tabla'] == 'institucion') && (buscadorJsonitem[y]['tabla_id'] == Institucion.data[x].value.ii)) {
                start = true;
                break;
            }
        }
        if (start) {
            $('#institucionDiv').append(this.inputChecked('institucion',Institucion.data[x].value.nm, Institucion.data[x].value.ii,true));
        } else {
             $('#institucionDiv').append(this.inputChecked('institucion',Institucion.data[x].value.nm, Institucion.data[x].value.ii,false));
        }
    }
    //Pais
    for (var x in Pais.data) {
        start = false;
        Pais.parse(Pais.data[x]);
        for (var y in buscadorJsonitem) {
            if ((buscadorJsonitem[y]['tabla'] == 'pais') && (buscadorJsonitem[y]['tabla_id'] == Pais.data[x].value.pi)) {
                start = true;
                break;
            }
        }
        if (start) {
            $('#paisDiv').append(this.inputChecked('pais',Pais.data[x].value.nm, Pais.data[x].value.pi,true));
        } else {
            $('#paisDiv').append(this.inputChecked('pais',Pais.data[x].value.nm, Pais.data[x].value.pi,false));
        }
    }
    //Region
    for (var x in Region.data) {
        start = false;
        Region.parse(Region.data[x]);
        for (var y in buscadorJsonitem) {
            if ((buscadorJsonitem[y]['tabla'] == 'region') && (buscadorJsonitem[y]['tabla_id'] == Region.data[x].value.ri)) {
                start = true;
                break;
            }
        }
        if (start) {
            $('#regionDiv').append(this.inputChecked('region',Region.data[x].value.nm, Region.data[x].value.ri,true));
        } else {
            $('#regionDiv').append(this.inputChecked('region',Region.data[x].value.nm, Region.data[x].value.ri,false));
        }
    }
    //TipoEstado
    for (var x in TipoEstado.data) {
        start = false;
        TipoEstado.parse(TipoEstado.data[x]);
        for (var y in buscadorJsonitem) {
            if ((buscadorJsonitem[y]['tabla'] == 'tipo_estado_postgrado') && (buscadorJsonitem[y]['tabla_id'] == TipoEstado.data[x].value.ti)) {
                start = true;
                break;
            }
        }
        if (start) {
            $('#tipoestadoDiv').append(this.inputChecked('tipo_estado_postgrado',TipoEstado.data[x].value.tt, TipoEstado.data[x].value.ti,true));
        } else {
            $('#tipoestadoDiv').append(this.inputChecked('tipo_estado_postgrado',TipoEstado.data[x].value.tt, TipoEstado.data[x].value.ti,false));
        }
    }
    //TipoSituacion
    for (var x in TipoSituacion.data) {
        start = false;
        TipoSituacion.parse(TipoSituacion.data[x]);
        for (var y in buscadorJsonitem) {
            if ((buscadorJsonitem[y]['tabla'] == 'tipo_situacion_postgrado') && (buscadorJsonitem[y]['tabla_id'] == TipoSituacion.data[x].value.ti)) {
                start = true;
                break;
            }
        }
        if (start) {
            $('#tiposituacionDiv').append(this.inputChecked('tipo_situacion_postgrado',TipoSituacion.data[x].value.tt, TipoSituacion.data[x].value.ti,true));
        } else {
            $('#tiposituacionDiv').append(this.inputChecked('tipo_situacion_postgrado',TipoSituacion.data[x].value.tt, TipoSituacion.data[x].value.ti,false));
        }
    }
    //ProgramaEstudio
    for (var x in ProgramaEstudio.data) {
        start = false;
        ProgramaEstudio.parse(ProgramaEstudio.data[x]);

        for (var y in buscadorJsonitem) {
            
            if ((buscadorJsonitem[y]['tabla'] == 'programa_estudio') && (buscadorJsonitem[y]['tabla_id'] == ProgramaEstudio.data[x].value.pi)) {
                start = true;
                break;
            }
        }
        if (start) {
            $('#programaestudioDiv').append(this.inputChecked('programa_estudio',ProgramaEstudio.data[x].value.tt, ProgramaEstudio.data[x].value.pi,true));
        } else {
            $('#programaestudioDiv').append(this.inputChecked('programa_estudio',ProgramaEstudio.data[x].value.tt, ProgramaEstudio.data[x].value.pi,false));
        }
    }
    //FechaEgreso
    for (var x in FechaEgreso.data) {
        start = false;
        FechaEgreso.parse(FechaEgreso.data[x]);
        for (var y in buscadorJsonitem) {
            if ((buscadorJsonitem[y]['tabla'] == 'fecha_egreso') && (buscadorJsonitem[y]['tabla_id'] == FechaEgreso.data[x].id)) {
                start = true;
                break;
            }
        }
        
        if (start) {
            $('#fechaegresoDiv').append(this.inputChecked('fecha_egreso',FechaEgreso.data[x].id, FechaEgreso.data[x].id,true));
        } else {
            $('#fechaegresoDiv').append(this.inputChecked('fecha_egreso',FechaEgreso.data[x].id, FechaEgreso.data[x].id,false));
        }
    }

    //FechaVersion
    for (var x in FechaVersion.data) {
        start = false;
        FechaVersion.parse(FechaVersion.data[x]);
        
        for (var y in buscadorJsonitem) {

            if ((buscadorJsonitem[y]['tabla'] == 'version') && (buscadorJsonitem[y]['tabla_id'] == FechaVersion.data[x].id)) {
                start = true;
                break;
            }
        }
        if (start) {
            $('#fechaversionDiv').append(this.inputChecked('version',FechaVersion.data[x].id, FechaVersion.data[x].id,true));
        } else {
            $('#fechaversionDiv').append(this.inputChecked('version',FechaVersion.data[x].id, FechaVersion.data[x].id,false));
        }
    }
    //Fuente Ingreso
    for (var x in TipoFuenteingreso.data) {
        start = false;
        TipoFuenteingreso.parse(TipoFuenteingreso.data[x]);
        for (var y in buscadorJsonitem) {
            if ((buscadorJsonitem[y]['tabla'] == 'tipo_fuente_ingreso') && (buscadorJsonitem[y]['tabla_id'] == TipoFuenteingreso.tipo_fuente_ingreso_id)) {
                start = true;
                break;
            }
        }
        if (start) {
            $('#fuenteingresoDiv').append(this.inputChecked('tipo_fuente_ingreso',TipoFuenteingreso.titulo, TipoFuenteingreso.tipo_fuente_ingreso_id,true));
        } else {
            $('#fuenteingresoDiv').append(this.inputChecked('tipo_fuente_ingreso',TipoFuenteingreso.titulo, TipoFuenteingreso.tipo_fuente_ingreso_id,false));
        }
    }
    //Industria
    for (var x in Industria.data) {
        start = false;
        Industria.parse(Industria.data[x]);
        for (var y in buscadorJsonitem) {
            if ((buscadorJsonitem[y]['tabla'] == 'industria') && (buscadorJsonitem[y]['tabla_id'] == Industria.data[x].value.ii)) {
                start = true;
                break;
            }
        }
        if (start) {
            $('#industriaDiv').append(this.inputChecked('industria',Industria.data[x].value.tt, Industria.data[x].value.ii,true));
        } else {
            $('#industriaDiv').append(this.inputChecked('industria',Industria.data[x].value.tt, Industria.data[x].value.ii,false));
        }
    }
    //AreaExperiencia
    for (var x in AreaExperiencia.data) {
        start = false;
        AreaExperiencia.parse(AreaExperiencia.data[x]);
        for (var y in buscadorJsonitem) {
            if ((buscadorJsonitem[y]['tabla'] == 'area_experiencia') && (buscadorJsonitem[y]['tabla_id'] == AreaExperiencia.data[x].value.ai)) {
                start = true;
                break;
            }
        }
        if (start) {
            $('#areaexperienciaDiv').append(this.inputChecked('area_experiencia',AreaExperiencia.data[x].value.tt, AreaExperiencia.data[x].value.ai,true));
        } else {
            $('#areaexperienciaDiv').append(this.inputChecked('area_experiencia',AreaExperiencia.data[x].value.tt, AreaExperiencia.data[x].value.ai,false));
        }
    }



};

BuscadorFiltroItem.prototype.manage = function() {
    this.json();



//    for (var x = 0; x < Empresa.data.length; x++) {
//        
//    }
    /**
     * 
     * paso 1: cargar items de buscador en json_items (items guardados) 
     * paso 2: llenar los checkboxlist con datos de json zip import
     * paso 3: hacer match json_items vs checkboxlist
     */

    //load json zips
    //this.aryImport.push('tipoFuenteingreso');


    //set btn form enviar
    var aryTablas = new Array();
    aryTablas.push('pais');
    aryTablas.push('region');
    aryTablas.push('carrera');
    aryTablas.push('institucion');
    aryTablas.push('cargo');
    aryTablas.push('area_experiencia');
    aryTablas.push('industria');
    aryTablas.push('empresa');
    aryTablas.push('tipo_fuente_ingreso');
    aryTablas.push('tipo_situacion_postgrado');
    aryTablas.push('tipo_estado_postgrado');
    aryTablas.push('version');
    aryTablas.push('programa_estudio');
    aryTablas.push('fecha_egreso');


    for (var x in aryTablas) {
        this.setCheckbox(aryTablas[x]);

    }

    $('#enviar').click(function() {
        var myList = '';
        for (var x in aryTablas) {
            var Arra = new Array();

            $("input[name='BuscadorFiltroItem[tabla][" + aryTablas[x] + "][]']:checked").each(function() {
                if ($(this).val() != 'on') {
                    Arra.push($(this).val());
                    myList = Arra.join('-');
                    $("#" + aryTablas[x] + "").val(myList);
                    console.log(aryTablas[x]);
                }
            });
        }

        $("input[type=checkbox]").removeAttr('checked');
        $("#buscador-filtro-item-form").submit();

    });
};

