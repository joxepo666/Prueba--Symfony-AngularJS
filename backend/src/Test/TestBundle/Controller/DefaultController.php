<?php

namespace Test\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\View;
// Options Route Definition
use FOS\RestBundle\Controller\Annotations\Options;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Test\TestBundle\Entity\Producto;
use Test\TestBundle\Form\Type\ProductType;

class DefaultController extends FOSRestController
{
	
	// /**
	 // * OPTIONS Route annotation.
	 // * @Options("/productos")
	 // */
	 // public function getProductosOptions(){
		 // return true;
	 // }
	 

    /**
    * Get todos los productos
     * @return array
     *
     * @View()
     * @Get("/productos")
     */
    public function getProductosAction(){

        $productos = $this->getDoctrine()->getRepository("TestTestBundle:Producto")
            ->findAll();

        return ($productos);
    }

    /**
     * Get producto by ID
     * @param Producto $producto
     * @return array
     *
     * @View()
     * @ParamConverter("producto", class="TestTestBundle:Producto")
     * @Get("/productos/{id}",)
     */
    public function getProductoAction(Producto $producto){

        return ($producto);

    }

    /**
     * Crear Producto
     * @var Request $request
     * @return View|array
     *
     * @View()
     * @Post("/productos")
     */
    public function postProductoAction(Request $request)
    {	
		
        $producto = new Producto();
        $form = $this->createForm(new ProductType(), $producto);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();

            return array("producto" => $producto);

        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Editar Producto
     * Put action
     * @var Request $request
     * @var Producto $producto
     * @return array
     *
     * @View()
     * @ParamConverter("producto", class="TestTestBundle:Producto")
     * @Put("/productos/{id}")
     */
    public function putProductoAction(Request $request, Producto $producto)
    {
        $form = $this->createForm(new ProductType(), $producto);
        $form->submit($request);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($producto);
            $em->flush();

            return array("producto" => $producto);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Delete a Producto
     * Delete action
     * @var Producto $producto
     * @return array
     *
     * @View()
     * @ParamConverter("producto", class="TestTestBundle:Producto")
     * @Delete("/productos/{id}")
     */
    public function deleteProductoAction(Producto $producto)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($producto);
        $em->flush();

        return array("status" => "Deleted");
    }

}
