<?php


namespace ForumBundle\Controller;

use ForumBundle\Entity\Dislikedforum;
use ForumBundle\Entity\Forum;
use ForumBundle\Entity\Likeforum;
use ForumBundle\Entity\Reply;
use ForumBundle\Form\DislikedforumType;
use ForumBundle\Form\ForumType;
use ForumBundle\Form\LikeforumType;
use ForumBundle\Form\ReplyType;
use Mgilet\NotificationBundle\Entity\NotifiableNotification;
use Mgilet\NotificationBundle\Entity\Notification;
use Proxies\__CG__\Mgilet\NotificationBundle\Entity\NotifiableEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



/**
 * Forum controller.
 *
 */
class   ForumController extends Controller
{


    public function testAction(Request $request){

        $em=$this->getDoctrine()->getManager();

        $n= $em->getRepository('Mgilet\NotificationBundle\Entity\NotifiableEntity')->findLast();


        return $this->render('@Forum/Default/index.html.twig');
    }

    public function createAction(Request $request){


        $forum=new Forum();
        $Form=$this->createForm(ForumType::class,$forum);
        $Form->handleRequest($request);


        $am=$this->getDoctrine()->getManager();
        $categorys= $am->getRepository('ForumBundle:Category')->findAll();


        if($Form->isSubmitted() && $Form->isValid()){


            $now = new \DateTime();
            $now->format('Y/m/d h m s');
            $forum->setCreatedAt($now);
            $forum->setUser($this->getUser());
            $em=$this->getDoctrine()->getManager();
            $em->persist($forum);
            $em->flush();

            return $this->redirect($request->getUri());

        }

        return $this->render('@Forum/Forum/ajouter.html.twig',
            array(
                'formulaire'=>$Form->createView(),
                'categorys' => $categorys,

            )
        );
    }

    /**
     * Lists all forum entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //$forums = $em->getRepository('ForumBundle:Forum')->findAll();
        $replys = $em->getRepository('ForumBundle:Reply')->findAll();

        /**
         * @var $paginator /Knp/Component/Pager/Paginator
         */
       $dql = "SELECT bp From  ForumBundle:Forum bp";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1),       /*page number*/
            $request->query->getInt('limit', 5)


        );


        return $this->render('@Forum/forum/displyAll.html.twig', array(
            'forums' => $result,
            'replys' => $replys,
            //'pagination' => $result
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

        usort($replys, function($a, $b) {
            return $a['rate'] - $b['rate'];
        });
        dump($replys);

        ////find all likes
        $likes=$em->getRepository("ForumBundle:Likeforum")->findAll();
        $dislikes=$em->getRepository("ForumBundle:Dislikedforum")->findAll();

        $forumm=new Reply();
        $Form=$this->createForm(ReplyType::class,$forumm);
        $Form->handleRequest($request);

        if($Form->isSubmitted() && $Form->isValid()) {
            $now = new \DateTime();
            $now->format('Y/m/d h m s');

            /// create noification /////
            $notif = new Notification();

            $notif->setMessage($forumm->getContent());
            $notif->setSubject(' reply from '.$this->getUser()->getUsername());
            $notif->setDate($now);
            $notif->setLink($id);

            $em = $this->getDoctrine()->getManager();
            $em->persist($notif);
            $em->flush();

            ///// create notifiable_notification ////
            $notifiable_entity = new NotifiableEntity();
            $notifiable_entity->setIdentifier($forum->getUser()->getId());
            $notifiable_entity->setClass($this->getUser()->getUsername());

            $em = $this->getDoctrine()->getManager();
            $em->persist($notifiable_entity);
            $em->flush();

            ///// create notifiable_notification ////
            ///
            $notification_id= $em->getRepository('Mgilet\NotificationBundle\Entity\Notification')->findLast();
            $notification_object = $em->getRepository('Mgilet\NotificationBundle\Entity\Notification')->find($notification_id);
            $notifiable_id= $em->getRepository('Mgilet\NotificationBundle\Entity\NotifiableEntity')->findLast();
            $notifiable_object = $em->getRepository('Mgilet\NotificationBundle\Entity\NotifiableEntity')->find($notifiable_id);

            $notifiable_notification = new NotifiableNotification();
            $notifiable_notification->setNotifiableEntity($notifiable_object);
            $notifiable_notification->setNotification($notification_object);

            $em = $this->getDoctrine()->getManager();
            $em->persist($notifiable_notification);
            $em->flush();
            ///////////////////////////////
            $forumm->setUser( $this->getUser() );
            $forumm->setForum($forum);

            $forumm->setCreatedAt($now);

            $em = $this->getDoctrine()->getManager();
            $em->persist($forumm);
            $em->flush();

            return $this->redirect($request->getUri());
        }

        //// this for like or dislike
        $like = new Likeforum();
        $FormLike =$this->createForm(LikeforumType::class,$like);
        $FormLike->handleRequest($request);


        $didHeLIkeIt=$em->getRepository("ForumBundle:Likeforum")->findUserLikedForumDQL($this->getUser(),$id);
        $didHeDisLIkeIt=$em->getRepository("ForumBundle:Dislikedforum")->findUserDislikedLikedForumDQL($this->getUser(),$id);

        if($FormLike->isSubmitted() && $FormLike->isValid()){

      if ( $didHeDisLIkeIt != null){
                $em->remove($didHeDisLIkeIt[0]);
            }
            $like->setUser($this->getUser());
            $like->setForum($forum);
            $em=$this->getDoctrine()->getManager();
            $em->persist($like);
            $em->flush();
            return $this->redirect($request->getUri());
        }

        //// this for like or dislike
        $Dislike = new Dislikedforum();
        $FormDisLike =$this->createForm(DislikedforumType::class,$Dislike);
        $FormDisLike->handleRequest($request);

        if($FormDisLike->isSubmitted() && $FormDisLike->isValid()){

            if ( $didHeLIkeIt != null){
                $em->remove($didHeLIkeIt[0]);
            }
            $Dislike->setUser($this->getUser());
            $Dislike->setForum($forum);//forum hiya el id ta3 form li m2edinha li n7ebou nbadlou faha
            $em=$this->getDoctrine()->getManager();
            $em->persist($Dislike);
            $em->flush();
            return $this->redirect($request->getUri());
        }

        return $this->render('@Forum/forum/show.html.twig', array(
            'forum' => $forum,
            'replys' => $replys,
            'likes' => $likes,
            'dislikes' => $dislikes,
            'formulaire'=>$Form->createView(),
            'formulaireLike' => $FormLike->createView(),
            'formulaireDisLike' => $FormDisLike->createView(),
            'didHeLIkeIt' => $didHeLIkeIt,
            'didHeDisLIkeIt' => $didHeDisLIkeIt,
        ));
    }


    /**
     *  edit
     */


    function editAction($id,Request $request){

        $em=$this->getDoctrine()->getManager();
        $forum=$em->getRepository("ForumBundle:Forum")->find($id);
        $Form=$this->createForm(ForumType::class,$forum);
        $Form->handleRequest($request);

        $categorys=$em->getRepository("ForumBundle:Category")->findAll();
        if($Form->isValid() && $Form->isSubmitted() ){
            $em->persist($forum);
            $em->flush();
            return $this->redirect($request->getUri());
        }
        return $this->render('@Forum/Forum/ajouter.html.twig',
            array(
                'formulaire'=>$Form->createView(),
                'categorys' => $categorys,

            )
        );
    }

    function deleteAction($id){

        $em=$this->getDoctrine()->getManager();

        $replys = $em->getRepository('ForumBundle:Reply')->findForumDQL($id);

        foreach ($replys as $reply) {
            $em->remove($reply);
        }

        $em->flush();

        $likes = $em->getRepository('ForumBundle:Likeforum')->findLikedForumDQL($id);

        foreach ($likes as $like) {
            $em->remove($like);
        }

        $em->flush();

        $dislikes = $em->getRepository('ForumBundle:Dislikedforum')->findDislikedForumDQL($id);

        foreach ($dislikes as $dislike) {
            $em->remove($dislike);
        }

        $em->flush();


        $forum=$em->getRepository("ForumBundle:Forum")->find($id);
        $em->remove($forum);
        $em->flush();



        return $this->redirectToRoute('back_forum');
    }



}
