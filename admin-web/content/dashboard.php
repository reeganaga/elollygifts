<?php
include 'koneksiads.php';
$lihat_pemesanan_motor=mysql_query("SELECT * FROM pemesanan");
$lihat_pemesanan_laptop=mysql_query("SELECT * FROM pemesanan");
$lihat_pemesanan_hp=mysql_query("SELECT * FROM pemesanan");
?>
<script>
    $(document).ready(function() {
        <?php 
        $now=date('Y-m-d');
        ?>
        $('#calendar').fullCalendar({
            defaultDate: '<?php echo $now; ?>',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
            <?php
             while($r=mysql_fetch_array($lihat_pemesanan_motor)){
                if($r['id_motor'] > 0){
                    echo "{
                        title: 'decals',
                        start: '".$r['tanggal_pemesanan']."',
                         url: 'index.php?module=datapemesanan'
                    },";
                }
                 if($r['id_laptop'] > 0){
                    echo "{
                        title: 'S-Laptop',
                        start: '".$r['tanggal_pemesanan']."',
                         url: 'http://localhost/skripsi_abas/admin-web/index.php?module=datapemesanan'
                    },";
                }
                 if($r['id_hp'] > 0){
                    echo "{
                        title: 'S-Hp',
                        start: '".$r['tanggal_pemesanan']."',
                         url: 'http://localhost/skripsi_abas/admin-web/index.php?module=datapemesanan'
                    },";
                }
            }
            ?> 
            ]
        });
        
    });

</script>
<h2 class="page-title">Dashboard </h2>
<div class="content container">
        <h2 class="page-title">Components -  <span class="fw-semi-bold">Calendar App</span> </h2>
        <div class="row">
            <div class="col-md-10">
                <section class="widget">
<!--                     <header>
                        <h4>
                            <i class="fa fa-calendar"></i>
                            Calendar
                        </h4>
                        <div class="actions">
                            <div class="btn-group mr-sm">
                                <button class="btn btn-default" id="calender-prev"><i class="fa fa-angle-left"></i></button>
                                <button class="btn btn-default" id="calender-next"><i class="fa fa-angle-right"></i></button>
                            </div>
                            <button id="today" type="button" class="btn btn-warning mr-sm">
                                Today
                            </button>
                            <div id="calendar-switcher" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default active">
                                    <input type="radio" name="view" value="month" checked> Month
                                </label>
                                <label class="btn btn-default">
                                    <input type="radio" name="view" value="agendaWeek"> Week
                                </label>
                                <label class="btn btn-default">
                                    <input type="radio" name="view" value="agendaDay"> Day
                                </label>
                            </div>
                        </div>
                    </header> -->
                    <div class="body">
                        <!-- <div id="calendar" class="calendar mt-lg"> </div> -->
                        <div id='calendar'></div>
                    </div>
                </section>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body…</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="event-name">Event name</label>
                            <input type="text" id="event-name" name="name" class="form-control bg-gray-lighter">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default">Cancel</button>
                        <button data-dismiss="modal" id="create-event" class="btn btn-success">OK</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        </div>
        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
    </div>
<!-- common libraries. required for every page
<script src="lib/jquery/dist/jquery.min.js"></script>
<script src="lib/jquery-pjax/jquery.pjax.js"></script>
<script src="lib/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
<script src="lib/widgster/widgster.js"></script>
<script src="lib/underscore/underscore.js"></script>

<!-- common application js
<script src="js/app.js"></script>
<script src="js/settings.js"></script>-->

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

   
       
