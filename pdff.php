<?php
require_once __DIR__ . '/vendor/autoload.php';
include 'db.php';

$mpdf = new \Mpdf\Mpdf();

// $sql = "SELECT * FROM categories WHERE id='".$_POST['id']."'";
// $query = mysqli_query($db,$sql);
// while($row = mysqli_fetch_assoc($query))
// {
//       $data = $row;
//
//
// }
// $name = $_POST['veg'];



if(isset($_POST['submit'])){
  $name = $_POST['vegitable'];
  $price = $_POST['price'];
  $qty = $_POST['qty'];


  $mpdf->WriteHTML($qty);
  $mpdf->Output();

}


 ?>