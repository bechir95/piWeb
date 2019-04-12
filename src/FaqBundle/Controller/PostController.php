<?php

namespace FaqBundle\Controller;

use FaqBundle\Entity\Post;
use FaqBundle\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Post controller.
 *
 */
class PostController extends Controller
{

    public function ajoutAction(Request $request){
        $post=new Post();
        $Form=$this->createForm(PostType::class,$post);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
        //    return$this->redirectToRoute('faq_homepage');
        }
        return $this->render('@Faq/Post/ajouter.html.twig',
            array('formulaire'=>$Form->createView()));
    }

    /**
     * Lists all post entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('FaqBundle:Post')->findAll();
        /*$comments = array();
        foreach($posts as $post){

            $comments=$em->getRepository("FaqBundle:Comment")->findAllComment(1);

        }
        $posts = $comments;*/

        return $this->render('@Faq/post/displyAll.html.twig', array(
            'posts' => $posts,
        ));

    }


    /**
     * Finds and displays a post entity.
     *
     */
    public function showAction(Post $post)
    {

        return $this->render('@Faq/post/displyAll.html.twig', array(
            'post' => $post,
        ));
    }

}
