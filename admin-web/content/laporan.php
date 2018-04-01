
                                <form class="form-horizontal form-label-left" role="form" action="index.php?module=proseslaporan" Method="POST">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="default-select" style="text-align:right;">Dari </label>
                                    <div class="col-sm-2">
                                        <select name="tgl_mulai" data-placeholder="Which galaxy is closest to Milky Way?"
                                                data-width="auto"
                                                data-minimum-results-for-search="10"
                                                tabindex="-1"
                                                class="select2 form-control" id="default-select">
                                            <?php
                                            for ($i=1; $i <= 31; $i++) { 
                                                echo "<option value='$i'>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="bln_mulai" data-placeholder="Which galaxy is closest to Milky Way?"
                                                data-width="auto"
                                                data-minimum-results-for-search="10"
                                                tabindex="-1"
                                                class="select2 form-control" id="default-select">
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="thn_mulai" data-placeholder="Which galaxy is closest to Milky Way?"
                                                data-width="auto"
                                                data-minimum-results-for-search="10"
                                                tabindex="-1"
                                                class="select2 form-control" id="default-select">
                                            <?php
                                            for ($i=2013; $i <= 2016; $i++) { 
                                                echo "<option value='$i'>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                        <div class="form-group">
                                    <label class="col-sm-2 control-label" for="default-select" style="text-align:right;">sampai </label>
                                    <div class="col-sm-2">
                                        <select name="tgl_selesai" data-placeholder="Which galaxy is closest to Milky Way?"
                                                data-width="auto"
                                                data-minimum-results-for-search="10"
                                                tabindex="-1"
                                                class="select2 form-control" id="default-select">
                                            <?php
                                            for ($i=1; $i <= 31; $i++) { 
                                                echo "<option value='$i'>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="bln_selesai" data-placeholder="Which galaxy is closest to Milky Way?"
                                                data-width="auto"
                                                data-minimum-results-for-search="10"
                                                tabindex="-1"
                                                class="select2 form-control" id="default-select">
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="thn_selesai" data-placeholder="Which galaxy is closest to Milky Way?"
                                                data-width="auto"
                                                data-minimum-results-for-search="10"
                                                tabindex="-1"
                                                class="select2 form-control" id="default-select">
                                            <?php
                                            for ($i=2013; $i <= 2016; $i++) { 
                                                echo "<option value='$i'>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
       

                                <div class="col-xs-10" style="text-align:center;">
                                    <button type="submit" class="btn btn-primary" 
                                            data-placement="top" data-original-title=".btn .btn-primary">
                                        Tampilkan
                                    </button>
                                </div>
 </form>