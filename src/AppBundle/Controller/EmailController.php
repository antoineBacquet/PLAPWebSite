<?php
/**
 * Created by PhpStorm.
 * User: nadan
 * Date: 15/11/2017
 * Time: 22:29
 */

namespace AppBundle\Controller;

use AppBundle\Entity\CharApi;
use AppBundle\Util\UserUtil;
use Seat\Eseye\Containers\EsiAuthentication;
use Seat\Eseye\Eseye;
use Seat\Eseye\Exceptions\RequestFailedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


use AppBundle\CCP\CCPConfig;
use AppBundle\Util\ControllerUtil;
use AppBundle\Util\GroupUtil;

class EmailController extends Controller
{


    /**
     * List every email
     *
     * @Route("/emails", name="emailsmenu")
     */
    public function emailsMenuAction(Request $request)
    {

        $parameters = ControllerUtil::beforeRequest($this, $request, array(GroupUtil::$GROUP_LISTE['Membre']));
        if(!is_array($parameters)) return $parameters;

        $doctrine = $this->getDoctrine();
        $apiRep = $doctrine->getRepository(CharApi::class);


        /**
         * @var array(CharApi) $api
         */
        $apis = $apiRep->findByUser($parameters['user']);

        foreach($apis as $api){
            $authentication = new EsiAuthentication([
                'client_id'     => CCPConfig::$clientIDAPI,
                'secret'        => CCPConfig::$secretKEYAPI,
                'refresh_token' => $api->getRefreshToken()
            ]);

            $esi = new Eseye($authentication);

            $labels = $esi->invoke('get', '/characters/{character_id}/mail/labels/', [
                'character_id' => $api->getCharId(),
            ]);

            $api->unread  = $labels->total_unread_count;
        }


        $parameters['apis'] = $apis;

        return $this->render('email/emailsmenu.html.twig', $parameters);
    }

    /**
     * List every email
     *
     * @Route("/profile/emails/{id}", name="myemails1")
     */
    public function myEmailsNoLabelAction(Request $request, $id)
    {

        return $this->myEmailsAction($request, $id, 0);
    }

    /**
     * List every email
     *
     * @Route("/profile/emails/{id}/label/{label_id}", name="myemails")
     */
    public function myEmailsAction(Request $request, $id, $label_id)
    {
        $parameters = ControllerUtil::beforeRequest($this, $request, array(GroupUtil::$GROUP_LISTE['Membre']));
        if(!is_array($parameters)) return $parameters;


        $doctrine = $this->getDoctrine();
        $apiRep = $doctrine->getRepository(CharApi::class);

        /**
         * @var CharApi $api
         */
        $api = $apiRep->find($id);
        $parameters['api'] = $api;

        if($api === null) return $this->redirect($this->generateUrl('homepage')); //TODO error page

        if(!UserUtil::hasGroups($parameters['user'], array(GroupUtil::$GROUP_LISTE['Admin'])))
            if($api->getUser() != $parameters['user']) return $this->redirect($this->generateUrl('homepage')); //TODO error page


        $authentication = new EsiAuthentication([
            'client_id'     => CCPConfig::$clientIDAPI,
            'secret'        => CCPConfig::$secretKEYAPI,
            'refresh_token' => $api->getRefreshToken()
        ]);

        $esi = new Eseye($authentication);


        $labels = $esi->invoke('get', '/characters/{character_id}/mail/labels/', [
            'character_id' => $api->getCharId(),
        ]);

        //var_dump($labels->getArrayCopy());

        $parameters['labels'] = $labels->getArrayCopy();

        $esi->setQueryString(['labels' => $label_id]);

        $emails = $esi->invoke('get', '/characters/{character_id}/mail/', [
            'character_id' => $api->getCharId()
        ]);
        //var_dump($emails->getArrayCopy());

        $parameters['emails'] = $emails->getArrayCopy();

        return $this->render('profile/emails.html.twig', $parameters);

    }

    /**
     * Show an email
     *
     * @Route("/profile/email/{id_api}/{id_email}", name="email")
     */
    public function emailAction(Request $request, $id_api, $id_email)
    {

        $parameters = ControllerUtil::beforeRequest($this, $request, array(GroupUtil::$GROUP_LISTE['Membre']));
        if(!is_array($parameters)) return $parameters;


        //TODO make sure one of the user api

        $doctrine = $this->getDoctrine();
        $apiRep = $doctrine->getRepository(CharApi::class);

        $api = $apiRep->find($id_api);
        $parameters['api'] = $api;

        if($api === null) return $this->redirect($this->generateUrl('homepage')); //TODO error page

        if(!UserUtil::hasGroups($parameters['user'], array(GroupUtil::$GROUP_LISTE['Admin'])))
            if($api->getUser() != $parameters['user']) return $this->redirect($this->generateUrl('homepage')); //TODO error page


        $authentication = new EsiAuthentication([
            'client_id'     => CCPConfig::$clientIDAPI,
            'secret'        => CCPConfig::$secretKEYAPI,
            'refresh_token' => $api->getRefreshToken()
        ]);

        $esi = new Eseye($authentication);

        $email = null;
        try{
            $email = $esi->invoke('get', '/characters/{character_id}/mail/{mail_id}/', [
                'character_id' => $api->getCharId(),
                'mail_id' => $id_email,
            ]);

        }
        catch (RequestFailedException $e){
            return $this->redirect($this->generateUrl('homepage')); //TODO error page
        }

        $email->body = html_entity_decode($email->body);
        $parameters['email'] = $email;

        return $this->render('profile/email.html.twig', $parameters);


    }

}