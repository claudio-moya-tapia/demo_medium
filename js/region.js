/**
 * 
 * @class Region
 * @extends Controller
 */
function Region() {
    this.init();
}

Region.prototype = new Controller();
Region.prototype.constructor = Region;

Region.prototype.create = function() {
    Shared.init();
    Shared.setLocacion('Region');
};

Region.prototype.update = function() {
    Shared.init();
    Shared.setLocacion('Region');
};