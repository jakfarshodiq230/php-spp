
<!-- <div class="body">
    <div class="form-horizontal"> -->
    <form   method="GET" role="form" action="adminstrator/laporan/laporan-keuangan/cetak.php">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="password_2">Tahun Ajaran</label>
                        </div>
                        <div class="col-lg-5 col-md-10 col-sm-8 col-xs-7">
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
                                <input type="radio" name="semester" value="ganjil" id="male" class="with-gap">
                                <label for="male">Ganjil</label>

                                <input type="radio" name="semester" value="genap" id="female" class="with-gap">
                                <label for="female" class="m-l-20">Genap</label>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <button type="submit" class="btn bg-primary btn-xs waves-effect" style="position: absolute; left: 280px; top:-20px; "><i class="material-icons">print</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<!-- </div> -->

