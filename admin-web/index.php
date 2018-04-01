<!-- light-blue - v3.2.0 - 2015-10-05 -->
<?php
error_reporting("E_ALL");
session_start();
if (empty($_SESSION['admin'])) {
    header('location:login.php');
}
// else {
//     header('location:index.php?module=dashboard');
// }
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from demo.flatlogic.com/3.2/transparent/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Oct 2015 04:12:44 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>ADS Decals Admin Panel</title>

        <link href="css/application.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
           chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
                      https://code.google.com/p/chromium/issues/detail?id=332189
        */
    </script>
    <script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>


<!-- calendar -->
<link href='js/calendar/fullcalendar.css' rel='stylesheet' />
<link href='js/calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='js/calendar/moment.min.js'></script>
<script src="lib/jquery/dist/jquery.min.js"></script>
<script src='js/calendar/fullcalendar.min.js'></script>

<style>

    body {
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
        color: black;

    }

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>
<!-- calendar -->
<link rel="stylesheet" type="text/css" href="css/style.css">

<script language="javascript" type="text/javascript" src="tinymcpuk/tiny_mce_src.js"></script>
<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        plugins : "table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu",
        theme_advanced_buttons1_add : "fontselect,fontsizeselect",
        theme_advanced_buttons2_add : "separator,preview,zoom,separator,forecolor,backcolor,liststyle",
        theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
        theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
        theme_advanced_buttons3_add : "emotions,flash",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        extended_valid_elements : "hr[class|width|size|noshade]",
        file_browser_callback : "fileBrowserCallBack",
        paste_use_dialog : false,
        theme_advanced_resizing : true,
        theme_advanced_resize_horizontal : false,
        theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
        apply_source_formatting : true
});

</script>


</head>


<body class="background-dark">
    <div class="logo" style="position: fixed;">
        <img src="img/logo.png">
    </div>
        <nav id="sidebar" class="sidebar nav-collapse collapse" style="position: fixed;">
            <ul id="side-nav" class="side-nav">
                
                <li <?php if ($_GET['module']=='dashboard') { echo "class='active'";} ?> >
                    <a href="index.php?module=dashboard"><i class="fa fa-home"></i> <span class="name">Dashboard</span></a>
                </li>
                <li <?php if ($_GET['module']=='datapembayaran' || $_GET['module']=='detail_pembayaran' ) { echo "class='active'";} ?>>
                    <a href="index.php?module=datapembayaran"><i class="fa fa-usd"></i> <span class="name">Data Pembayaran</span></a>
                </li>
                <li <?php if ($_GET['module']=='datapemesanan') { echo "class='active'";} ?>>
                    <a href="index.php?module=datapemesanan"><i class="fa fa-gift"></i> <span class="name">Data Pemesanan</span></a>
                </li>
                
                 <li <?php if ($_GET['module']=='daftarfoto') { echo "class='active'";} ?>>
                    <a href="index.php?module=daftarfoto"><i class="fa fa-picture-o"></i> <span class="name">Galeri</span></a>
                </li>
                <li <?php if ($_GET['module']=='daftarkategori') { echo "class='active'";} ?>>
                    <a href="index.php?module=daftarkategori"><i class="fa fa-picture-o"></i> <span class="name">Kategori</span></a>
                </li>
                <li <?php if ($_GET['module']=='testimonial') { echo "class='active'";} ?>>
                    <a href="index.php?module=testimonial"><i class="fa fa-commenting"></i> <span class="name">Testimonial</span></a>
                </li>
                <li <?php if ($_GET['module']=='dataproposal') { echo "class='active'";} ?>>
                    <a href="index.php?module=dataproposal"><i class="fa fa-calendar"></i> <span class="name">Proposal</span></a>
                <li class="panel">
                    <a class="accordion-toggle collapsed" data-toggle="collapse"
                       data-parent="#side-nav" href="#produk"><i class="fa fa-book"></i> <span class="name">Product</span></a>
                    <ul id="produk" class="panel-collapse collapse ">
                        <!-- <li <?php if ($_GET['module']=='slide') { echo "class='active'";} ?>><a href="index.php?module=slide">Home</a></li> -->
                       <!-- <li <?php if ($_GET['module']=='motor') { echo "class='active'";} ?>><a href="index.php?module=motor">daftar motor</a></li>-->
                        <!-- <li <?php if ($_GET['module']=='laptop') { echo "class='active'";} ?>><a href="index.php?module=laptop">Daftar Produk</a></li> -->
                        <li <?php if ($_GET['module']=='kado') { echo "class='active'";} ?>><a href="index.php?module=kado">Daftar Kado</a></li>
                       <li <?php if ($_GET['module']=='desain') { echo "class='active'";} ?>><a href="index.php?module=desain">Daftar Desain</a></li>
                    </ul>
                </li>
                <li class="panel">
                    <a class="accordion-toggle collapsed" data-toggle="collapse"
                       data-parent="#side-nav" href="#ui-collapse"><i class="fa fa-magic"></i> <span class="name">All Page</span></a>
                    <ul id="ui-collapse" class="panel-collapse collapse ">
                        <!-- <li <?php if ($_GET['module']=='slide') { echo "class='active'";} ?>><a href="index.php?module=slide">Home</a></li> -->
                        <li <?php if ($_GET['module']=='about') { echo "class='active'";} ?>><a href="index.php?module=about&id=1">About</a></li>
                        <li <?php if ($_GET['module']=='contact') { echo "class='active'";} ?>><a href="index.php?module=contact&id=1">Kontak</a></li>
                        <li <?php if ($_GET['module']=='kota') { echo "class='active'";} ?>><a href="index.php?module=kota">Kota</a></li>
                        <li <?php if ($_GET['module']=='pelanggan') { echo "class='active'";} ?>><a href="index.php?module=pelanggan">Pelanggan</a></li>
                    </ul>
                </li>
                <li <?php if ($_GET['module']=='laporan') { echo "class='active'";} ?>>
                    <a href="index.php?module=laporan"><i class="fa fa-commenting"></i> <span class="name">Laporan</span></a>
                </li>

            </ul>
        
            
        </nav>    <div class="wrap">

        <div class="row"></div>

        <header class="page-header">
            <div class="navbar">
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="visible-phone-landscape">
                        <a href="#" id="search-toggle">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                   
                    <li class="visible-xs">
                        <a href="#"
                           class="btn-navbar"
                           data-toggle="collapse"
                           data-target=".sidebar"
                           title="">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                    <li class="hidden-xs"><a href="logout.php"><i class="fa fa-sign-out">Logout</i></a></li>
                </ul>
                <form id="search-form" class="navbar-form pull-right" role="search">
                    <input type="search" class="form-control search-query" placeholder="Search...">
                </form>
               
            </div>
        </header>        
        
        <div class="content container" style="margin: 20px">
        
        
         <?php  
         $module=$_GET['module'];
         if (empty($_SESSION['namauser']) && $module=='memberpage') {
            $module='index';
         }
         if ($module == ''){
            require_once "content/dashboard.php";
         } else {   
            require_once "content/$module.php";
         }  
        ?>

        </div>
        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
    </div>
<!-- common libraries. required for every page-->
<!-- <script src="lib/jquery/dist/jquery.min.js"></script> -->
<script src="lib/jquery-pjax/jquery.pjax.js"></script>
<script src="lib/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
<script src="lib/widgster/widgster.js"></script>
<script src="lib/underscore/underscore.js"></script>

<!-- common application js -->
<script src="js/app.js"></script>
<script src="js/settings.js"></script>

<!-- common templates -->
<script type="text/template" id="settings-template">
    <div class="setting clearfix">
        <div>Background</div>
        <div id="background-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% dark = background == 'dark'; light = background == 'light';%>
            <button type="button" data-value="dark" class="btn btn-sm btn-default <%= dark? 'active' : '' %>">Dark</button>
            <button type="button" data-value="light" class="btn btn-sm btn-default <%= light? 'active' : '' %>">Light</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar on the</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-sm btn-default <%= onRight? '' : 'active' %>">Left</button>
            <button type="button" data-value="right" class="btn btn-sm btn-default <%= onRight? 'active' : '' %>">Right</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-sm btn-default <%= display? 'active' : '' %>">Show</button>
            <button type="button" data-value="false" class="btn btn-sm btn-default <%= display? '' : 'active' %>">Hide</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>White Version</div>
        <div>
            <a href="../white/index.html" class="btn btn-sm btn-default">&nbsp; Switch &nbsp;   <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</script>

<script type="text/template" id="sidebar-settings-template">
    <% auto = sidebarState == 'auto'%>
    <% if (auto) {%>
    <button type="button"
            data-value="icons"
            class="btn-icons btn btn-transparent btn-sm">Icons</button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-sm">Auto</button>
    <%} else {%>
    <button type="button"
            data-value="auto"
            class="btn btn-transparent btn-sm">Auto</button>
    <% } %>
</script>


  

        <!-- page specific libs -->
        <script src="lib/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="lib/underscore/underscore.js"></script>
        <script src="lib/backbone/backbone.js"></script>
        <script src="lib/backbone.paginator/lib/backbone.paginator.min.js"></script>
        <script src="lib/backgrid/lib/backgrid.min.js"></script>
        <script src="lib/backgrid-paginator/backgrid-paginator.js"></script>
        <script src="lib/datatables/media/js/jquery.dataTables.min.js"></script>


        <!-- page application js -->
        <script src="js/tables-dynamic.js"></script>

    <!-- page specific scripts -->
    
        <!-- page libs -->
        <script src="lib/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="lib/jquery.sparkline/index.js"></script>

<!--        <script src="lib/backbone/backbone.js"></script>
    -->    <script src="lib/backbone.localStorage/backbone.localStorage-min.js"></script>

        <script src="lib/d3/d3.min.js"></script>
        <script src="lib/nvd3/build/nv.d3.min.js"></script>


        <!-- page specific libs Calendar 
        <script src="lib/moment/min/moment.min.js"></script>
        <script src="lib/jquery-ui/ui/core.js"></script>
        <script src="lib/jquery-ui/ui/widget.js"></script>
        <script src="lib/jquery-ui/ui/mouse.js"></script>
        <script src="lib/jquery-ui/ui/draggable.js"></script>
        <script src="lib/fullcalendar/dist/fullcalendar.min.js"></script>



         <!-- page application js Calendar 
        <script src="js/component-calendar.js"></script>

        <script src="js/jquery.sparkline/index.js"></script>

        <script src="js/tables-static.js"></script>
     -->
       


         <!-- page application js -->
        <script src="js/forms-elements.js"></script>

        <!-- Upload Function -->
        <script id="template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload fade">
                <td>
                    <span class="preview"></span>
                </td>
                <td>
                    <p class="name">{%=file.name%}</p>
                    <strong class="error text-danger"></strong>
                </td>
                <td>
                    <p class="size">Processing...</p>
                    <div class="progress progress-xs active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                </td>
                <td>
                    {% if (!i && !o.options.autoUpload) { %}
                        <button class="btn btn-primary btn-sm start" disabled>
                            <i class="glyphicon glyphicon-upload"></i>
                            <span>Start</span>
                        </button>
                    {% } %}
                    {% if (!i) { %}
                        <button class="btn btn-warning btn-sm cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </td>
            </tr>
        {% } %}
        </script>
        <!-- The template to display files available for download -->
        <script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
                <td>
                    <span class="preview">
                        {% if (file.thumbnailUrl) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                        {% } %}
                    </span>
                </td>
                <td>
                    <p class="name">
                        {% if (file.url) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                        {% } else { %}
                            <span>{%=file.name%}</span>
                        {% } %}
                    </p>
                    {% if (file.error) { %}
                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                    {% } %}
                </td>
                <td>
                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                </td>
                <td>
                    {% if (file.deleteUrl) { %}
                        <button class="btn btn-danger btn-sm delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>Delete</span>
                        </button>
                    {% } else { %}
                        <button class="btn btn-warning btn-sm cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </td>
            </tr>
        {% } %}
        </script>


      

        <!-- index -->
        <script src="js/index.js"></script>
        <script src="js/chat.js"></script>

        <!-- page template -->
        <script type="text/template" id="message-template">
            <div class="sender pull-left">
                <div class="icon">
                    <img src="img/2.jpg" class="img-circle" alt="">
                </div>
                <div class="time">
                    just now
                </div>
            </div>
            <div class="chat-message-body">
                <span class="arrow"></span>
                <div class="sender"><a href="#">Tikhon Laninga</a></div>
                <div class="text">
                    <%- text %>
                </div>
            </div>
        </script>





</body>

<!-- Mirrored from demo.flatlogic.com/3.2/transparent/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Oct 2015 04:14:14 GMT -->
<script>
    function removeTextAreaWhiteSpace() { 
        var myTxtArea = document.getElementById('remarks'); 
        myTxtArea.value = myTxtArea.value.replace(/^\s*|\s*$/g,''); 
    } 
    function delet(id_pemesanan,nama,pesan,tanggal){
        tanya = confirm("Apakah anda yakin menghapus pesanan :\n nama : "+nama +"\npesanan : "+pesan+"\ntanggal : "+tanggal);
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapuspesanan&id="+id_pemesanan;
        }
    }

    function delet_product(id_product,gambar_product){
        tanya = confirm("Apakah anda yakin menghapus?");
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapusgaleri&id="+id_product+"&file="+gambar_product ;
        }
    }

    function delet_product(id_product,gambar_product){
        tanya = confirm("Apakah anda yakin menghapus?");
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapuskategori&id="+id_product+"&file="+gambar_product ;
        }
    }

    function delet_category(id){
        tanya = confirm("Apakah anda yakin menghapus?");
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapuscategory&id="+id ;
        }
    }

    function delet_testimoni(id_testimoni,nama,testi,isi_testimoni){
        tanya = confirm("Apakah anda yakin menghapus testimoni dari\nnama : "+nama+"\njudul : "+testi+"\nisi testimoni : \n"+isi_testimoni );
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapustestimoni&id="+id_testimoni ;
        }
    }

    function delet_product(id_category,nama_category){
        tanya = confirm("Apakah anda yakin ingin menghapus?");
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapuscategory&id="+id_category+"&file="+nama_category ;
        }
    }

    function delet_pelanggan(id,user,nama,file){
        tanya = confirm("Apakah anda yakin menghapus pelanggan \nusername : "+user+"\nnama : "+nama );
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapuspelanggan&id="+id+"&file="+file ;
        }
    }
    function delet_proposal(id,user,nama,tanggal,file){
        tanya = confirm("Apakah anda yakin menghapus proposal \nnama pelanggan : "+user+"\njudul proposal : "+nama+"\ntanggal upload: "+tanggal );
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapusproposal&id="+id+"&file="+file ;
        }
    } 
    function delet_desain(id,nama){
        tanya = confirm("Apakah anda yakin menghapus desain "+nama);
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapusdesain&id="+id;
        }
    }
    function delet_kado(id,nama){
        tanya = confirm("Apakah anda yakin menghapus kado "+nama);
        if(tanya == 1){
            window.location.href="prosesdelete.php?aksi=hapuskado&id="+id;
        }
    }
</script>
</html>
