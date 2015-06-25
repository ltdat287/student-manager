<?php

class Connect
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '123456';
    private $db   = 'qlsv';

    public function connect_db()
    {
        $connect = mysql_connect($this->host, $this->user, $this->pass) or die("Khong the ket noi database");
        mysql_select_db($this->db, $connect);
    }

    public function query($sql)
    {
        $query = mysql_query($sql);
        $data = array();

        while ($row = mysql_fetch_assoc($query)) {
            $data[] = $row;
        }

        return $data;
    }
}