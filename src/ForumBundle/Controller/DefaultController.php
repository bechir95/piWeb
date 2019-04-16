<?php

namespace ForumBundle\Controller;

use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class DefaultController extends Controller
{
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

            $type=array();
            $s=0;
        foreach ($mark as $type1)
        {
            if($type1->getForum()->getId()){
                array_push($type,$type1);
                $s=$s+1;
            }
        }


        $mark1 = $m->getRepository('ForumBundle:Dislikedforum')->findAll();
        $t=array();
        $y=0;

        foreach ($mark1 as $type2)
        {
            if($type2->getForum()->getId()){
            array_push($t, $type2);
            $y = $y + 1;
        }
        }

        $pieChart->getData()->setArrayToDataTable([
            ['', 'likes', 'dislikes'],
            ['oct-17', 1, 3],

        ]);









        $pieChart->getOptions()->setTitle('Question Statut');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('@Forum\Default\index.html.twig', array('piechart' => $pieChart));
    }
}
