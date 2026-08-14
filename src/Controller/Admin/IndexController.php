<?php

namespace JSEditor\Controller\Admin;

use Omeka\Mvc\Exception;
use Laminas\View\Model\ViewModel;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Form\Form;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        if (!$this->currentSite()->userIsAllowed('js-editor-modify')) {
            throw new Exception\PermissionDeniedException(
                'User does not have permission to edit JS' // @translate
            );
        }
        $siteSettings = $this->siteSettings();
        $view = new ViewModel();
        $form = $this->getForm(Form::class);
        if ($this->getRequest()->isPost()) {
            $params = $this->params()->fromPost();
            if (isset($params['js'])) {
                $js = $params['js'];
            } else {
                $js = '';
            }
            if (isset($params['external-js'])) {
                $externalJs = array_filter($params['external-js']);
            } else {
                $externalJs = [];
            }
            $siteSettings->set('js_editor_js', $js);
            $siteSettings->set('js_editor_external_js', $externalJs);
            $this->messenger()->addSuccess('JS successfully updated.'); // @translate
        }
        $js = $siteSettings->get('js_editor_js');
        $externalJs = $siteSettings->get('js_editor_external_js');
        $view->setVariable('form', $form);
        $view->setVariable('js', $js);
        $view->setVariable('externalJs', $externalJs);
        return $view;
    }
}
