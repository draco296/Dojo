<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Image;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/gallery")
 */
class GalleryController extends Controller
{
    /**
     * @Route("", name="gallery_index")
     */
    public function indexAction()
    {
        $images = $this
            ->getDoctrine()
            ->getRepository(Image::class)
            ->findAll();

        return $this->render(':gallery:index.html.twig', [
            'images' => $images
        ]);
    }

    /**
     * @Route("/{id}", name="gallery_show")
     * @ParamConverter("image", class="AppBundle\Entity\Image")
     */
    public function showAction(Request $request, Image $image)
    {
        return $this->render(':gallery:show.html.twig', [
            'image' => $image
        ]);
    }
}
