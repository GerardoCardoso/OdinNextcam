<?php

/**
* Conexion a la base de datos y funciones
* Autor: evilnapsis
**/

function con(){
	return new mysqli("localhost","u762310939_gerardo","PaP3L1T05","u762310939_nextcam");
}

function insert_img($folder, $image, $id){
	$con = con();
	$con->query("insert into evidencias (ruta,orden,fecha) value (\"$folder\"$image"","$id",NOW())");
}

function get_imgs(){
	$images = array();
	$con = con();
	$query=$con->query("select * from image order by created_at desc");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}

function get_img($id){
	$image = null;
	$con = con();
	$query=$con->query("select * from image where id=$id");
	while($r=$query->fetch_object()){
		$image = $r;
	}
	return $image;
}

function del($id){
	$con = con();
	$con->query("delete from image where id=$id");
}

?>