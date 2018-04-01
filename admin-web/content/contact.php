<?php
include "koneksi.php";

if (isset($_GET['id'])) {
$id=$_GET['id'];    # code...
}else{
    $id=0;
}

$lihatabout=mysql_query("select * from contact where id_contact=$id ");
$r=mysql_fetch_array($lihatabout);
?>
<div class="content container">
        <h2 class="page-title"> Setting - <span class="fw-semi-bold">Halaman kontak</span>

         </h2>
        
        <section class="widget">
            <header>
                <h4>Di <span class="fw-semi-bold">ADS Decals</span> 
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
    <form action="prosesabout.php?module=prosesabout" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <thead>
                        <tr>
                            <th width="200px">Jenis Kontak</th>
                            <th class="hidden-xs">Post</th>
                            
                            
                        </tr>
                        </thead>
                        <tbody>
                         
                        
                        
                        <tr>

                            <td>
                                <span class='fw-semi-bold'>No HP</span>
                            </td>

                            <td>
                            <input type="text" name="no_hp" class="form-control" value="<?php echo $r['no_hp'];?>">
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <span class='fw-semi-bold'>Pin BBM</span>
                            </td>
                            <td>
                            <input type="text" name="pinbbm" class="form-control" value="<?php echo $r['pinbbm'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class='fw-semi-bold'>facebook</span>
                            </td>
                            <td>
                            <input type="text" name="fb" class="form-control" value="<?php echo $r['fb'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class='fw-semi-bold'>G-Mail</span>
                            </td>
                            <td>
                            <input type="text" name="gmail" class="form-control" value="<?php echo $r['gmail'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class='fw-semi-bold'>Twitter</span>
                            </td>
                            <td>
                            <input type="text" name="twitter" class="form-control" value="<?php echo $r['twitter'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class='fw-semi-bold'>Pinterest</span>
                            </td>
                            <td>
                            <input type="text" name="pinterest" class="form-control" value="<?php echo $r['pinterest'];?>">
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td align="right"><?php echo "<button type='submit' name='edit_contact' class='btn btn-info'>Ubah</button>" ?></td>
                        </tr>
                                       
                                       


                        </tbody>
                    </table>
                    

            </form>
                    </div>
            </div>
        </section>
        </div>