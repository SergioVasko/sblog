<?php

namespace Blog\AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

/**
 * Class SecurityController
 */
class SecurityController extends Controller
{
    /**
     * Login
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/login")
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(Security::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(Security::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(Security::AUTHENTICATION_ERROR);
            $session->remove(Security::AUTHENTICATION_ERROR);
        }

        return $this->render(
            'AdminBundle:Security:login.html.twig',
            array(
                // last user name entered by the user
                'last_username' => $session->get(Security::LAST_USERNAME),
                'error'         => $error,

            )
        );
    }

    /**
     * Login check
     *
     * @Route("login_check")
     */
    public function loginCheckAction()
    {

    }
}
