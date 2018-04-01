<script language="javascript" type="text/javascript" src="../tinymcpukn/tiny_mce_src.js"></script>
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
<?php
include "koneksi.php";

if (isset($_GET['id'])) {
$id=$_GET['id'];    # code...
}else{
    $id=0;
}

$lihatabout=mysql_query("select * from about where id_about=$id ");
$r=mysql_fetch_array($lihatabout);
?>
<div class="content container">
        <h2 class="page-title"> Setting - <span class="fw-semi-bold">Halaman About</span>

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
                        <thead>
                        <tr>
                            <th width="200px">Judul post</th>
                            <th class="hidden-xs">Post</th>
                            
                            
                        </tr>
                        </thead>
                        <tbody>
                         
                        
                        
                        <tr>

                            <td>
                            <span class='fw-semi-bold'>Tentang kami</span>
                            </td>

                            <td>
                            <input type="text" name="judul" class="form-control" value="<?php echo $r['judul'];?>">
                            </td>

                            </tr>


                            <tr>

                            <td>
                            <span class='fw-semi-bold'>Isi Tentang Kami</span>
                            </td>
                            
                            <td>
                             <textarea style="height: 200px; width: 100%;" type="text" name="isi_artikel" class="form-control"><?php echo $r['isi_about'];?></textarea>

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                                       
                                       

                        <tr>
                            <td></td>                            
                            <td align="right">
                                <?php echo "<button type='submit' name='edit_about' class='btn btn-info'>Ubah</button>" ?>
                                
                            </td>
                        </tr>


                        </tbody>
                    </table>
            </form>
                    </div>
            </div>
        </section>
        </div>