<?php

namespace JSEditor;

use Omeka\Module\AbstractModule;
use Omeka\Permissions\Assertion\HasSitePermissionAssertion;
use Laminas\EventManager\Event;
use Laminas\Mvc\MvcEvent;
use Laminas\EventManager\SharedEventManagerInterface;

class Module extends AbstractModule
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $event)
    {
        parent::onBootstrap($event);
        $acl = $this->getServiceLocator()->get('Omeka\Acl');
        $acl->allow(
            null,
            'JSEditor\Controller\Site\Index'
        );
        $acl->allow(
            null,
            'JSEditor\Controller\Admin\Index'
        );
        $acl->allow(
            null,
            'Omeka\Entity\Site',
            'js-editor-modify',
            new HasSitePermissionAssertion('admin')
        );
    }

    public function addJS(Event $event)
    {
        $services = $this->getServiceLocator();
        if (!$services->get('Omeka\Status')->isSiteRequest()) {
            return;
        }
        $view = $event->getTarget();
        $view->headScript()->appendFile($view->url('site/js-editor', [
            'site-slug' => $view->site->slug(),
        ]));
        $siteSettings = $services->get('Omeka\Settings\Site');
        $externalJs = $siteSettings->get('js_editor_external_js');
        if ($externalJs) {
            foreach ($externalJs as $uri) {
                $view->headScript()->appendFile($uri);
            }
        }
    }

    public function attachListeners(SharedEventManagerInterface $sharedEventManager)
    {
        $sharedEventManager->attach('*', 'view.layout', [$this, 'addJS']);
    }
}
