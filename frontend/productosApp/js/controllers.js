/**
 * Created by Iraitz on 23/09/17..
 */
angular.module('productoApp.controllers',[]).controller('ProductoListController',function($scope,$state,popupService,$window,Producto){
    //Recoger todos los productos
    $scope.productos = Producto.query();
    
    //Borrar producto
    $scope.deleteProducto=function(producto){
        if(popupService.showPopup('¿Seguro que desea borrar el producto?')){
            producto.$delete(function(){
                $window.location.href='';
            });
        }
    };

}).controller('ProductoViewController',function($scope,$stateParams,Producto){
    //Recoger un único producto
    var prod = Producto.get({id:$stateParams.id});
    $scope.producto=prod;

}).controller('ProductoCreateController',function($scope,$state,Producto){
    //Crear producto
    $scope.producto=new Producto();

    $scope.addProducto=function(){
        $scope.producto.$save(function(){
            $state.go('productos');
        });
    };

}).controller('ProductoEditController',function($scope,$state,$stateParams,Producto){
    //Actualizar Producto
    $scope.updateProducto=function(){
        $scope.producto.$update(function(){
            $state.go('productos');
        });
    };

    // Cargar datos del producto en el formulario
    $scope.loadProducto=function(){
        $scope.producto=Producto.get({id:$stateParams.id});
    };

    $scope.loadProducto();
});