<?php

class CommonModel extends Model {

    public function getMemberId() {
        return isset($_SESSION[C('USER_AUTH_KEY')]) ? $_SESSION[C('USER_AUTH_KEY')] : 0;
    }

}

?>
