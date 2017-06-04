<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use AppBundle\Form\Type\MessageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/shoutbox")
 */
class ShoutboxController extends Controller
{
    /**
     * @Route("/messages", name="shoutbox_index")
     * @Method(methods={"GET"})
     */
    public function indexAction()
    {
        $messages = $this
            ->getDoctrine()
            ->getRepository(Message::class)
            ->findBy([], ['id' => 'DESC'], 100);

        return $this->render(':shoutbox:index.html.twig', [
            'messages' => $messages
        ]);
    }

    /**
     * @Route(name="shoutbox_form")
     * @Method(methods={"GET"})
     */
    public function formAction()
    {
        $form = $this->createMessageForm();

        return $this->render(':shoutbox:form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route(name="shoutbox_submit")
     * @Method(methods={"POST"})
     */
    public function submitAction(Request $request)
    {
        $message = new Message();
        $message->setUser($this->getUser());

        $form = $this->createMessageForm($message);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($message);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('homepage'));
    }

    private function createMessageForm($message = null)
    {
        return $this->createForm(MessageType::class, $message, [
            'action' => $this->generateUrl('shoutbox_submit'),
            'method' => 'POST'
        ]);
    }
}
