<?php

namespace Test\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Test\Model\Item;

class TestController extends AbstractActionController {

    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function indexAction() {
        $items = $this->entityManager->getRepository(Item::class)->findAll();
        return ['items' => $items];
    }

    public function viewAction() {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('items');
        }

        $item = $this->entityManager->getRepository(Item::class)->find($id);
        if (!$item)
            return $this->redirect()->toRoute('items');

        return ['item' => $item];
    }

    public function addAction() {
        $itemForm = new \Test\Form\ItemForm;
        $request = $this->getRequest();

        if (!$request->isPost()) {
            return ['form' => $itemForm];
        }

        $itemForm->setData($request->getPost());
        if (!$itemForm->isValid()) {
            return ['form' => $itemForm];
        }

        $formData = $itemForm->getData();
        $item = new Item;
        $item->setName($formData['name']);
        
        $this->entityManager->persist($item);
        $this->entityManager->flush();

        $this->flashMessenger()->addMessage('Item added successfully!', 'success');
        return $this->redirect()->toRoute('home');
    }
}