var Shared = {
    controller: '',
    classLocacion: '',
    locacionRegionAjax: '',
    locacionCiudadAjax: '',
    locacionComunaAjax: '',
    locacionPais: '',
    locacionRegion: '',
    locacionCiudad: '',
    locacionComuna: '',
    locacionRegionDefault: '',
    locacionCiudadDefault: '',
    locacionComunaDefault: '',
    academicoClassName: '',
    academicoSelectLimit: '',
    academicoLoadCheckbox: '',
    init: function() {
        this.controller = Config.baseUrl + '/shared';
        
    },
    fade: function(id,DatosId) {
        if($('#'+id).attr('value') === '1'){
            $('#'+DatosId).attr("class",'divli');
            $('#'+id).attr('value','0');
                }else{
            $('#'+DatosId).attr("class",'divliblock');
            $('#'+id).attr('value','1');
         }   
    },
    
    redirectTo: function(url) {
        window.location.href = url;
    },
    setLocacion: function(className) {

        Shared.classLocacion = className;

        Shared.locacionRegionAjax = Shared.controller + '/ajaxRegion';
        Shared.locacionCiudadAjax = Shared.controller + '/ajaxCiudad';
        Shared.locacionComunaAjax = Shared.controller + '/ajaxComuna';

        Shared.locacionPais = '#' + Shared.classLocacion + '_pais_id';
        Shared.locacionRegion = '#' + Shared.classLocacion + '_region_id';
        Shared.locacionCiudad = '#' + Shared.classLocacion + '_ciudad_id';
        Shared.locacionComuna = '#' + Shared.classLocacion + '_comuna_id';

        Shared.locacionRegionDefault = '<option value="">(Seleccione)</option>';
        Shared.locacionCiudadDefault = '<option value="">(Seleccione)</option>';
        Shared.locacionComunaDefault = '<option value="">(Seleccione)</option>';

        $(Shared.locacionPais).change(function() {
            Shared.ajaxRegion($(this).val());
            Shared.clearLocacion('pais');
        });

        $(Shared.locacionRegion).change(function() {
            Shared.ajaxCiudad($(this).val());
            Shared.clearLocacion('region');
        });

        $(Shared.locacionCiudad).change(function() {
            Shared.ajaxComuna($(this).val());
            Shared.clearLocacion('ciudad');
        });
    },
    clearLocacion: function(locacion) {

        switch (locacion) {

            case 'pais':
                $(Shared.locacionRegion).html(Shared.locacionRegionDefault);
                $(Shared.locacionCiudad).html(Shared.locacionCiudadDefault);
                $(Shared.locacionComuna).html(Shared.locacionComunaDefault);
                break;
            case 'region':
                $(Shared.locacionCiudad).html(Shared.locacionCiudadDefault);
                $(Shared.locacionComuna).html(Shared.locacionComunaDefault);
                break;
            case 'ciudad':
                $(Shared.locacionComuna).html(Shared.locacionComunaDefault);
                break;
        }
    },
    ajaxRegion: function(id) {

        $.get(Shared.locacionRegionAjax, {
            id: id
        }, function(data) {
            Shared.ajaxRegionSuccess(data);
        });
    },
    ajaxRegionSuccess: function(options) {
        $(Shared.locacionRegion).html(Shared.locacionRegionDefault + options);
    },
    ajaxCiudad: function(id) {

        $.get(Shared.locacionCiudadAjax, {
            id: id
        }, function(data) {
            Shared.ajaxCiudadSuccess(data);
        });
    },
    ajaxCiudadSuccess: function(options) {
        $(Shared.locacionCiudad).html(Shared.locacionCiudadDefault + options);
    },
    ajaxComuna: function(id) {

        $.get(Shared.locacionComunaAjax, {
            id: id
        }, function(data) {
            Shared.ajaxComunaSuccess(data);
        });
    },
    ajaxComunaSuccess: function(options) {
        $(Shared.locacionComuna).html(Shared.locacionComunaDefault + options);
    },
    setAcademico: function(className, selectLimit, loadCheckbox) {
  
        switch (selectLimit) {
            case 'instituciones':
                Shared.createAcademico(className, selectLimit, loadCheckbox);
                break;
            case 'facultad':
                Shared.createAcademico(className, 'instituciones', loadCheckbox);
                Shared.createAcademico(className, selectLimit, loadCheckbox);
                break;
            case 'carrera':
                Shared.createAcademico(className, 'instituciones', loadCheckbox);
                Shared.createAcademico(className, 'facultad', loadCheckbox);
                Shared.createAcademico(className, selectLimit, loadCheckbox);
                break;
            case 'escuela':
                Shared.createAcademico(className, 'instituciones', loadCheckbox);
                Shared.createAcademico(className, 'facultad', loadCheckbox);
                Shared.createAcademico(className, 'carrera', loadCheckbox);
                Shared.createAcademico(className, selectLimit, loadCheckbox);
                break;
            case 'programa_estudio':
                Shared.createAcademico(className, 'instituciones', loadCheckbox);
                Shared.createAcademico(className, 'facultad', loadCheckbox);
                Shared.createAcademico(className, 'carrera', loadCheckbox);
                Shared.createAcademico(className, 'programa_estudio', loadCheckbox);
                Shared.createAcademico(className, selectLimit, loadCheckbox);
                break;
        }

    },
    cleanAcademicoSelect: function(objSelect) {

        if ($(objSelect).prop('tagName') != 'SPAN') {
            $(objSelect).empty().append(new Option('(Seleccione)', ''));
        }
    },
    cleanAcademico: function(className, selectLimit) {
       
        switch (selectLimit) {

            case 'instituciones':
               
                Shared.cleanAcademicoSelect('#' + className + '_facultad');
                Shared.cleanAcademicoSelect('#' + className + '_carrera');
                Shared.cleanAcademicoSelect('#' + className + '_escuela');
                Shared.cleanAcademicoSelect('#' + className + '_programa_estudio');
                break;
            case 'facultad':
               
                Shared.cleanAcademicoSelect('#' + className + '_carrera');
                Shared.cleanAcademicoSelect('#' + className + '_escuela');
                Shared.cleanAcademicoSelect('#' + className + '_programa_estudio');
                break;
            case 'carrera':
                Shared.cleanAcademicoSelect('#' + className + '_escuela');
                Shared.cleanAcademicoSelect('#' + className + '_programa_estudio');
                break;
            case 'escuela':
                Shared.cleanAcademicoSelect('#' + className + '_programaestudio');
                break;
        }

    },
    cleanAcademicoCheckbox: function(className, selectLimit, loadCheckbox) {

        var checkboxType = '';
        switch (className) {

            case 'InstitucionFacultad':
                checkboxType = 'facultad';
                break;
            case 'FacultadCarrera':
                checkboxType = 'carrera';
                break;
            case 'CarreraEscuela':
                checkboxType = 'escuela';
                break;
            case 'EscuelaProgramaEstudio':
                checkboxType = 'programaestudio';
                break;
        }

        $("input[name='" + className + "[" + checkboxType + "][]']").each(function() {
            $(this).removeAttr('checked');
        });

    },
    createAcademico: function(className, selectLimit, loadCheckbox) {

        $('#' + className + '_' + selectLimit).change(function() {
            Shared.cleanAcademico(className, selectLimit);
            Shared.cleanAcademicoCheckbox(className, selectLimit, loadCheckbox);
            Shared.academicoAjax(className, selectLimit, loadCheckbox);

        });
    },
    academicoAjax: function(className, selectLimit, loadCheckbox) {


        var Ajax = '';
        var control = '';
        var Id;
        var idfacultad;
        var ajaxparametros = {};
        var selectId;
        switch (selectLimit) {

            case 'instituciones':
                control = new InstitucionFacultad();
                Ajax = control.actionAjaxInstitucionFacultad;                
                ajaxParametros = {
                    idInstitucion: $('#' + className + '_instituciones').val()
                };
                selectId = 'facultad';
                break;
            case 'facultad':
                control = new FacultadCarrera();
                Ajax = control.actionAjaxFacultadCarreras;
                ajaxParametros = {
                    idInstitucion: $('#' + className + '_instituciones').val(),
                    idFacultad: $('#' + className + '_facultad').val()

                };
                selectId = 'carrera';
                break;
            case 'carrera':
                control = new CarreraEscuela();
                Ajax = control.actionAjaxCarrerasEscuela;
                ajaxParametros = {
                    idInstitucion: $('#' + className + '_instituciones').val(),
                    idFacultad: $('#' + className + '_facultad').val(),
                    idCarrera: $('#' + className + '_carrera').val()

                };
                selectId = 'escuela';
                
                break;
            case 'escuela':
                control = new EscuelaProgramaEstudio();
                Ajax = control.actionAjaxEscuelaProgramaEstudio;
                ajaxParametros = {
                    idInstitucion: $('#' + className + '_instituciones').val(),
                    idFacultad: $('#' + className + '_facultad').val(),
                    idCarrera: $('#' + className + '_carrera').val(),
                    idEscuela: $('#' + className + '_escuela').val()
                };
                selectId = 'programa_estudio';
                break;
        }

        Shared.AddVarselect(className,ajaxParametros);
        
        $.get(Ajax, ajaxParametros, function(data) {
            
            Shared.academicoAjaxParse(className, selectId, loadCheckbox, JSON.parse(data));
        });
    },
    academicoAjaxParse: function(className, selectId, loadCheckbox, json) {

        if ($('#' + className + '_' + selectId).prop('tagName') == 'SPAN') {
         
            $("input[name='"+ className + "["+selectId+"][]']").each(function()
            {
                $(this).removeAttr('checked');

            });

            $("input[name='"+ className + "["+selectId+"][]']").each(function()
            {

                for (var i in json) {
                    if ($(this).val() == eval('json[i].'+selectId +'_id')) {

                        $(this).attr('checked', 'checked');
                    }
                }
            });

        } else {
            $('#' + className + '_' + selectId).empty().append('<option selected="selected" value="0"  >(Seleccione)</option>');
            for (var i in json) {

                $('#' + className + '_' + selectId).append(new Option(json[i].nombre, eval('json[i].'+selectId +'_id')));

            }
        }


    },
    
    AddVarselect: function(className,ajaxParametros){
 
                $('#' + className + '_institucion_id').val(ajaxParametros.idInstitucion),
                $('#' + className + '_facultad_id').val(ajaxParametros.idFacultad),
                $('#' + className + '_carrera_id').val(ajaxParametros.idCarrera),
                $('#' + className + '_escuela_id').val(ajaxParametros.idEscuela)
               
    }
};