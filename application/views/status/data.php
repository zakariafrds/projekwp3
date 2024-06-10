<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-success">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-success">
                    Data status
                </h4>
            </div>
 
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>ID Barang</th>
                    <th>Kode Tanaman</th>
                    <th>Nama </th>
                    <th>Jenis</th>
                    <th>Stok</th>

                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (isset($status)) :
                    foreach ($status as $st) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $st['id_barang']; ?></td>
                            <td><?= $st['kode_tanaman']; ?></td>
                            <td><?= $st['nama_barang']; ?></td>
                            <td><?= $st['nama_jenis']; ?></td>
                            <td><?= $st['stok']; ?></td>

                            <td class="text-<?= $st['kondisi'] == "Sakit" ? 'warning' : 'success'; ?>"><?= $st['kondisi']; ?></td>

                            <td>
                                <a href="<?= base_url('status/edit/') . $st['id_barang'] . "/" . $st['kode_tanaman'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                            
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>