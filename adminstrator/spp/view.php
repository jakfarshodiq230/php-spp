
<section class="content">
        <div class="container-fluid">
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Kelola SPP
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#tagihan" data-toggle="tab"> <i class="material-icons">create</i>  Tagihan SPP</a></li>
                                <li role="presentation"><a href="#tahun_ajaran" data-toggle="tab"> <i class="material-icons">create</i>  Tahun Ajaran</a></li>
                                <li role="presentation" ><a href="#spp" data-toggle="tab"> <i class="material-icons">create</i> SPP</a></li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="tagihan">
                                    <?php include 'adminstrator/spp/tagihan_spp/view.php'; ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tahun_ajaran">
                                    <?php include 'adminstrator/spp/tahun_ajaran/view.php'; ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="spp">
                                    <?php include 'adminstrator/spp/spp_aktif/view.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Example Tab -->
        </div>
    </section>
