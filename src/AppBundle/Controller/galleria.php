<?php
/**
 * Created by PhpStorm.
 * User: Kuba
 * Date: 2017-06-04
 * Time: 16:16
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class galleria extends Controller
{
    /**
     * @Route("/galleria", name="galleria")
     */
    public function galleriaShow(Request $request)
    {
        return $this->render('default/galleria.html.twig');
    }
}