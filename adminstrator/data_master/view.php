<section class="content">
        <div class="container-fluid">
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Master 
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                
                                <li role="presentation" class="active"><a href="#barang" data-toggle="tab"> <i class="material-icons">supervisor_account</i>Mahasiswa</a></li>
                                <li role="presentation" ><a href="#supplier" data-toggle="tab"> <i class="material-icons"> create</i>Jurusan</a>
                                </li>
                                <li role="presentation" ><a href="#jenis_barang" data-toggle="tab"> <i class="material-icons"> create</i>Fakultas</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                 
                                <div role="tabpanel" class="tab-pane fade in active" id="barang">
                                    <?php include 'adminstrator/data_master/mahasiswa/view.php'; ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade " id="supplier">
                                    <?php include 'adminstrator/data_master/jurusan/view.php'; ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade " id="jenis_barang">
                                    <?php include 'adminstrator/data_master/fakultas/view.php'; ?>
                                </div>                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Example Tab -->
        </div>
    </section>
