<?php

//echo "$tireqty";
//echo "$oilqty";
 
  require ('page_6.inc');
  
  
    
  class OrderformPage extends Page
  {
    var $row2buttons = array( 'Re-engineering' => 'reengineering.php',
                              'Standards Compliance' => 'standards.php',
                              'Buzzword Compliance' => 'buzzword.php', 
                              'Mission Statements' => 'mission.php'
                            );
// var $tireqty ;
// var $oilqty ;
// var $sparkqty ;
// var $address ;
    

    function Display_1($tireqty)
    {

      //$this->tireqty=$tireqty ;

      //echo $this->tireqty;

        echo $tireqty; }


    
    function Display()
    {
      echo "<html>\n<head>\n";
      $this -> DisplayTitle();
      $this -> DisplayKeywords();
      $this -> DisplayStyles();
      echo "</head>\n<body>\n";
      $this -> DisplayHeader();
      $this -> DisplayMenu($this->buttons);
      $this -> DisplayMenu($this->row2buttons);
?> <table width=100% height=100% border=1><tr><td class=cont > <? echo $this->spisok(); ?> </td></table> <?


      $this -> DisplayFooter();
      //echo "</body>\n</html>\n";
    }




function spisok ()

{

  // Создать короткие имена переменных
  
  $tireqty = $_POST['tireqty'];
  $oilqty = $_POST['oilqty'];
  $sparkqty = $_POST['sparkqty'];
  $address = $_POST['address'];
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  
//
  $nick = $_POST['nick'];

  $passwd = $_POST['passwd'];

  $email = $_POST['email'];

  $fio = $_POST['fio'];

//подключаемся к базе данных

$hostname="localhost";
$user="root";
$password="";
$db="lab3";





if(!$link = mysql_connect($hostname, $user, $password))

{
//echo "<br> Не могу соединиться с сервером базы данных <br>";
exit();
}
//echo "<br> Cоедининение с сервером базы данных прошло успешно <br>";


if (!mysql_select_db($db, $link))
{ 
//echo "<br> Не могу выбрать базу данных<br>";
exit();
}
else
{
//echo "<br> Выбор базы данных прошел успешно <br>";
}



$query_1="select zakaz.id, zakaz.fio, zakaz.address, zakaz.data, tovar.id, tovar.tireqty, tovar.oilqty, tovar.sparkqty FROM zakaz, tovar where  zakaz.id=tovar.id order by zakaz.data";
$result_1=mysql_query ($query_1);

?>
<table border=1 color=black width=100% height=100%>
<tr>
<td><b>№</b></td><td><b>ФИО</b></td><td><b>Адрес</b></td><td><b>Дата заказа</b></td><td><b>покрышки</b></td><td><b>масла</b></td><td><b>свечи</b></td>
<?

while ($row_1=mysql_fetch_array ($result_1)) {

$id=$row_1["id"];
$fio=$row_1["fio"];
$adress=$row_1["adress"];
$data=$row_1["data"];
$tireqty=$row_1["tireqty"];
$oilqty=$row_1["oilqty"];
$sparkqty=$row_1["sparkqty"];

?><tr>

<td> <? echo $id ?> </td><td> <? echo $fio ?> </td><td> <? echo $adress ?> </td><td> <? echo $data ?> </td><td> <? echo $tireqty ?> </td><td> <? echo $oilqty ?> </td><td> <? echo $sparkqty ?> </td>

</tr>

<?



}


?> </table> <? 

}}



$services = new OrderformPage();
$content ='cddc';


$services -> SetContent($content);

$services -> SetTitle('Лабораторная работа по теме: ООП на РНР');
$services -> Setnazvanie('Лабораторные работы по предмету Динамические веб-системы в экономике <br> Студента группы ПИс-161: Бардиер Василий Васильевич <br> Проверил: к.т.н. доц. Назимов А.С.');


//$services -> Display_1($tireqty);
 
 $services -> Display();

// $services -> zakaz($tireqty, $oilqty, $sparkqty, $address, $DOCUMENT_ROOT, $fio);




?>







