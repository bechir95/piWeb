<?php

namespace BackBundle\Controller;

use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function allServiceAction()
    {
        $em = $this->getDoctrine()->getManager();

        $services = $em->getRepository('ServiceBundle:Servic')->findAll();

        return $this->render('@Back/Default/allService.html.twig',
            array(
                'services'   => $services,

            ));
    }

    function deleteServiceAction($id){

        $em=$this->getDoctrine()->getManager();


        $service=$em->getRepository("ServiceBundle:Servic")->find($id);

        $em->remove($service);
        $em->flush();

        return $this->redirectToRoute('back_service');
    }

    public function allForumAction()
    {
        $em = $this->getDoctrine()->getManager();

        $forums = $em->getRepository('ForumBundle:Forum')->findAll();

        return $this->render('@Back/Default/allForum.html.twig',
            array(
                'forums'   => $forums,

            ));
    }

    function deleteForumAction($id){

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
         return $this->redirectToRoute('forum_disply');
    }

    public function allReplyAction()
    {
        $em = $this->getDoctrine()->getManager();

        $replys = $em->getRepository('ForumBundle:Reply')->findAll();

        return $this->render('@Back/Default/allReply.html.twig',
            array(
                'replys'   => $replys,

            ));
    }

    function deleteReplyAction($id){

        $em=$this->getDoctrine()->getManager();


        $reply=$em->getRepository("ForumBundle:Reply")->find($id);

        $em->remove($reply);
        $em->flush();

        return $this->redirectToRoute('back_reply');
    }

    public function allGardenerAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gardeners = $em->getRepository('ServiceBundle:Gardener')->findAll();

        return $this->render('@Back/Default/allGardener.html.twig',
            array(
                'gardeners'   => $gardeners,

            ));
    }

    function deleteGardenerAction($id){

        $this->deleteServiceAction($id);
        $em=$this->getDoctrine()->getManager();
        $gardener=$em->getRepository("ServiceBundle:Gardener")->find($id);
        $em->remove($gardener);
        $em->flush();
        return $this->redirectToRoute('back_gardener');
    }



    public function indexAction()
    {
        return $this->render('ForumBundle:Default:index.html.twig');
    }

    public function chartAction()
    {
        $pieChart = new ColumnChart();
        $m = $this->getDoctrine()->getManager();

        $forumStat = $m->getRepository('ForumBundle:Forum')->findAll();

        $mark = $m->getRepository('ForumBundle:Likeforum')->findAll();

        $type = array();
        $s = 0;
        foreach ($mark as $type1) {
            if ($type1->getForum()->getId()) {
                array_push($type, $type1);
                $s = $s + 1;
            }
        }


        $mark1 = $m->getRepository('ForumBundle:Dislikedforum')->findAll();
        $t = array();
        $y = 0;

        foreach ($mark1 as $type2) {
            if ($type2->getForum()->getId()) {
                array_push($t, $type2);
                $y = $y + 1;
            }
        }

        $pieChart->getData()->setArrayToDataTable([
            ['', 'likes', 'dislikes'],
            ['', $s, $y ],

        ]);


        $pieChart->getOptions()->setTitle('Question Statut');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('@Back\Default\index.html.twig', array('piechart' => $pieChart));
    }



}
