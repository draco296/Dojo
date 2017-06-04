<?php
/**
 * Created by PhpStorm.
 * User: Kuba
 * Date: 2017-06-04
 * Time: 20:48
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class Kalendarz extends Controller
{
    /**
     * @Route("/kalendarz", name="kalendarz")
     */
    public function KalendarzShow(Request $request)
    {
        return $this->render('default/kalendarz.html.twig');
    }


}