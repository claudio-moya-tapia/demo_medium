/**
 * 
 * @class Comuna
 * @extends Controller
 */
function Comuna() {
    this.init();
}

Comuna.prototype = new Controller();
Comuna.prototype.constructor = Comuna;

Comuna.prototype.create = function() {
    Shared.init();
    Shared.setLocacion('Comuna');
};


Comuna.prototype.update = function() {
    Shared.init();
    Shared.setLocacion('Comuna');
};