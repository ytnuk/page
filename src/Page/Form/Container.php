<?php

namespace WebEdit\Page\Form;

use WebEdit\Database;

final class Container extends Database\Form\Container
{

    public function setEntityValues($values)
    {
        $entity = parent::setEntityValues($values);
        $entity->menu->link = ':Page:Front:Presenter:view';
        $entity->menu->linkId = $this->repository->persist($entity)->getId();
        return $entity;
    }

    protected function addPropertyContent($property)
    {
        return $this->addTextArea($property->name, $this->formatPropertyLabel($property));
    }

    protected function attached($form)
    {
        parent::attached($form);
        unset($this['menu']['link']);
        unset($this['menu']['linkId']);
    }

}