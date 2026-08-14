<?php
namespace JSEditor\Controller\Site;

use Laminas\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $siteSettings = $this->siteSettings();
        $response = $this->getResponse();
        $response->getHeaders()->addHeaderLine('Content-Type', 'text/javascript; charset=utf-8');
        $response->setContent($this->siteSettings()->get('js_editor_js'));
        return $response;
    }
}
