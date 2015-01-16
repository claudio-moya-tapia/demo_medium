/**
 * @name Documento
 * @class Documento
 *
 */
var Documento = {
    
    onUploadSuccess:function(){},
    documento_id:0,
    tipo_documento_id:0,
    fecha_creacion:'',
    nombre:'',
    mimetype:'',
    extension:'',
    peso:'',
    url:'',
    
    init:function(){
        this.documento_id = 0;                
        this.tipo_documento_id = 0;
        this.fecha_creacion = '';
        this.nombre = '';
        this.mimetype = '';
        this.extension = '';
        this.peso = '';
        this.url = '';
        
        return this;
    },
    
    initJson:function(jsonData){
        this.documento_id = jsonData.documento_id;                
        this.tipo_documento_id = jsonData.tipo_documento_id;
        this.fecha_creacion = jsonData.fecha_creacion;
        this.nombre = jsonData.nombre;
        this.mimetype = jsonData.mimetype;
        this.extension = jsonData.extension;
        this.peso = jsonData.peso;
        this.url = jsonData.url;
    },
        
    /**
     * 
     * @public
     */
    uploadify:function(objectId){
        
        $(objectId).uploadify({                
            'swf'      : Config.baseUrl+'/js/uploadify/uploadify.swf',
            'uploader' : Config.baseUrl+'/documento/create',     
            'cancelImg' : Config.baseUrl+'/js/uploadify/uploadify-cancel.png',
            'buttonText': 'Subir',
            'multi'    : true,
            'onUploadComplete': function(file, data, response) {
               
            },
            'onUploadSuccess' : function(file, data, response) {    
                var DocumentoJson = Documento.init();                
                DocumentoJson.initJson(JSON.parse(data));
                Documento.onUploadSuccess(DocumentoJson);
            },
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                               
            }
        });
    }
    
};