<?php
session_start();

 if(isset($_POST["add_to_keranjang"]))  
 {  
      if(isset($_SESSION["shopping_keranjang"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_keranjang"], "item_id");  
                $count = count($_SESSION["shopping_keranjang"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_keranjang"][$count] = $item_array;  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_keranjang"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
        unset($_SESSION["shopping_keranjang"]);  
      }  
 }  
 ?>  
<!DOCTYPE html>
<html>

<head>
     <title>Keranjang</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <script>var sayDel = () => alert ("Sudah dikosongkan");</script>
</head>

<body background="bg_batik.jpg">
 
<nav class="navbar navbar-inverse">
          <div class="container-fluid">
          <div class="navbar-header">
               <a class="navbar-brand" href="#">Toko Kain Batik</a>
          </div>
          <ul class="nav navbar-nav">
               <li><a href="index.php">Produk</a></li>
               <li class="active"><a href="#">Keranjang</a></li>
               <li><a href="about.php">About Me</a></li>
          </ul>
          </div>
      </nav>

<div class="container">
     <h3>Detail Pesanan</h3>
     <div class="container">
     <h4>Jumlah Pesanan =
          <?php
          if (empty($_SESSION["shopping_keranjang"])) {
               echo "0";
          } else {
               echo $count = count($_SESSION["shopping_keranjang"]);
          }
          ?>
     </h4>
     <a href="keranjang.php?action=delete" onclick="sayDel()" class="btn btn-danger" role="button">Kosongkan Cart</a>
     </div>
	<hr>
     <div class="table-responsive">
          <table class="table table-striped">
               <tr>
                    <th width="40%">Nama Barang</th>
                    <th width="10%">Jumlah</th>
                    <th width="20%">Harga</th>
                    <th width="15%">Total</th>
               </tr> 
                          <?php   
                          if(!empty($_SESSION["shopping_keranjang"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_keranjang"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td align="center"><?php echo $values["item_quantity"]; ?></td>  
                               <td align="right">Rp. <?php echo $values["item_price"]; ?></td>  
                               <td align="right">Rp. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">Rp. <?php echo number_format($total, 2); ?></td>  
                               
                          </tr>  
                          <?php  
                          } else {
                               
                           
                              {  
                         ?>  
                         <tr>  
                              <td>keranjang Kosong</td>  
                              <td>0</td>  
                              <td>0</td>  
                              <td>0</td>  
                         </tr>  
                         <?php  
                                   
                              }  
                         ?>  
                         <tr>  
                              <td colspan="3" align="right">Total</td>  
                              <td align="right">0</td>  
                              
                         </tr>  
                         <?php 
                          }
                          ?> 
          </table>
     </div>
     </div>
     <br />
     <div class ="footer">
     <marquee direction="right">Copyright by Ristian Naufal Apriliawan</marquee>
     </div>
     
</body>
</html>