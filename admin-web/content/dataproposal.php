<?php
include "koneksi.php";
$sql="SELECT * from proposal inner join pelanggan on proposal.id_pelanggan = pelanggan.id_pelanggan"; 
$lihat_pesan=mysql_query($sql) ;
$lihat_order=mysql_query("select * from proposal, pelanggan where proposal.id_pelanggan=pelanggan.id_pelanggan" ) ;

if (isset($_POST['update_proposal'])) {
    $status=$_POST['statusproposal'];
    $pesan_admin=$_POST['pesan_admin'];
    $id_proposal=$_POST['id_proposal'];
    mysql_query("update proposal set status_proposal='$status', keterangan_admin='$pesan_admin' where id_proposal=$id_proposal");
    echo "<script> alert ('data berhasil diperbarui'); window.location='index.php?module=dataproposal'; </script>";
}
?>
<!-- ====================================lihat detail===================================== -->
<?php
$div="http://localhost/skripsi_abas/admin-web/gambar_pesanan/proposal/";
//pop up modul
//perulangan buat pop up modul
$x = [];
while ($r=mysql_fetch_array($lihat_order)) $x[] = $r;
foreach ($x as $r){
?>
<div id='myModal<?php echo $r['id_proposal']; ?>' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                <h4 class='modal-title' id='myModalLabel'>Detail proposal <?php echo "$r[nama_proposal]"; ?> </h4>
            </div>
            <div class='modal-body'>
                <h4>Detail Proposal</h4>
                <p>
                    <?php 
                        echo "$r[nama_proposal]";
                    ?>
                </p>
                <h4>Nama Pelanggan</h4>
                <p>
                    <?php 
                        echo "$r[nama]";
                    ?>
                </p>
                <h4>Tanggal Pengajuan</h4>
                <p>
                    <?php 
                        echo "$r[tanggal_proposal]";
                    ?>
                </p>
                <h4>File</h4>
                  <p>
                    <?php $download= str_replace(" ", "%20", $r['file_proposal']) ?>
                    <a href="<?php echo $div.$download; ?>" target="_blank"><?php echo "$r[file_proposal]" ?></a>
                  </p>
               <form role="form" action="index.php?module=dataproposal" method="post">
                <h4>Rubah Status Proposal</h4>
                <div class="form-group">
                  <select class="form-control" id="sel1" name="statusproposal">
                      <option <?php if ($r['status_proposal'] == '') echo "selected"; ?> value="Menunggu Konfirmasi" >Dalam Konfirmasi</option>
                      <option <?php if ($r['status_proposal'] == 'Diterima') echo "selected"; ?> value="Diterima" >Diterima</option>
                      <option <?php if ($r['status_proposal'] == 'Ditolak') echo "selected"; ?> value="Ditolak" >Ditolak</option>
                  </select>
                </div>
                  <p>
                    <input type="hidden" name="id_proposal" value="<?php echo $r['id_proposal']; ?>">
                  </p>
                  
                  <!-- menampilkan data konfirmasi -->
                  <div style="width: 100%; height: 190px">
                    <div style="width: 49%; float: left;">
                      Informasi dari pelanggan<br>
                      <textarea id="email" style="width: 100%; height: 150px;" readonly="readonly"><?php echo "$r[keterangan_proposal]" ?> 
                      </textarea>
                    </div>
                    <div style="width: 50%; float: right;">
                      Informasi untuk pelanggan<br>
                      <textarea id="email" name="pesan_admin" style="width: 100%; height: 150px;"><?php echo "$r[keterangan_admin]" ?></textarea>
                    </div>
                  </div>
                  <div class='modal-footer'>
                      <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                      <button type='submit' name='update_proposal' class='btn btn-primary'>Save changes</button>
                  </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
<!-- ====================================lihat detail end================================== -->
<?php
 }
?>
<div class="content container">
  <h2 class="page-title"> Seluruh Pengajuan Proposal</h2>

  <section class="widget">
      <header>
          <h4>Tabel <span class="fw-semi-bold">Data Proposal</span></h4>
          <div class="widget-controls">
              <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
              <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
              <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
          </div>
      </header>
      <div class="body">
          <div class="mt">
              <table id="datatable-table" class="table table-striped table-hover" >
                  <thead>
                    <tr>
                        <tr>
                        <th width="50px">#</th>
                        <th class="hidden-xs">Judul Proposal</th>
                        
                        <th width="200px">Nama Pelanggan</th>
                        <th class="hidden-xs">Tanggal</th>
                        
                        <th class="hidden-xs" width="200px">kelola</th>
                    </tr>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    while ($r=mysql_fetch_array($lihat_pesan)){
                    echo"<tr>

                        <td>$r[id_proposal]</td>
                        <td><span class='fw-semi-bold'>$r[nama_proposal]</span></td>
                        
                        <td><span class='fw-semi-bold'>$r[nama]</span></td>
                        <td><span class='fw-semi-bold'>$r[tanggal_proposal]</span></td>
                        
                        <td><span class='fw-semi-bold'>
                            <small>
                                <button type='button' class='btn btn-info'
                            data-toggle='modal' data-target='#myModal$r[id_proposal]'>Lihat Detail</button>
                            </small>
                            <small>
                                <a class='btn btn-warning' href=\"javascript: delet_proposal('".$r['id_proposal']."','".$r['nama']."','".$r['nama_proposal']."','".$r['tanggal_proposal']."','".$r['file_proposal']."')\">Delete</a>
                            </small>
                        </span></td>
                       
                    </tr>";
                    $no++;
                    }
                    ?>
                  </tbody>
              </table>


      </div>
  </section>
</div>