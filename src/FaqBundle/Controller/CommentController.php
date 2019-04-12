<?php

namespace FaqBundle\Controller;

use FaqBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends Controller
{
    public function ajoutAction()
    {
        return $this->render('@Faq/Comment/ajout.html.twig');
    }


    public function showAllAction(Request $request)
    {
        $comments = new Comment();
        $em = $this->getDoctrine()->getManager();

        $comments = $em->getRepository('FaqBundle:Comment')->
        findBy(array('postId'=>$comments->getPostId()));

        return $this->render('@Faq/comment/showAll.html.twig', array(
            'comments' => $comments,
        ));

    }
}
