<?php
include "koneksi.php";

if (isset($_GET['id'])) {
$id=$_GET['id'];    # code...
}else{
    $id=0;
}

$lihatpelanggan=mysql_query("select * from pelanggan where id_pelanggan=$id ")
?>
<div class="content container">
        <h2 class="page-title"> Data Pelanggan - <span class="fw-semi-bold">Spesifik</span>

         </h2>
         <a href='index.php?module=pelanggan' class='btn btn-warning'><i class='glyphicon glyphicon-chevron-left'></i>Kembali</a><br><br>
        
        <section class="widget">
            <header> 
                </h4>
                <div class="widget-controls">
                    <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                    <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </header>
            <div class="body">
                <div class="mt">


<table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="150px">Data</th>
                            <th class="hidden-xs">Detail</th>
                            
                            
                        </tr>
                        </thead>
                        <tbody>
                         <?php
                        
                        while ($r=mysql_fetch_array($lihatpelanggan)){
                        if($r['foto']==''){
                            $image = 'default.jpg';
                        } else {
                            $image = $r['foto'];
                        } 
                        echo"<tr>

                            <td>
                            <span class='fw-semi-bold'>Id</span>
                            </td>

                            <td>
                            $r[id_pelanggan]</span>
                            </td>

                            </tr>

                            <tr>

                            <td>
                            <span class='fw-semi-bold'>Username</span>
                            </td>
                            
                            <td>
                            $r[username]</span>

                            </td>
                           
                        </tr>

                        <tr><td>
                            <span class='fw-semi-bold'>Password</span></td>
                            
                            <td>$r[password]</span></td></tr>

                            <tr><td>
                            <span class='fw-semi-bold'>Nama Pelanggan</span></td>
                            
                            <td>$r[nama]</span></td></tr>

                            <tr><td>
                            <span class='fw-semi-bold'>Email</span></td>
                            
                            <td>$r[email]</span></td></tr>

                            <tr><td>
                            <span class='fw-semi-bold'>Alamat</span></td>
                            
                            <td>$r[alamat]</span></td></tr>

                            <tr><td>
                            <span class='fw-semi-bold'>Nomor HP</span></td>
                            
                            <td>$r[no_hp]</span></td></tr>

                            <tr><td>
                            <span class='fw-semi-bold'>Gender</span></td>
                            <td>$r[gender]</span></td></tr>

                            <tr><td>
                            <span class='fw-semi-bold'>Profil Picture</span></td>
                            
                            <td>
                                <img class='img-rounded' src='../images/member/$image' alt='' height='150'>
                            </td>
                            </tr>
                            ";
                        
                            ?>
                        



                        <tr>
                            <td></td>
                            <td align="right">
                                <?php echo "<a href='index.php?module=editpelanggan&id=$r[id_pelanggan]' class='btn btn-info'>Edit</a>" ?>
                                
                            </td>
                        </tr>


                        </tbody>
                         <?php 
                     }

                         echo "" ?>
                    </table>
                    </div>
            </div>
        </section>
        </div>