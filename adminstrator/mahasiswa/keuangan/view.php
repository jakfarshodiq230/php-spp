
<section class="content">
        <div class="container-fluid">
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Keuangan
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#tagihan" data-toggle="tab">Tagihan SPP</a></li>
                                <li role="presentation"><a href="#histori" data-toggle="tab"> Histori</a></li>                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="tagihan">
                                    <?php include 'adminstrator/mahasiswa/keuangan/tagihan-spp.php'; ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="histori">
                                    <?php include 'adminstrator/mahasiswa/keuangan/ansuran-spp.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Example Tab -->
        </div>
    </section>
