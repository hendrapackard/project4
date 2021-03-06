<?php $i = 0 ?>

    <!--flash message-->
<?php $this->load->view('_partial/flash_message') ?>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>APPROVE PENGEMBALIAN</h2>
                        </div>

                    </div>

                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">person</i>
            </span>
                                <?= form_open($form_action) ?>

                                <div class="form-line">

                                    <?= isset($input->id_kelas) ? form_hidden('id_kelas', $input->id_kelas) : '' ?>
                                    <?= form_input('keywords',$input->keywords, ['class' => 'form-control','placeholder' => 'No Induk / Nama', 'required autofocus']) ?>
                                </div>
                            </div>
                            <?= form_error('keywords') ?>

                        </div>
                    </div>
                    <div class="footer">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <?= form_button(['type' => 'submit','content' => 'Cari','class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'top' ,'title' => 'Cari']) ?>
                                &nbsp;
                                <?= anchor(base_url(),'Batal', ['class' => 'btn btn-default waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'top' ,'title' => 'Batal']) ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?= form_close() ?>

<?php if (!$first_load): ?>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>TABEL PENCARIAN</h2>
                        </div>

                    </div>

                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <?php if ($peminjaman) : ?>
                                    <table id="table_biasa" class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Tanggal Pinjam</th>
                                            <th>No Induk</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Judul</th>
                                            <th>Denda</th>
                                            <th>Kembalikan</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($peminjaman as $pinjam): ?>

                                            <td><?= date('d-m-Y', strtotime($pinjam->tanggal_pinjam )) ?></td>
                                            <td><?= $pinjam->no_induk ?></td>
                                            <td><?= $pinjam->nama ?></td>
                                            <td><?= $pinjam->nama_kelas ?></td>
                                            <td><?= $pinjam->judul_buku ?></td>
                                            <td>Rp. <?= number_format($pinjam->denda,0,',','.') ?></td>
                                            <td>
                                                <?= form_open("approve_kembali/kembalikan") ?>
                                                <?= form_hidden('id_pinjam',$pinjam->id_pinjam) ?>
                                                <?= form_hidden('denda',$pinjam->denda) ?>
                                                <?= form_button(['type' => 'submit','content' => 'Kembalikan', 'class' => 'btn btn-warning waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'bottom' ,'title' => 'Kembalikan','onclick' => "return confirm('Anda yakin akan mengembalikan buku?')"]) ?>
                                                <?= form_close() ?>
                                            </td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <p>Data peminjaman untuk anggota tersebut tidak ada, atau buku yang dipinjam sudah dikembalikan</p>
                                <?php endif ?>

                            </div>

                            <!-- /.box-body -->
                        </div>

                        <!-- /.box -->


                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
<?php endif ?>