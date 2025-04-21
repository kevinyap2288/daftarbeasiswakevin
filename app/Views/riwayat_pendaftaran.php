<div class="page-wrapper bg-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-3">
                    <div class="card-body">

                        <h2>Riwayat Pendaftaran Beasiswa</h2>
<?php if (session()->has('success')) : ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark text-center">
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIK</th>
                <th>Jurusan</th>
                <th>Tipe Beasiswa</th>
                <th>Tanggal Daftar</th>
                <th>Nilai IPK</th>
                <th>Bukti IPK</th>
                <th>Status</th>
                <th>Keterangan</th>

                <?php if (in_array(session('level'), [0, 1])) : ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pendaftaran)) : ?>
                <?php $no = 1; foreach ($pendaftaran as $p) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= esc($p['nama_mahasiswa']) ?></td>
                        <td><?= esc($p['nik']) ?></td>
                        <td><?= esc($p['jurusan']) ?></td>
                        <td><?= esc($p['tipe_beasiswa']) ?></td>
                        <td class="text-center"><?= date('d-m-Y', strtotime($p['tanggal_daftar'])) ?></td>
                        <td class="text-center"><?= esc($p['nilai_ipk']) ?></td>
                        <td class="text-center">
                            <?php if (!empty($p['bukti_ipk'])) : ?>
                                <a href="<?= base_url('uploads/bukti_ipk/' . $p['bukti_ipk']) ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                            <?php else : ?>
                                <small class="text-muted">-</small>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <span class="badge 
                                <?= $p['status'] === 'Sedang Diajukan' ? 'bg-secondary' 
                                   : ($p['status'] === 'Diterima' ? 'bg-success' 
                                   : 'bg-danger') ?>">
                                <?= esc($p['status']) ?>
                            </span>
                        </td>
                        <td><?= esc($p['keterangan'] ?? '-') ?></td>

                        <?php if (in_array(session('level'), [0, 1])) : ?>
                            <td class="text-center">
                                <?php if ($p['status'] === 'Sedang Diajukan') : ?>
                                    <a href="<?= base_url('home/setujui/' . $p['id_pendaftaran']) ?>" class="btn btn-sm btn-success mb-1" onclick="return confirm('Setujui pendaftaran ini?')">Loloskan</a>
                                    <a href="<?= base_url('home/tolak/' . $p['id_pendaftaran']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tolak pendaftaran ini?')">Tolak</a>
                                <?php else : ?>
                                    <small class="text-muted">Sudah diproses</small>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="<?= in_array(session('level'), [0, 1]) ? 11 : 10 ?>" class="text-center">
                        <small>Belum ada riwayat pendaftaran</small>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
