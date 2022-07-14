<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=novatecnic_controlingreso",
			            "novatecnic_principal",
			            "!!x8+e]~pU2f");

		$link->exec("set names utf8");

		return $link;

	}

}