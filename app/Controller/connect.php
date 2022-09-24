<?php


class PDOConnect
{
	private $db_host= 'localhost';
    private $db_user= 'root';
    private $db_pass= '';
    private $db_name= 'sales';

public function PDO(){

    $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host,
        $this->db_user, $this->db_pass);
    $pdo = setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
    $pdo->query('SET names utf8;SET CHARACTER SET utf8');


	return $pdo;
     }
}
