/**
 * 
 * @class JsController
 * 
 */
function Controller() {
    this.name = 'Controller';    
    this.controller = '';
    this.actionIndex = '';
    this.actionCreate = '';
    this.actionView = '';
    this.actionUpdate = ''; 
    this.actionManage = '';
    this.actionList = '';
    
};

Controller.prototype.init = function() {
    var name = new String(this.constructor.name);
    this.name = name.toString();
    this.nameLower = name.toLowerCase();

    this.controller = Config.baseUrl + '/' + this.name;
    this.actionIndex = this.controller + '/index';
    this.actionCreate = this.controller + '/create';
    this.actionView = this.controller + '/view';
    this.actionUpdate = this.controller + '/update';  
    this.actionManage = this.controller + '/manage';
    this.actionList = this.controller + '/list';
};

Controller.prototype.index = function() {

};

Controller.prototype.create = function() {

};

Controller.prototype.view = function() {

};

Controller.prototype.update = function() {

};

Controller.prototype.admin = function() {

};

Controller.prototype.error = function() {

};

Controller.prototype.manage = function() {

};

Controller.prototype.list = function() {

};

Controller.prototype.login = function() {

};

Controller.prototype.getActionUrl = function(actionName) {
    return this.controller+'/'+actionName;
};