<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Progetto\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Progetto\Service\ProgettoService;
use Progetto\Form\ProgettoForm;

class IndexController extends AbstractActionController
{

      private $progettoService;
      private $form;

      public function __construct(ProgettoService $progettoService, ProgettoForm $progettoForm) {
          $this->progettoService = $progettoService;
          $this->form = $progettoForm;
      }

      public function indexAction()
      {
          return new ViewModel([
              'lista' => $this->progettoService->getListaProgetti()
          ]);
      }

      public function progettoAction()
      {
          $progetto = $this->progettoService->getprogetto($this->params()->fromRoute('codice'));
          return new ViewModel([
              'progetto' => $progetto
          ]);
      }

    public function nuovoAction()
    {

        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();

            // merge dati che arrivano dalla form
            $postData = array_merge_recursive(
                $request->getPost()->toArray(),
                $request->getFiles()->toArray()
            );

            $this->form->setData($postData);

            if ($this->form->isValid()) {

                $progetto = $this->progettoService->creaNuovoProgetto($postData);



                $this->redirect()->toRoute('progetti');

            }
        }

        return new ViewModel([
            'form' => $this->form
        ]);
        echo $this->progettoService->getUserProgetti();
    }

    public function eliminaAction()
    {
        $progetto = $this->progettoService->getprogetto($this->params()->fromRoute('codice'));
        var_dump($this->params()->fromRoute('codice'));
        $this->progettoService->elimina($progetto);

        $this->redirect()->toRoute('progetti');
    }


}
