
<!-- <div class="body">
    <div class="form-horizontal"> -->
    <form   method="GET" role="form" action="adminstrator/laporan/cetak-kartu/cetak.php">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="password_2">NIM</label>
                        </div>
                        <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                   <input type="text" id="nim" name="nim" class="form-control" placeholder="Inputkan Nim" onkeypress="return validKey(event || window.event, '0123456789');" required>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="password_2">Tahun Ajaran</label>
                        </div>
                        <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                   <select id="tahun_ajaran" class="form-control show-tick " name="tahun_ajaran" required>
                                        <option value="" >Pilih</option>
                                        <?php
                                            $query = mysqli_query($mysqli, "SELECT * FROM tb_tahun_ajaran  GROUP BY tahun_ajaran");
                                            while ($row = mysqli_fetch_array($query)) { ?>

                                            <option value="<?php echo $row['tahun_ajaran'] ?>">
                                                <?php echo $row['tahun_ajaran']; ?>
                                            </option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="password_2">Semester</label>
                        </div>
                        <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <input type="radio" name="semester" value="ganjil" id="male2" class="with-gap">
                                <label for="male2">Ganjil</label>

                                <input type="radio" name="semester" value="genap" id="female2" class="with-gap">
                                <label for="female2" class="m-l-20">Genap</label>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <button type="submit" class="btn bg-primary btn-xs waves-effect" style="position: absolute; left: 450px; top:-20px; "><i class="material-icons">print</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<!-- </div> -->
<script type="text/javascript">
  function validKey(e, whitelist) {
    var char = String.fromCharCode(e.which).toLowerCase();
    whitelist = whitelist.toLowerCase();
    if (whitelist.indexOf(char) !== -1)
        return true;
    return false;
}

</script>

