<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-success">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-success">
                            Form Edit Status Tanaman
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('status') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', [], ['stok' => 0, 'id_barang' => $barang['id_barang']]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_barang">Nama Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_barang', $barang['nama_barang']); ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang...">
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_barang">Kode Barang</label>
                    <div class="col-md-9">
                        <input type="text" name="kode_tanaman" value="<?= $this->uri->segment('4'); ?>" disabled class="form-control" placeholder="Nama Barang...">
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="satuan_id">Satuan Barang</label>

                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="status" id="satuan_id" class="custom-select">
                                <option value="" selected disabled>Pilih Status Barang</option>
                                <option value="Sakit" <?= $kondisi['kondisi'] == "Sakit" ? 'selected' : ''; ?>>Sakit</option>
                                <option value="Sehat" <?= $kondisi['kondisi'] == "Sehat" ? 'selected' : ''; ?>>Sehat</option>
                                <!-- <?php foreach ($satuan as $s) : ?>
                                <option <?= $barang['satuan_id'] == $s['id_satuan'] ? 'selected' : ''; ?>
                                    <?= set_select('satuan_id', $s['id_satuan']) ?> value="<?= $s['id_satuan'] ?>">
                                    <?= $s['nama_satuan'] ?>
                                </option>
                                <?php endforeach; ?> -->
                            </select>
                            <!-- <div class="input-group-append">
                                <a class="btn btn-success" href="<?= base_url('satuan/add'); ?>"><i
                                        class="fa fa-plus"></i></a>
                            </div> -->
                        </div>
                        <input hidden type="text" name="kode_tanaman" value="<?= $this->uri->segment('4'); ?>">
                        <?= form_error('satuan_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>