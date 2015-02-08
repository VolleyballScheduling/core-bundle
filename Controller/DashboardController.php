<?php
namespace Volleyball\Bundle\CoreBundle\Controller;

use \Symfony\Component\HttpFoundation\Request;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DashboardController extends \Volleyball\Bundle\CoreBundle\Controller\CoreController
{
    /**
     * @Route("/dashboard", name="dashboard")
     * @Template("VolleyballResourceBundle:Dashboard:index.html.twig")
     * @param Request $request
     */
    public function dashboardAction(Request $request)
    {
        if (!$this->securityContext->isGranted('ROLE_USER')) {
            return $this->forward('VolleyballCoreBundle:Homepage:index');
        }
        
        $widgets = $this
                ->get('volleyball.dashboard.widget_manager')
                ->getWidgets();
                //->getUserWidgets($this->securityContext->getToken()->getUser());
                
        return array(
            'widgets' => $widgets,
            'id' => $request->query->get('segment', null)
        );
    }
}
