<?php

namespace WebEdit\Page\Model;

use WebEdit\Database;

final class Repository extends Database\Repository {

    public function getPage($id) {
        return $this->table()->get($id);
    }

}
