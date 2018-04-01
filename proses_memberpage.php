<?php
include "koneksi.php";
session_start();
$nama=$_SESSION['nama'];
//pesan decals motor

if (isset($_POST['pesan_decals_motor'])){
    $id_pelanggan=$_SESSION['id_user'];
    $id_motor=$_POST['jenis_motor'];
    $deskripsi_pemesanan=$_POST['deskripsi_pemesanan'];
    $tanggal=date('Y-m-d');

    // Ambil Data yang Dikirim dari Form
    $nama_file = $tanggal."-".$nama."-".rand(1000,100000)."-".$_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
     
    // Set path folder tempat menyimpan gambarnya
    $path = "admin-web/gambar_pesanan/decals/".$nama_file;
     
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 6000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
                $query = "INSERT INTO pemesanan (id_pemesanan,id_pelanggan,id_motor,id_hp,id_laptop,tanggal_pemesanan,gambar_1,gambar_2,id_konfirmasi,deskripsi_pemesanan,status_pemesanan,pesan_admin) values ('','".$id_pelanggan."','".$id_motor."','','','".$tanggal."','".$nama_file."','','','".$deskripsi_pemesanan."','','')";
                $sql = mysql_query($query) ; // Eksekusi/ Jalankan query dari variabel $query
     
                if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                    echo "<script> alert ('Pesanan akan segera kamri proses, cek status pesanan anda di keranjang belanja'); window.location='index.php?menu=data_pemesanan&id=0'; </script>" ;
                }else{
                    echo "<script> alert ('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.'); window.location='index.php?menu=pesan_decals_motor&id=0'; </script>" ;
                }
            }else{
                echo "<script> alert ('Maaf, Gambar gagal diupload.'); window.location='index.php?menu=pesan_decals_motor&id=0'; </script>" ;
            }
        }else{
  
            echo "<script> alert ('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 6MB'); window.location='index.php?menu=pesan_decals_motor&id=0'; </script>" ;
        }
    }else{
        echo "<script> alert ('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.'); window.location='index.php?menu=pesan_decals_motor&id=0'; </script>" ;
    }
    
}
//pesan decals motor end-------------------------------------------

//pesan skin hp
if (isset($_POST['pesan_skin_hp'])){
    $id_pelanggan=$_SESSION['id_user'];
    $id_hp=$_POST['jenis_hp'];
    $deskripsi_pemesanan=$_POST['deskripsi_pemesanan'];
    $tanggal=date('Y-m-d');

    // Ambil Data yang Dikirim dari Form
    $nama_file = $tanggal."-".$nama."-".rand(1000,100000)."-".$_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
     
    // Set path folder tempat menyimpan gambarnya
    $path = "admin-web/gambar_pesanan/hp/".$nama_file;
     
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 6000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
                $query = "INSERT INTO pemesanan (id_pemesanan,id_pelanggan,id_motor,id_hp,id_laptop,tanggal_pemesanan,gambar_1,gambar_2,id_konfirmasi,deskripsi_pemesanan,status_pemesanan,pesan_admin) values ('','".$id_pelanggan."','','".$id_hp."','','".$tanggal."','".$nama_file."','','','".$deskripsi_pemesanan."','','')";
                $sql = mysql_query($query) ; // Eksekusi/ Jalankan query dari variabel $query
     
                if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                    echo "<script> alert ('Pesanan akan segera kamri proses, cek status pesanan anda di keranjang belanja'); window.location='index.php?menu=data_pemesanan&id=0'; </script>" ;
                }else{
                    echo "<script> alert ('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.'); window.location='index.php?menu=pesan_skin_hp&id=0'; </script>" ;
                }
            }else{
                echo "<script> alert ('Maaf, Gambar gagal diupload.'); window.location='index.php?menu=pesan_skin_hp&id=0'; </script>" ;
            }
        }else{
  
            echo "<script> alert ('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 6MB'); window.location='index.php?menu=pesan_skin_hp&id=0'; </script>" ;
        }
    }else{
        echo "<script> alert ('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.'); window.location='index.php?menu=pesan_skin_hp&id=0'; </script>" ;
    }
    
}
//pesan skin hp----------------------------------------------------

//pesan skin laptop
if (isset($_POST['pesan_skin_laptop'])){
    $id_pelanggan=$_SESSION['id_user'];
    $id_laptop=$_POST['jenis_laptop'];
    $deskripsi_pemesanan=$_POST['deskripsi_pemesanan'];
    $tanggal=date('Y-m-d');

    // Ambil Data yang Dikirim dari Form
    $nama_file = $tanggal."-".$nama."-".rand(1000,100000)."-".$_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
     
    // Set path folder tempat menyimpan gambarnya
    $path = "admin-web/gambar_pesanan/laptop/".$nama_file;
     
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 6000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
                $query = "INSERT INTO pemesanan (id_pemesanan,id_pelanggan,id_motor,id_hp,id_laptop,tanggal_pemesanan,gambar_1,gambar_2,id_konfirmasi,deskripsi_pemesanan,status_pemesanan,pesan_admin) values ('','".$id_pelanggan."','','','".$id_laptop."','".$tanggal."','".$nama_file."','','','".$deskripsi_pemesanan."','','')";
                $sql = mysql_query($query) ; // Eksekusi/ Jalankan query dari variabel $query
     
                if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                    echo "<script> alert ('Pesanan akan segera kamri proses, cek status pesanan anda di keranjang belanja'); window.location='index.php?menu=data_pemesanan&id=0'; </script>" ;
                }else{
                    echo "<script> alert ('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.'); window.location='index.php?menu=pesan_skin_laptop&id=0'; </script>" ;
                }
            }else{
                echo "<script> alert ('Maaf, Gambar gagal diupload.'); window.location='index.php?menu=pesan_skin_laptop&id=0'; </script>" ;
            }
        }else{
  
            echo "<script> alert ('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 6MB'); window.location='index.php?menu=pesan_skin_laptop&id=0'; </script>" ;
        }
    }else{
        echo "<script> alert ('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.'); window.location='index.php?menu=pesan_skin_laptop&id=0'; </script>" ;
    }
    
}
//pesan skin hp----------------------------------------------------

//pesan kado
if (isset($_POST['pesan_kado'])){
    $id_pelanggan=$_SESSION['id_user'];
    $id_kado=$_POST['id_kado'];
    $id_desain=$_POST['id_desain'];
    $deskripsi_pemesanan=$_POST['deskripsi_pemesanan'];
    $tanggal=date('Y-m-d');

    // Ambil Data yang Dikirim dari Form
    $nama_file = $tanggal."-".$nama."-".rand(1000,100000)."-".$_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
     
    // Set path folder tempat menyimpan gambarnya
    $path = "admin-web/gambar_pesanan/kado/".$nama_file;
     
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 6000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
                $query = "INSERT INTO pemesanan (id_pemesanan,id_pelanggan,id_kado,id_desain,tanggal_pemesanan,gambar_1,gambar_2,id_konfirmasi,deskripsi_pemesanan,status_pemesanan,pesan_admin) values ('','".$id_pelanggan."','{$id_kado}','{$id_desain}','".$tanggal."','".$nama_file."','','','".$deskripsi_pemesanan."','','')";
                $sql = mysql_query($query) ; // Eksekusi/ Jalankan query dari variabel $query
     
                if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                    echo "<script> alert ('Pesanan akan segera kamri proses, cek status pesanan anda di keranjang belanja'); window.location='index.php?menu=data_pemesanan&id=0'; </script>" ;
                }else{
                    echo "<script> alert ('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.'); window.location='index.php?menu=pesan_skin_laptop&id=0'; </script>" ;
                }
            }else{
                echo "<script> alert ('Maaf, Gambar gagal diupload.'); window.location='index.php?menu=pesan_skin_laptop&id=0'; </script>" ;
            }
        }else{
  
            echo "<script> alert ('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 6MB'); window.location='index.php?menu=pesan_skin_laptop&id=0'; </script>" ;
        }
    }else{
        echo "<script> alert ('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.'); window.location='index.php?menu=pesan_skin_laptop&id=0'; </script>" ;
    }
    
}

//pengajuan proposal
if (isset($_POST['pengajuan_proposal'])){
    $id_pelanggan=$_SESSION['id_user'];
    $keterangan_proposal=$_POST['keterangan_proposal'];
    $tanggal=date('Y-m-d');
    $nama_proposal=$_POST['nama_proposal'];
    // Ambil Data yang Dikirim dari Form
    $type_file = pathinfo($_FILES['file_pdf']['name']);
    $file = $tanggal."-".$nama."-".rand(1000,100000)."-".$_FILES['file_pdf']['name'];
    $file_loc = $_FILES['file_pdf']['tmp_name'];
    $folder="admin-web/gambar_pesanan/proposal/";
    if($type_file['extension'] == 'pdf' || $type_file == 'PDF'){
        if(move_uploaded_file($file_loc,$folder.$file))
        {
            $query = "INSERT INTO proposal (id_proposal,nama_proposal,tanggal_proposal,keterangan_proposal,file_proposal,id_pelanggan,status_proposal) values ('','".$nama_proposal."','".$tanggal."','".$keterangan_proposal."','".$file."','".$id_pelanggan."','Menunggu konfirmasi')";
            $sql = mysql_query($query) ;
            if($sql){ 
                echo "<script>alert('Proposal berhasil dikirim, silahkan menunggu konfirmasi'); window.location='index.php?menu=pengajuan_proposal&id=0';</script>"; 
            }
        }
        else
        {
            echo "<script>alert('Upload Gagal'); window.location='index.php?menu=pengajuan_proposal&id=0';</script>";
        }
    } else {
        echo "<script>alert('Maaf, proposal yang diupload harus berformat *.pdf'); window.location='index.php?menu=pengajuan_proposal&id=0';</script>";    
    } 
}
//pengajuan proposal end-------------------------------------------

//Proses bayar-----------------------------------------------------
if (isset($_POST['prose_bayar'])){
    $id_pelanggan=$_SESSION['id_user'];
    $jumlah_bayar=$_POST['jumlah_bayar'];
    $status_pembayaran="menunggu konfirmasi";
    $bank=$_POST['bank'];
    $nama_rekening=$_POST['nama_rekening'];
    $tanggal_konfirmasi=$_POST['tanggal_konfirmasi'];
    // Ambil Data yang Dikirim dari Form
    $nama_file = $tanggal_konfirmasi."-".$nama_rekening."-".rand(1000,100000)."-".$_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
     
    // Set path folder tempat menyimpan gambarnya
    $path = "admin-web/konfirmasi_bayar/".$nama_file;
     
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 6000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
                $query="INSERT INTO konfirmasi_bayar (id_konfirmasi, id_pelanggan, Jumlah_bayar, status_pembayaran, bank, nama_rekening, tanggal_konfirmasi, bukti_pebayaran, info_admin) VALUES ('', '".$id_pelanggan."', '".$jumlah_bayar."', '".$status_pembayaran."', '".$bank."', '".$nama_rekening."', '".$tanggal_konfirmasi."', '".$nama_file."', '');";
                $sql = mysql_query($query) ; // Eksekusi/ Jalankan query dari variabel $query
     
                if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                    $q = "SELECT * from konfirmasi_bayar where id_pelanggan='".$id_pelanggan."' and tanggal_konfirmasi='".$tanggal_konfirmasi."' and bank='".$bank."'" ;
                    $confirm = mysql_query($q);
                    $ambil=mysql_fetch_array($confirm);
                    $pemesanan=mysql_query("SELECT * from pemesanan where id_pelanggan=$id_pelanggan");
                    while ($r=mysql_fetch_array($pemesanan)){
                        if ($r['id_pelanggan'] == $id_pelanggan and $r['id_konfirmasi'] == '0') { 
                            $update = "UPDATE pemesanan set id_konfirmasi='".$ambil['id_konfirmasi']."' where id_pemesanan='".$r['id_pemesanan']."' and id_pelanggan='".$id_pelanggan."'"; 
                            $my=mysql_query($update);
                            // echo $update;
                        }
                    }
                    // echo "$q";
                    echo "<script> alert ('Prorses pembayaran telah berhasil'); window.location='index.php?menu=data_pemesanan'; </script>" ;
                }else{
                    echo $query;
                    // echo "<script> alert ('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.'); window.location='index.php?menu=data_pemesanan'; </script>" ;
                }
            }else{
                echo "<script> alert ('Maaf, Gambar gagal diupload.'); window.location='index.php?menu=data_pemesanan'; </script>" ;
            }
        }else{
  
            echo "<script> alert ('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 6MB'); window.location='index.php?menu=data_pemesanan'; </script>" ;
        }
    }else{
        echo "<script> alert ('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.'); window.location='index.php?menu=data_pemesanan'; </script>" ;
    }
    
}
//proses bayar end-------------------------------------------------

//proses update proposal
if (isset($_POST['update_proposal'])){
    $id_proposal = $_POST['idi'];
    $nama_kegiatan = $_POST['nama_proposal'];
    $keterangan_proposal = $_POST['keterangan_proposal'];
    $Update=mysql_query("UPDATE `proposal` SET `nama_proposal` = '".$nama_kegiatan."', `keterangan_proposal` = '".$keterangan_proposal."' WHERE `proposal`.`id_proposal` =".$id_proposal.";");
    if ($Update) {
         echo "<script> alert ('update proposal berhasil'); window.location='index.php?menu=pengajuan_proposal&id=".$id_proposal."'; </script>" ;
    }
}
//proses update proposal end


//update decals
if (isset($_POST['update_pesan_decals_motor'])){
    $id_pemesanan=$_POST['id_pemesanan'];
    $id_pelanggan=$_SESSION['id_user'];
    $id_motor=$_POST['jenis_motor'];
    $deskripsi_pemesanan=$_POST['deskripsi_pemesanan'];
    $tanggal=date('Y-m-d');

    // Ambil Data yang Dikirim dari Form
    $nama_file = $tanggal."-".$nama."-".rand(1000,100000)."-".$_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
     
    // Set path folder tempat menyimpan gambarnya
    $path = "admin-web/gambar_pesanan/decals/".$nama_file;
    if($tmp_file!==''){
        if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
            // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
            if($ukuran_file <= 6000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                // Proses upload
                if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                    // Jika gambar berhasil diupload, Lakukan :
                    // Proses simpan ke Database
                    $query = "UPDATE `pemesanan` SET `id_motor` = '$id_motor', `id_hp` = '0', `id_laptop` = '0',`gambar_1` = '$nama_file' ,`id_konfirmasi` = '0', `deskripsi_pemesanan` = '$deskripsi_pemesanan' WHERE `pemesanan`.`id_pemesanan` = $id_pemesanan;
                    ";
                    $sql = mysql_query($query) ; // Eksekusi/ Jalankan query dari variabel $query
         
                    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                        // Jika Sukses, Lakukan :
                        echo "<script> alert ('pembaruan pesanan akan segera kami proses, cek status pesanan anda di keranjang belanja'); window.location='index.php?menu=data_pemesanan'; </script>" ;
                    }else{
                        echo "<script> alert ('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.'); window.location='index.php?menu=pesan_decals_motor&id=".$id_pemesanan."'; </script>" ;
                    }
                }else{
                    echo "<script> alert ('Maaf, Gambar gagal diupload.'); window.location='index.php?menu=pesan_decals_motor&id=".$id_pemesanan."'; </script>" ;
                }
            }else{
      
                echo "<script> alert ('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 6MB'); window.location='index.php?menu=pesan_decals_motor&id=".$id_pemesanan."'; </script>" ;
            }
        }else{
            echo "<script> alert ('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.'); window.location='index.php?menu=pesan_decals_motor&id=".$id_pemesanan."'; </script>" ;
        }
    } else {
        $query = "UPDATE `pemesanan` SET `id_motor` = '".$id_motor."', `id_hp` = '0', `id_laptop` = '0', `id_konfirmasi` = '0', `deskripsi_pemesanan` = '".$deskripsi_pemesanan."' WHERE `pemesanan`.`id_pemesanan` = '".$id_pemesanan."'";
        $sql = mysql_query($query) ; // Eksekusi/ Jalankan query dari variabel $query

        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            // echo $query;
            echo "<script> alert ('pembaruan pesanan akan segera kami proses, cek status pesanan anda di keranjang belanja'); window.location='index.php?menu=data_pemesanan'; </script>" ;
        }

    }
}
//update decals end

//update skin laptop
if (isset($_POST['update_pesan_skin_laptop'])){
    $id_pemesanan=$_POST['id_pemesanan'];
    $id_pelanggan=$_SESSION['id_user'];
    $id_laptop=$_POST['jenis_laptop'];
    $deskripsi_pemesanan=$_POST['deskripsi_pemesanan'];
    $tanggal=date('Y-m-d');

    // Ambil Data yang Dikirim dari Form
    $nama_file = $tanggal."-".$nama."-".rand(1000,100000)."-".$_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
     
    // Set path folder tempat menyimpan gambarnya
    $path = "admin-web/gambar_pesanan/laptop/".$nama_file;
    if($tmp_file!==''){ 
        if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
            // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
            if($ukuran_file <= 6000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                // Proses upload
                if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                    // Jika gambar berhasil diupload, Lakukan :
                    // Proses simpan ke Database
                    $query = "UPDATE `pemesanan` SET `id_motor` = '0', `id_hp` = '0', `id_laptop` = '$id_laptop',`gambar_1` = '$nama_file' ,`id_konfirmasi` = '0', `deskripsi_pemesanan` = '$deskripsi_pemesanan' WHERE `pemesanan`.`id_pemesanan` = $id_pemesanan;
                    ";
                    $sql = mysql_query($query) ; // Eksekusi/ Jalankan query dari variabel $query
         
                    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                        // Jika Sukses, Lakukan :
                        echo "<script> alert ('Pesanan akan segera kamri proses, cek status pesanan anda di keranjang belanja'); window.location='index.php?menu=data_pemesanan'; </script>" ;
                    }else{
                        echo "<script> alert ('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.'); window.location='index.php?menu=pesan_skin_laptop&id=".$id_pemesanan."'; </script>" ;
                    }
                }else{
                    echo "<script> alert ('Maaf, Gambar gagal diupload.'); window.location='index.php?menu=pesan_skin_laptop&id=".$id_pemesanan."'; </script>" ;
                }
            }else{
      
                echo "<script> alert ('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 6MB'); window.location='index.php?menu=pesan_skin_laptop&id=".$id_pemesanan."'; </script>" ;
            }
        }else{
            echo "<script> alert ('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.'); window.location='index.php?menu=pesan_skin_laptop&id=".$id_pemesanan."'; </script>" ;
        }
    } else {
        $query = "UPDATE `pemesanan` SET `id_motor` = '0', `id_hp` = '0', `id_laptop` = '".$id_laptop."', `id_konfirmasi` = '0', `deskripsi_pemesanan` = '".$deskripsi_pemesanan."' WHERE `pemesanan`.`id_pemesanan` = '".$id_pemesanan."'";
        $sql = mysql_query($query) ; // Eksekusi/ Jalankan query dari variabel $query

        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            // echo $query;
            echo "<script> alert ('pembaruan pesanan akan segera kami proses, cek status pesanan anda di keranjang belanja'); window.location='index.php?menu=data_pemesanan'; </script>" ;
        }
    }
}
//update skin laptop end

//update skin hp
if (isset($_POST['update_pesan_skin_hp'])){
    $id_pemesanan=$_POST['id_pemesanan'];
    $id_pelanggan=$_SESSION['id_user'];
    $id_hp=$_POST['jenis_hp'];
    $deskripsi_pemesanan=$_POST['deskripsi_pemesanan'];
    $tanggal=date('Y-m-d');

    // Ambil Data yang Dikirim dari Form
    $nama_file = $tanggal."-".$nama."-".rand(1000,100000)."-".$_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
     
    // Set path folder tempat menyimpan gambarnya
    $path = "admin-web/gambar_pesanan/hp/".$nama_file;
    if($tmp_file!==''){
        if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
            // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
            if($ukuran_file <= 6000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                // Proses upload
                if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                    // Jika gambar berhasil diupload, Lakukan :
                    // Proses simpan ke Database
                    $query = "UPDATE `pemesanan` SET `id_motor` = '0', `id_hp` = '$id_hp', `id_laptop` = '0',`gambar_1` = '$nama_file' ,`id_konfirmasi` = '0', `deskripsi_pemesanan` = '$deskripsi_pemesanan' WHERE `pemesanan`.`id_pemesanan` = $id_pemesanan;
                    ";
                    $sql = mysql_query($query) ; // Eksekusi/ Jalankan query dari variabel $query
         
                    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                        // Jika Sukses, Lakukan :
                        echo "<script> alert ('Pesanan akan segera kamri proses, cek status pesanan anda di keranjang belanja'); window.location='index.php?menu=data_pemesanan'; </script>" ;
                    }else{
                        echo "<script> alert ('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.'); window.location='index.php?menu=pesan_skin_hp&id=".$id_pemesanan."'; </script>" ;
                    }
                }else{
                    echo "<script> alert ('Maaf, Gambar gagal diupload.'); window.location='index.php?menu=pesan_skin_hp&id=".$id_pemesanan."'; </script>" ;
                }
            }else{
      
                echo "<script> alert ('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 6MB'); window.location='index.php?menu=pesan_skin_hp&id=".$id_pemesanan."'; </script>" ;
            }
        }else{
            echo "<script> alert ('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.'); window.location='index.php?menu=pesan_skin_hp&id=".$id_pemesanan."'; </script>" ;
        }
    } else {
        $query = "UPDATE `pemesanan` SET `id_motor` = '0', `id_hp` = '".$id_hp."', `id_laptop` = '0', `id_konfirmasi` = '0', `deskripsi_pemesanan` = '".$deskripsi_pemesanan."' WHERE `pemesanan`.`id_pemesanan` = '".$id_pemesanan."'";
        $sql = mysql_query($query) ; // Eksekusi/ Jalankan query dari variabel $query

        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            // echo $query;
            echo "<script> alert ('pembaruan pesanan akan segera kami proses, cek status pesanan anda di keranjang belanja'); window.location='index.php?menu=data_pemesanan'; </script>" ;
        }

    }
}
//update skin hp end

//konfirasi gambaruntuk dicetak
if (isset($_POST['konfirmasi_gambar'])){
    $id_pemesanan=$_POST['id_pemesanan'];
    $tujuan=$_POST['tujuan'];
    $Update=mysql_query("UPDATE `pemesanan` SET `status_pemesanan` = 'gambar dikonfirmasi' WHERE `id_pemesanan` ='".$id_pemesanan."'");
    if ($Update) {
        echo "<script> alert ('Gambar telah dikonfirmasi dan akan dilanjutkan ke proses cetak, Terima Kasih'); window.location='index.php?menu=".$tujuan."&id=".$id_pemesanan."'; </script>" ;
         
         // echo "<script> alert ('update proposal berhasil'); window.location='index.php?menu=pengajuan_proposal&id=".$id_proposal."'; </script>" ;
    }
}
//konfirasi gambaruntuk dicetak end

//-----------------------------------------------------------------//
?>