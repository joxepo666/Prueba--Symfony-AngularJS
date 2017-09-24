/**
 * Created by Iraitz on 23/09/17.
 */

angular.module('productoApp',['ui.router','ngResource','productoApp.controllers','productoApp.services']);

angular.module('productoApp').config(function($stateProvider,$httpProvider){
    $stateProvider.state('productos',{
        url:'/productos',
        templateUrl:'partials/productos.html',
        controller:'ProductoListController'
    }).state('viewProducto',{
       url:'/productos/:id/view',
       templateUrl:'partials/producto-view.html',
       controller:'ProductoViewController'
    }).state('newProducto',{
        url:'/productos/new',
        templateUrl:'partials/producto-add.html',
        controller:'ProductoCreateController'
    }).state('editProducto',{
        url:'/productos/:id/edit',
        templateUrl:'partials/producto-edit.html',
        controller:'ProductoEditController'
    });
    $httpProvider.defaults.headers.common = {};
    //$httpProvider.defaults.headers.post = {};
    //$httpProvider.defaults.headers.put = {};
    $httpProvider.defaults.headers.patch = {};
}).run(function($state){
   $state.go('productos');
});