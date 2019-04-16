<?php

namespace ServiceBundle\Controller;

use ServiceBundle\Entity\Servic;
use ServiceBundle\Form\ServicType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ServiceController extends Controller
{
    public function indexAction()
    {

            $notifiable = $this->getUser()->getId();

            $identifier = $this->get('doctrine.orm.entity_manager')->getRepository('MgiletNotificationBundle:NotifiableEntity');
            $n = $identifier->findNotifDQL($notifiable);
            $notifiableRepo = $this->get('doctrine.orm.entity_manager')->getRepository('MgiletNotificationBundle:NotifiableNotification');

            if ($n != null) {

                foreach ($n as $x) {
                    $notificationList[] = $notifiableRepo->findAllForNotifiableId($x->getId());

                }
            } else {
                $notificationList = $notifiableRepo->findAllForNotifiableId($notifiable);
            }




        $em = $this->getDoctrine()->getManager();

        $services = $em->getRepository('ServiceBundle:Servic')->findAll();
        $gardeners = $em->getRepository('ServiceBundle:Gardener')->findAll();

        return $this->render('@Service/Service/index.html.twig',
            array(
                'services'   => $services,
                'gardeners' => $gardeners,
                'notificationList' => $notificationList,
                'notifiableNotifications' => $notificationList // deprecated: alias for backward compatibility only
            ));
    }

    public function showAction($id)
    {

        $notifiable = $this->getUser()->getId();

        $identifier = $this->get('doctrine.orm.entity_manager')->getRepository('MgiletNotificationBundle:NotifiableEntity');
        $n = $identifier->findNotifDQL($notifiable);
        $notifiableRepo = $this->get('doctrine.orm.entity_manager')->getRepository('MgiletNotificationBundle:NotifiableNotification');

        if ($n != null) {

            foreach ($n as $x) {
                $notificationList[] = $notifiableRepo->findAllForNotifiableId($x->getId());

            }
        } else {
            $notificationList = $notifiableRepo->findAllForNotifiableId($notifiable);
        }

        $em = $this->getDoctrine()->getManager();

        $services = $em->getRepository('ServiceBundle:Servic')->findAll();

        $selectedService = $em->getRepository('ServiceBundle:Servic')->find($id);

        return $this->render('@Service/Service/show.html.twig',
            array(
                'services'   => $services,
                'selectedService'   => $selectedService,
                'notificationList' => $notificationList,
                'notifiableNotifications' => $notificationList // deprecated: alias for backward compatibility only
            ));
    }

    public function createAction(Request $request)
    {

        $notifiable = $this->getUser()->getId();

        $identifier = $this->get('doctrine.orm.entity_manager')->getRepository('MgiletNotificationBundle:NotifiableEntity');
        $n = $identifier->findNotifDQL($notifiable);
        $notifiableRepo = $this->get('doctrine.orm.entity_manager')->getRepository('MgiletNotificationBundle:NotifiableNotification');

        if ($n != null) {

            foreach ($n as $x) {
                $notificationList[] = $notifiableRepo->findAllForNotifiableId($x->getId());

            }
        } else {
            $notificationList = $notifiableRepo->findAllForNotifiableId($notifiable);
        }



        $service=new Servic();

        $Form=$this->createForm(ServicType::class,$service);
        $Form->handleRequest($request);

        $am = $this->getDoctrine()->getManager();
        $gardeners = $am->getRepository('ServiceBundle:Gardener')->findAll();


        if($Form->isSubmitted() && $Form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($service);
            $em->flush();

        }
        return $this->render('@Service/Service/create.html.twig',
            array(
                'formulaire' => $Form->createView(),
                'gardeners'  => $gardeners,
                'notificationList' => $notificationList,
                'notifiableNotifications' => $notificationList // deprecated: alias for backward compatibility only

            )

        );

    }
}