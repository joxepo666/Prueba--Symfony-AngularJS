/**
 * Created by Iraitz on 23/09/17..
 */

angular.module('productoApp.services',[]).factory('Producto',function($resource){
    return $resource('http://localhost:8000/app_dev.php/api/productos/:id',{id:'@id'},
    {
        update: {
            method: 'PUT'
//        },
//        save: {
//            method: 'POST'
        }
    });
}).service('popupService',function($window){
    this.showPopup=function(message){
        return $window.confirm(message);
    };
});