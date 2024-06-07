<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-success">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-success">
                    Data status
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('status/add') ?>" class="btn btn-sm btn-success btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah status
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>ID status</th>
                    <th>Nama status</th>
                    <th>Jenis status</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (isset($status)):
                    foreach ($status as $st):
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $st['id_status']; ?></td>
                            <td><?= $st['nama_status']; ?></td>
                            <td><?= $st['nama_jenis']; ?></td>
                            <td><?= $st['stok']; ?></td>
                            <td><?= $st['nama_satuan']; ?></td>
                            <td>
                                <a href="<?= base_url('status/edit/') . $st['id_status'] ?>"
                                    class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')"
                                    href="<?= base_url('status/delete/') . $st['id_status'] ?>"
                                    class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>