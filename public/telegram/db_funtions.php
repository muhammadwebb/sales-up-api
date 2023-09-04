<?php

require_once 'database.php';

class db_funtions
{
    public $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function checkCode()
    {
        global $db;

        $code = explode(' ', $this->code)[1];
        $links = $db->query("SELECT * FROM `links` WHERE `code`='{$code}'");
        $link = mysqli_fetch_assoc($links);
        $link_id = $link['id'];
        $click = $link['clicked'] + 1;
        $db->query("UPDATE `links` SET `clicked`='{$click}' WHERE `code`='{$code}'");

        return $link_id;
    }

    public function setUser()
    {

    }
}
