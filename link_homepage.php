<?php 
switch ($sw_menu) {
	case 'home':
		require_once'home.php';            
	break;
	case 'produk':
		require_once'produk_galeri.php';
	break;
	case 'produk_galeri':
		require_once'produk_galeri.php';
	break;
	case 'about':
		require_once'about.php';
	break;
	case 'produk_daftar_harga':
		require_once'produk_daftar_harga.php';
	break;
	case 'cara_pesan':
		require_once'cara_pesan.php';
	break;
	case 'about':
		require_once'about.php';
	break;
	case 'member':
		require_once'member2.php';
	break;
	case 'memberpage':
		require_once'memberpage.php';
	break;
	//memberpage start
		case 'editprofile':
			require_once'memberpage_edit_profile.php';
		break;
		case 'editpassword':
			require_once'memberpage_edit_password.php';
		break;
		case 'testimoni':
			require_once'memberpage_testimoni.php';
		break;
		case 'pesan_decals_motor':
			require_once'memberpage_pesan_decals_motor.php';
		break;
		case 'pesan_skin_laptop':
			require_once'memberpage_pesan_skin_laptop.php';
		break;
		case 'pesan_kado':
			require_once'memberpage_pesan_kado.php';
		break;
		case 'pesan_skin_hp':
			require_once'memberpage_pesan_skin_hp.php';
		break;
		case 'pengajuan_proposal':
			require_once'memberpage_pengajuan_proposal.php';
		break;
		case 'data_pemesanan':
			require_once'memberpage_data_pemesanan.php';
		break;
	//memberpage start
	default:
		require_once'home.php';
	break; 
	}
?>