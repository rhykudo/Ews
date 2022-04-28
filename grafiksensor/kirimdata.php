<?php
class tb_sensor{
 public $link='';
 function __construct($suhu, $kelembaban){
  $this->connect();
  $this->storeInDB($suhu, $kelembaban);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'grafiksensor') or die('Cannot select the DB');
 }
 
 function storeInDB($suhu, $kelembaban){
  $query = "insert into tb_sensor set kelembaban='".$kelembaban."', suhu='".$suhu."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['suhu'] != '' and  $_GET['kelembaban'] != ''){
 $tb_sensor=new tb_sensor($_GET['suhu'],$_GET['kelembaban']);
}
?>
