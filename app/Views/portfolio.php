 
 <!-- Inner Banner -->
        <div class="inner-banner inner-bg7">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Pendaftaran</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <i class='bx bxs-chevrons-right'></i>
                        </li>
                        <li>Pendaftaran</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- Portfolio Area -->
        <section class="portfolio-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span>Pendaftaran</span>
            <h2>Sedang Berlangsung</h2>
        </div>
        <div class="row justify-content-center pt-45">
            <!-- Kartu dari Database, hanya satu card yang ditampilkan -->
            <?php if (!empty($beasiswa)): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="portfolio-item text-center">
                        <div class="portfolio-img">
                            <a href="<?= base_url('home/pendaftaranpilih/' . $beasiswa[0]['id_beasiswa']) ?>">
                                <img src="<?= base_url('assets/img/siswa.png') ?>" alt="Beasiswa">
                            </a>
                            <div class="portfolio-tag">
                                <a href="#"><span><?= date('m-d-Y', strtotime($beasiswa[0]['tanggal_buka'])) ?></span></a>
                            </div>
                            <div class="portfolio-content">
                                <a href="<?= base_url('home/pendaftaranpilih/' . $beasiswa[0]['id_beasiswa']) ?>">
                                    <h3><?= esc($beasiswa[0]['tipe_beasiswa']) ?></h3>
                                </a>
                                <i class='bx bxs-chevron-right'></i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
        <!-- Portfolio Area End -->