<?php

require('header.inc');

?>







<?php

  // ������� �������� ����� ����������
	$tireqty = $_POST['tireqty'];

  $oilqty = $_POST['oilqty'];

  $sparkqty = $_POST['sparkqty'];

  $address = $_POST['address'];

  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  $fio = $_POST['fio'];

?>

<html>

<head>

  <title>������������ �� ���� - ������ ��������</title>

</head>

<body>

<h1>������������ ������ � 3 �� ���� ���������� � ������������� ������ ����������� ����� - MySQL</h1>

<h2>������������ �� ����</h2>

<h3>������ ��������</h3>

<?php










//������������ � ���� ������




$hostname="localhost";

$user="root";

$password="";

$db="lab3";
















if(!$link = mysql_connect($hostname, $user, $password))




{

//echo "<br> �� ���� ����������� � �������� ���� ������ <br>";

exit();

}

//echo "<br> C����������� � �������� ���� ������ ������ ������� <br>";







if (!mysql_select_db($db, $link))

{ 

//echo "<br> �� ���� ������� ���� ������<br>";

exit();

}

else

{

//echo "<br> ����� ���� ������ ������ ������� <br>";

}










$query_1="select zakaz.id, zakaz.fio, zakaz.address, zakaz.data, tovar.id, tovar.tireqty, tovar.oilqty, tovar.sparkqty FROM zakaz, tovar where  zakaz.id=tovar.id order by zakaz.data";

$result_1=mysql_query ($query_1);




?>

<table border=1 color=black width=100% height=100%>

<tr>

<td><b>�</b></td><td><b>���</b></td><td><b>�����</b></td><td><b>���� ������</b></td><td><b>��������</b></td><td><b>�����</b></td><td><b>�����</b></td>

<?




while ($row_1=mysql_fetch_array ($result_1)) {




$id=$row_1["id"];

$fio=$row_1["fio"];

$address=$row_1["address"];

$data=$row_1["data"];

$tireqty=$row_1["tireqty"];

$oilqty=$row_1["oilqty"];

$sparkqty=$row_1["sparkqty"];




?><tr>




<td> <? echo $id ?> </td><td> <? echo $fio ?> </td><td> <? echo $address ?> </td><td> <? echo $data ?> </td><td> <? echo $tireqty ?> </td><td> <? echo $oilqty ?> </td><td> <? echo $sparkqty ?> </td>




</tr>




<?










}







?> </table> <?







?>

</body>

</html>










<?php

require('footer.inc');

?>

