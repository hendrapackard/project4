<?php $i = 0 ?>

    <!--flash message-->
<?php $this->load->view('_partial/flash_message') ?>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>LAPORAN DENDA</h2>
                        </div>

                    </div>

                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">date_range</i>
            </span>
                                <?= form_open($form_action) ?>

                                <div class="form-line">

                                    <?= form_input('tanggal_awal',$input->tanggal_awal, ['class' => 'datepicker form-control','placeholder' => 'Tanggal Awal', 'required autofocus']) ?>
                                </div>
                            </div>
                            <?= form_error('tanggal_awal') ?>
                            <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">date_range</i>
            </span>

                                <div class="form-line">

                                    <?= form_input('tanggal_akhir',$input->tanggal_akhir, ['class' => 'datepicker form-control','placeholder' => 'Tanggal Akhir', 'required autofocus']) ?>
                                </div>
                            </div>
                            <?= form_error('tanggal_akhir') ?>

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

    <!--Flash message-->
<?php $this->load->view('_partial/flash_message') ?>

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
                <div class="body table-responsive">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <?php if ($dendas) : ?>
                                    <table id="tabel_biasa" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No Induk</th>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($dendas as $denda): ?>
                                            <td><?= ++$i ?></td>
                                            <td><?= date('d-m-Y', strtotime($denda->tanggal_pembayaran)) ?></td>
                                            <td><?= $denda->no_induk ?></td>
                                            <td><?= $denda->nama ?></td>
                                            <td><?= $denda->jumlah ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                    <?php else: ?>
                                        <p>Tidak ada data denda</p>
                                    <?php endif ?>
                                    <?php if ($dendas): ?>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                        <?php
                                        $tanggal_awal = $this->input->post('tanggal_awal',true);
                                        $tanggal_akhir = $this->input->post('tanggal_akhir',true);
                                        ?>
                                        <?= anchor("cetak-laporan-denda/$tanggal_awal/$tanggal_akhir", 'Cetak', ['class' => 'btn btn-primary','target' => '_blank']) ?>
                                        </div>
                                     </div>
                                    <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php endif ?>