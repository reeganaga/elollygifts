<?php 
require 'koneksi.php';
//check link verification
$id_admin = $_GET['id_admin'];;
$code = $_GET['code'];

$query = "SELECT * FROM admin where id_admin={$id_admin} and verification_code='{$code}' ";
$check = mysql_query($query);

$total = mysql_num_rows($check);

if (!empty($_POST['new_password'])) {
    // var_dump($_POST);

    //update passowrd
    $new_password = $_POST['new_password'];
    $id_admin = $_GET['id_admin'];
    $query = "UPDATE admin set password='{$new_password}', verification_code='' where id_admin={$id_admin}  ";
    $update = mysql_query($query);
    // var_dump($update);
    // var_dump($query);
    if ($update) {
        echo '<script>alert("password berhasil di reset, silahkan login"); window.location="login.php";</script>';        
    }else{
        echo '<script>alert("terdapat kesalahan");</script>';        
    }
}

if ($total==1) {
    ?>
    <!DOCTYPE html>
    <html>

    <!-- Mirrored from demo.flatlogic.com/3.2/transparent/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Oct 2015 04:18:10 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <title>ADS Decals Admin Panel Login</title>

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
    </head>
    <body class="background-dark">
            <div class="single-widget-container">
                <section class="widget login-widget">
                    <header class="text-align-center">
                        <img src="img/w-logo.png" alt="logo">
                        <h4>Fill your email</h4>
                    </header>
                    <div class="body">
                        <form class="no-margin"
                            name="login" method="post" action="">
                            <fieldset>
                                <div class="form-group">
                                    <label for="email" >Password baru</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input id="email" type="password" name="new_password"  class="form-control input-lg input-transparent"
                                            placeholder="Password">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-block btn-lg btn-danger">
                                    <span class="small-circle"><i class="fa fa-caret-right"></i></span>
                                    <small>Reset Password</small>
                                </button>
                                <a class="forgot" href="forgot.php"></a>
                            </div>
                        </form>
                    </div>
                    <!--<footer>
                        <div class="facebook-login">
                            <a href="index.html"><span><i class="fa fa-facebook-square fa-lg"></i> LogIn with Facebook</span></a>
                        </div>
                    </footer>-->
                </section>
            </div>
    <!-- common libraries. required for every page-->
    <script src="lib/jquery/dist/jquery.min.js"></script>
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

        <!-- page specific scripts -->


    </body>

    <!-- Mirrored from demo.flatlogic.com/3.2/transparent/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Oct 2015 04:18:10 GMT -->
    </html>    
    <?php
}else{
    // echo '<script>alert("Link anda tidak valid"); window.location="login.php";</script>';
    
}
?>
