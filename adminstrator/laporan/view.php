<section class="content">
        <div class="container-fluid">
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Kelola Laporan
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#mahasiswa" data-toggle="tab">Mahasiswa Per Semester
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#keuangan" data-toggle="tab">
                                        Keuangan Per Semester
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#kartu" data-toggle="tab">
                                        Cetak Kartu
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="mahasiswa">
                                   <?php include 'adminstrator/laporan/laporan-mahasiswa/view.php'; ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="keuangan">
                                    <?php include 'adminstrator/laporan/laporan-keuangan/view.php'; ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="kartu">
                                    <?php include 'adminstrator/laporan/cetak-kartu/view.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Example Tab -->
        </div>
    </section>
