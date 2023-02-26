<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Toko Batik</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script>var sayAdd = () => alert ("Sudah ditambahkan");</script>  
      </head>  
      <body background="bg_batik.jpg"> 
      <nav class="navbar navbar-inverse">
          <div class="container-fluid">
          <div class="navbar-header">
               <a class="navbar-brand" href="#">Toko Kain Batik</a>
          </div>
          <ul class="nav navbar-nav">
               <li class="active"><a href="#">Produk</a></li>
               <li><a href="keranjang.php">Keranjang</a></li>
               <li><a href="about.php">About Me</a></li>
          </ul>
          </div>
      </nav>

           <div class="container" style="width:700px;">  
           
                <h1 align="center">Toko Kain Batik</h1><br />  

                <?php
                        $batik = [
                            [1, "Btk_Garutan.jpg", "Motif Garutan", 135000],
                            [2, "Btk_Kawung.jpg", "Motif Kawung", 160000],
                            [3, "Btk_Pring Sedapur.png", "Motif Pring Sedapur", 165000],
                            [4, "Btk_Priyangan.jpg", "Motif Priyangan", 170000],
                            [5, "Btk_Sidomukti.jpg", "Motif Sidomukti", 180000],
                            [6, "Btk_Tambal.jpg", "Motif Tambal", 140000]
                        ];

                        foreach ($batik as $data) {
                        	$strNama = "". $data[2] ."" ;
                        	$html = '
                             
                              <div class="col-md-4">  
                                   <form method="post" action="keranjang.php?action=add&id=<?php echo $row['.$data[0].'];  ?>">  
                                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:4px;" align="center">  
                                             <img src="'. $data[1] .'" class="img-responsive" /><br />  
                                             <h4 class="text-info"> '.$strNama.' </h4>  
                                             <h4 class="text-danger">Rp. '. $data[3] .'</h4>  
                                             <input type="hidden" name="quantity" class="form-control" value="1" />  
                                             <input type="hidden" name="hidden_name" value="'.$strNama.'" />  
                                             <input type="hidden" name="hidden_price" value="'.$data[3] .'" />  
                                             <input type="submit" onclick="sayAdd()" name="add_to_keranjang" style="margin-top:5px;" class="btn btn-success" value="Add to keranjang" />  
                                        </div>  
                                             <br>
                                   </form>  
                              </div> 
                        	';
                        	echo $html;
                        }

                    ?>
                <div style="clear:both"></div>  
                <br />  
           <br />
          <div class ="footer">
               <marquee direction="right">Copyright by Ristian Naufal Apriliawan</marquee>
          </div>       
     </body>  
 </html>