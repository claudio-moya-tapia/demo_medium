/**
 * 
 * @class Cargo
 * @extends Controller
 */
function Cargo() {
    this.init();
    this.actionAjaxCargo = this.controller+'/ajaxCargo';       
}

Cargo.prototype = new Controller();
Cargo.prototype.constructor = Cargo;
