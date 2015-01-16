/**
 * 
 * @class Ciudad
 * @extends Controller
 */
function Ciudad() {
    this.init();
}

Ciudad.prototype = new Controller();
Ciudad.prototype.constructor = Ciudad;

Ciudad.prototype.create = function() {
    Shared.init();
    Shared.setLocacion('Ciudad');
};


Ciudad.prototype.update = function() {
    Shared.init();
    Shared.setLocacion('Ciudad');
};