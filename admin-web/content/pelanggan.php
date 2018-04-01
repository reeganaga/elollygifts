<?php
include "koneksi.php";

$lihatpelanggan=mysql_query("select * from pelanggan ")
?>
<div class="content container">
        <h2 class="page-title"> Pelanggan

         </h2>
        
        <section class="widget">
            <header>
                <h4>Daftar data pelanggan </h4>
                </h4>
                <div class="widget-controls">
                    <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                    <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </header>
            <div class="body">
                <div class="mt">


<table id="datatable-table" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th class="hidden-xs">Username</th>
                            
                            <th width="200px">Nama Pelanggan</th>
                            <th class="hidden-xs">Email</th>
                            
                            <th class="hidden-xs" width="120px">No Hp</th>
                            
                            <th class="hidden-xs">Foto</th>
                            <th class="hidden-xs" width="150px">Kelola</th>
                        </tr>
                        </thead>
                        <tbody>
                         <?php
                        $no=1;
                        while ($r=mysql_fetch_array($lihatpelanggan)){
                            if($r['foto']==''){
                                $image = 'default.jpg';
                            } else {
                                $image = $r['foto'];
                            } 
                        echo"<tr>

                            <td>$r[id_pelanggan]</td>
                            <td><span class='fw-semi-bold'>$r[username]</span></td>
                            
                            <td><span class='fw-semi-bold'>$r[nama]</span></td>
                            <td><span class='fw-semi-bold'>$r[email]</span></td>
                            
                            <td><span class='fw-semi-bold'>$r[no_hp]</span></td>
                            
                            
                             <td class='hidden-xs'>
                                <img class='img-rounded' src='../images/member/$image' alt='' height='50'>
                            </td>
                            
                            <td class='hidden-xs'>

                             <div class='btn-group'>
                                        <a href='index.php?module=lihatdetailpelanggan&id=$r[id_pelanggan]' class='btn btn-success'>&nbsp;&nbsp;Data Lengkap</a>
                                        <a href='index.php?module=editpelanggan&id=$r[id_pelanggan]' class='btn btn-info'>Edit</a>
                                        <a class='btn btn-warning' href=\"javascript: delet_pelanggan('".$r['id_pelanggan']."','".$r['username']."','".$r['nama']."','".$r['foto']."')\" >Hapus</a>
                                </div>

                            </td>
                           
                        </tr>";
                       $no++;
                        }
                        ?>
                        </tbody>
                    </table>
                    </div>
            </div>
        </section>
        </div>