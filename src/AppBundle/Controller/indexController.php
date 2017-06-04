<?php
/**
 * Created by PhpStorm.
 * User: Kuba
 * Date: 2017-06-04
 * Time: 15:58
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class indexController
{
    /**
     * @Route("/index")
     */
    public function show()
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}