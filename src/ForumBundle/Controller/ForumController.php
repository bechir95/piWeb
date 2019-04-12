<?php

namespace ForumBundle\Controller;

use ForumBundle\Entity\Forum;
use ForumBundle\Entity\Reply;
use ForumBundle\Form\ForumType;
use ForumBundle\Form\ReplyType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Forum controller.
 *
 */
class ForumController extends Controller
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

    public function showAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $forum=$em->getRepository("ForumBundle:Forum")->find($id);

        //// find by forum id
        $replys=$em->getRepository("ForumBundle:Reply")->findForumDQL($id);


        $forumm=new Reply();
        $Form=$this->createForm(ReplyType::class,$forumm);
        $Form->handleRequest($request);

        if($Form->isSubmitted()) {
//lazem n3adinou el object user li eni ma3andich menha tawa w jawou ywali behi !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            //$forumm->setUser(1);
            $forumm->setForum($forum);
            $now = new \DateTime();
            $now->format('Y/m/d');
            $forumm->setCreatedAt($now);

            $em = $this->getDoctrine()->getManager();
            $em->persist($forumm);
            $em->flush();
            //    return$this->redirectToRoute('Forum_homepage');
        }

        return $this->render('@Forum/forum/show.html.twig', array(
            'forum' => $forum,
            'replys' => $replys,
            'formulaire'=>$Form->createView(),

        ));
    }

}
