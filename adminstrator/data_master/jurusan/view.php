
            <!-- Basic Examples -->
                        <div class="header">
                            <h2>
                                DATA JURUSAN
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="ios">
                                       <button type="button" class="btn bg-green btn-xs waves-effect"><i class="material-icons">cached</i></button>
                                    </a>
                                    <a href="?page=jurusan&aksi=kosongkan" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                                    <button type="button" class="btn bg-orange btn-xs waves-effect"><i class="material-icons">delete</i></button>
                                    </a>
                                    <a href="?page=jurusan&aksi=tambah" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                                    <button type="button" class="btn bg-blue btn-xs waves-effect"><i class="material-icons">add</i></button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th >No</th>
                                            <th>Kode</th>
                                            <th>Jurusan</th>
                                            <th>Fakultas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th >No</th>
                                            <th>Kode</th>
                                            <th>Jurusan</th>
                                            <th>Fakultas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                                $sql = $mysqli -> query ("SELECT * FROM tb_jurusan,tb_fakultas WHERE tb_jurusan.kode_fakultas=tb_fakultas.kode_fakultas");
                                                $no=1;
                                                while ($data = $sql -> fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td ><?php echo $no++ ?></td>
                                            <td ><?php echo $data['kode_jurusan']  ?></td>
                                            <td ><?php echo $data['nama_jurusan']  ?></td>
                                            <td ><?php echo $data['nama_fakultas']  ?></td>
                                            <td align="center">
                                                <a onclick="return confirm('Anda Yakin Akan Mengedit Data Ini ?')" href="?page=jurusan&aksi=edit&kode_jurusan=<?php echo $data['kode_jurusan']?>"><button type="button" class="btn bg-green btn-xs waves-effect"><i class="material-icons">edit</i></button></a>
                                                <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" href="?page=jurusan&aksi=hapus&kode_jurusan=<?php echo $data['kode_jurusan']?>"><button type="button" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></button></a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            <!-- #END# Basic Examples -->