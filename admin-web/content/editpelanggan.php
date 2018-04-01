<?php
include "koneksi.php";

if (isset($_GET['id'])) {
$id=$_GET['id'];    # code...
}else{
    $id=0;
}

$lihatpelanggan=mysql_query("select * from pelanggan where id_pelanggan=$id ");
$r=mysql_fetch_array($lihatpelanggan);
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
                    <form action="prosespelanggan.php" method="post" enctype="multipart/form-data">
                        <thead>
                            <tr>
                                <th width="150px">Data</th>
                                <th class="hidden-xs">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class='fw-semi-bold'>Id</span>
                                </td>
                                <td>
                                    <input type="read" name="id_pelanggan" class="form-control" value="<?php echo $r['id_pelanggan'];?>" readonly="readonly">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class='fw-semi-bold'>Username</span>
                                </td>
                                <td>
                                   <input type="text" name="username" class="form-control" value="<?php echo $r['username'];?>" readonly="readonly">
                               </td>

                           </tr>
                           <tr>
                                <td>
                                    <span class='fw-semi-bold'>Password</span>
                                </td>
                                <td>
                                   <input type="text" name="password" class="form-control" value="<?php echo $r['password'];?>" readonly="readonly" style="width: 70%; float: left;">
                                   <a href="" class="btn btn-info" style="float: right;">Ubah Password ke default</a>
                               </td>

                           </tr>
                           <tr>
                                <td>
                                    <span class='fw-semi-bold'>Nama Pelanggan</span>
                                </td>
                                
                                <td> <input type="text" name="nama" class="form-control" value="<?php echo $r['nama'];?>"></td>
                           </tr>

                            <tr>
                                <td>
                                    <span class='fw-semi-bold'>Email</span>
                                </td>

                                <td> 
                                    <input type="text" name="email" class="form-control" value="<?php echo $r['email'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class='fw-semi-bold'>Alamat</span>
                                </td>

                                <td>
                                    <input type="text" name="alamat" class="form-control" value="<?php echo $r['alamat'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class='fw-semi-bold'>Nomor HP</span>
                                </td>

                                <td>
                                    <input type="text" name="no_hp" class="form-control" value="<?php 
                                            echo $r['no_hp']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span class='fw-semi-bold'>Gender</span>
                                </td>

                                <td>
                                    <select class="form-control" id="sel1" name="gender">
                                        <option <?php if ($r['gender']=='Laki-laki') {echo 'selected';} ?> value="Laki-laki">Laki-laki</option>
                                        <option <?php if ($r['gender']=='Wanita') {echo 'selected';}?> value="Perempuan">Wanita</option>

                                    </select>
                                </td>
                            </tr> 

                            <tr>
                                <td>
                                    <span class='fw-semi-bold'>Profil Picture</span>
                                </td>
                                <td>
                                    <?php if($r['foto']==''){?>
                                        <img  src='../images/member/default.jpg' width='300px' height='300px'>
                                    <?php } else { ?>
                                        <img  src='<?php echo "../images/member/".$r['foto'] ?>' width='300px' height='300px'>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td align="right">
                                    <button type="submit" class="btn btn-info" value="Update" name="edit_pelanggan">Update</button>
                                </td>
                            </tr>
                            
                        </tbody>
                    </form>
                </table>

            </div>
        </div>
    </section>
</div>