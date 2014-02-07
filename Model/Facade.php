<?php

namespace WebEdit\Page\Model;

use WebEdit\Model;
use WebEdit\Menu\Node;
use WebEdit\Page;

class Facade extends Model\Facade {

    public $repository;
    private $nodeFacade;

    public function __construct(Page\Model\Repository $repository, Node\Model\Facade $nodeFacade) {
        $this->repository = $repository;
        $this->nodeFacade = $nodeFacade;
    }

    public function getFormContainer($page = NULL) {
        return new Page\Form\Container($page);
    }

    public function addPage(array $data) {
        $data['node']['link'] = ':Page:Presenter:view';
        $node = $this->nodeFacade->addNode($data['node']);
        $data['page']['node_id'] = $node->id;
        $page = $this->repository->insert($data['page']);
        $this->nodeFacade->editNode($node, array('link_id' => $page->id));
        return $page;
    }

    public function editPage($page, array $data) {
        $this->nodeFacade->editNode($page->node, $data['node']);
        return $this->repository->update($page, $data['page']);
    }

    public function deletePage($page) {
        $this->nodeFacade->deleteNode($page->node);
        return $this->repository->remove($page);
    }

}
