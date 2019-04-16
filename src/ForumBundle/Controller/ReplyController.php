<?php


namespace ForumBundle\Controller;


use ForumBundle\Entity\Forum;
use ForumBundle\Form\ForumType;
use ForumBundle\Form\ReplyType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReplyController extends Controller
{

    public function createAction(Request $request){
        $forum=new Forum();
        $Form=$this->createForm(ForumType::class,$forum);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){

            $em=$this->getDoctrine()->getManager();

            $em->persist($forum);
            $em->flush();
            return $this->redirect($request->getUri());
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

    /**
     *  edit
     */


    function editAction($id,Request $request){

        $em=$this->getDoctrine()->getManager();
        $reply=$em->getRepository("ForumBundle:Reply")->find($id);

        $Form=$this->createForm(ReplyType::class,$reply);
        $Form->handleRequest($request);


        if($Form->isValid() && $Form->isSubmitted()){
            $em->persist($reply);
            $em->flush();

            return $this->redirect($request->getUri());
        }
        return $this->render('@Forum/Forum/editReply.html.twig',
            array(
                'formulaire'=>$Form->createView(),

            )
        );
    }

    function deleteAction($id){

        $em=$this->getDoctrine()->getManager();


        $reply=$em->getRepository("ForumBundle:Reply")->find($id);

        $em->remove($reply);
        $em->flush();


        $em->flush();
        return $this->redirectToRoute('forum_disply');
    }

    function moinsAction($id){

        $em=$this->getDoctrine()->getManager();
        $reply=$em->getRepository("ForumBundle:Reply")->find($id);

        $reply->setRate($reply->getRate() - 1);
        $em = $this->getDoctrine()->getManager();
        $em->persist($reply);
        $em->flush();
        return $this->redirectToRoute('forum_disply');

    }

    function plusAction($id){

        $em=$this->getDoctrine()->getManager();
        $reply=$em->getRepository("ForumBundle:Reply")->find($id);

        $reply->setRate($reply->getRate() + 1);
        $em = $this->getDoctrine()->getManager();
        $em->persist($reply);
        $em->flush();
        return $this->redirectToRoute('forum_disply');


    }

}