<!-- Start Sign In Area -->
<section class="sign-in-area ptb-100">
    <div class="container">
        <div class="section-title text-center mb-4">
            <span style="font-size: 24px; font-weight: bold;">Pendaftaran Beasiswa</span>
        </div>
        <div class="contact-wrap-form log-in-width">
            <form id="login-form" action="<?=base_url('/home/insertformdaftar')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 mb-3">
                        <input class="form-control" type="text" name="name" placeholder="Nama Mahasiswa" required>
                    </div>

                    <div class="col-12 mb-3">
                        <input class="form-control" type="text" name="NIK" placeholder="NIK" required>
                    </div>

                    <div class="col-12 mb-3">
                        <select name="jurusan" class="form-select" required>
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Teknologi Informasi">Teknologi Informasi</option>
                            <option value="Kedokteran Umum">Kedokteran Umum</option>
                            <option value="Pendidikan Guru Sekolah Dasar">Pendidikan Guru Sekolah Dasar</option>
                            <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                        </select>

                    </div>

                    <div class="col-12 mb-3">
                        <input class="form-control" type="text" name="nilai" placeholder="Nilai IPK" required>
                    </div>

                    <div class="col-12 mb-4">
                        <input class="form-control" type="file" name="bukti" required>
                    </div>

                    <div class="col-12 text-center">
                        <button class="default-btn btn-two" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
