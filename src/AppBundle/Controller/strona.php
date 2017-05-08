<?php
/**
 * Created by PhpStorm.
 * User: Kuba
 * Date: 2017-05-07
 * Time: 19:13
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class strona
{
    /**
     * @Route(/strona)
     */
    public function  numberAction()
    {
        return new Response("strona");
    }

}