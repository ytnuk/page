<?php

namespace WebEdit\Page;

use WebEdit\Database;

final class Repository extends Database\Repository {

    public function getPage($id) {
        return $this->storage()->get($id);
    }

}
