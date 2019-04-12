<?php


namespace ForumBundle\Controller;


use ForumBundle\Entity\Forum;
use ForumBundle\Form\ForumType;
use Symfony\Component\HttpFoundation\Request;

class ReplyController
{

    public function createAction(Request $request){
        $forum=new Forum();
        $Form=$this->createForm(ForumType::class,$forum);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($forum);
            $em->flush();
            //    return$this->redirectToRoute('Forum_homepage');
        }
        return $this->render('@Forum/Forum/ajouter.html.twig',
            array('formulaire'=>$Form->createView()));
    }

    /**
     * Lists all forum entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $forums = $em->getRepository('ForumBundle:Forum')->findAll();
        /*$comments = array();
        foreach($forums as $forum){

            $comments=$em->getRepository("ForumBundle:Comment")->findAllComment(1);

        }
        $forums = $comments;*/

        return $this->render('@Forum/forum/displyAll.html.twig', array(
            'forums' => $forums,
        ));

    }


    /**
     * Finds and displays a forum entity.
     *
     */
    public function showAction(Forum $forum)
    {

        return $this->render('@Forum/forum/displyAll.html.twig', array(
            'forum' => $forum,
        ));
    }
}