<?php

namespace WebEdit\Entity\Form;

use WebEdit\Form;
use WebEdit\Entity;

abstract class Control extends Form\Control {

    protected $facade;
    protected $entity;

    public function setEntity($entity) {
        $this->entity = $entity;
    }

    private function onFormSubmit($form) {
        $args = [];
        if ($this->entity) {
            $args[] = $this->entity;
        }
        $args[] = $form->getValues();
        $entity = call_user_func_array([$this->facade, $this->entity ? $form->submitted->name : 'add'], $args);
        if ($form->submitted->name === 'delete') {
            $this->presenter->redirect('Presenter:view');
        } elseif (!$this->entity) {
            $this->presenter->redirect('Presenter:edit', ['id' => $entity->id]);
        } else {
            $this->presenter->redirect('this');
        }
    }

    protected function createComponentForm() {
        $form = parent::createComponentForm();
        if ($this->entity) {
            $form->addSubmit('edit', 'form.button.save');
            $form->addSubmit('delete', 'form.button.delete')->setValidationScope(FALSE);
        } else {
            $form->addSubmit('add', 'form.button.add');
        }
        $form->onSubmit[] = function($form) {
            try {
                $this->onFormSubmit($form);
            } catch (Entity\Exception $ex) {
                $this->presenter->flashMessage($ex->getMessage());
                $this->presenter->redirect('this');
            }
        };
        return $form;
    }

}
