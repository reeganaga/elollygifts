<?php
include 'koneksiads.php';
$tampil=mysql_query(" SELECT pemesanan.id_pemesanan,pemesanan.tanggal,produk.nama_produk,pemesanan_pc.jumlah,produk.harga_produk 
                    FROM pemesanan, produk,pemesanan_pc WHERE (pemesanan.id_pemesanan=pemesanan_pc.id_pemesanan) 
                    AND (pemesanan_pc.id_produk=produk.id_produk) 
                    AND (pemesanan.status='Dalam Konfirmasi') 
                    AND (pemesanan.tanggal BETWEEN '$mulai 00:00:00' AND '$selesai 00:00:00')");
$r=mysql_fetch_array($tampil);
?>

<div class="content container">
        <h2 class="page-title">Cetak <small>Laporan Penjualan</small></h2>
        <section class="widget">
            <div class="body no-margin">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th class="hidden-xs">Description</th>
                        <th>Quantity</th>
                        <th class="hidden-xs">Price per Unit</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Brand-new 27' monitor</td>
                        <td class="hidden-xs">2,560x1,440-pixel (WQHD) resolution supported!</td>
                        <td>2</td>
                        <td class="hidden-xs">700</td>
                        <td>1,400.00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Domain: okendoken.com</td>
                        <td class="hidden-xs">6-month registration</td>
                        <td>1</td>
                        <td class="hidden-xs">10.99</td>
                        <td>21.88</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Atlas Shrugged</td>
                        <td class="hidden-xs">Novel by Ayn Rand, first published in 1957 in the United States</td>
                        <td>5</td>
                        <td class="hidden-xs">35</td>
                        <td>175.00</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>New Song by Dr. Pre</td>
                        <td class="hidden-xs">Lyrics: praesent blandit augue non sapien ornare imperdiet</td>
                        <td>1</td>
                        <td class="hidden-xs">2</td>
                        <td>2.00</td>
                    </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6 col-print-6">
                        <blockquote class="blockquote-sm">
                            <strong>Note:</strong> Keep in mind, sometimes bad things happen. But it's just sometimes.
                        </blockquote>
                    </div>
                    <div class="col-sm-6 col-print-6">
                        <div class="row text-align-right">
                            <div class="col-xs-6"></div> <!-- instead of offset -->
                            <div class="col-xs-3">
                                <p>Subtotal</p>
                                <p>Tax(10%)</p>
                                <p class="no-margin"><strong>Total</strong></p>
                            </div>
                            <div class="col-xs-3">
                                <p>1,598.88</p>
                                <p>159.89</p>
                                <p class="no-margin"><strong>1,758.77</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-align-right mt-lg mb-xs">
                    Marketing Consultant
                </p>
                <p class="text-align-right">
                    <span class="fw-semi-bold">Bob Smith</span>
                </p>
                <div class="btn-toolbar mt-lg text-align-right hidden-print">
                    <button id="print" class="btn btn-default">
                        <i class="fa fa-print"></i>
                        &nbsp;&nbsp;
                        Print
                    </button>
                    <button class="btn btn-danger">
                        Proceed with Payment
                        &nbsp;
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </section>
        </div>