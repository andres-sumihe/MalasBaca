<div class="col-md-12 col-lg-12 tab-pane fade show active" id="Dashboard" role="tabpanel" aria-labelledby="Dashboard-tab" >
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <h3 class="font-weight-bold">Buku Terbaru</h3>
                            <?php foreach ($buku as $b): ?>

                                <div class="col-md-6 px-1 col-lg-6 col-sm-12 mb-2">
                                    <a class="cards" href="detail-kelas.html">
                                    <div style="background-image: url('{{ $b->url_cover }}');" class="bg-imk d-flex text-white justify-content-center rounded align-items-center ds ">
                                        
                                        <h6 class="font-weight-bold text-center">{{ $b->nama_buku }}</h6>
                                    </div>
                                    </a>
                                </div>
                            <?php endforeach ?>
                        </div>
                        
                        <div class="col-md-6 col-lg-6">
                            <h3 class="font-weight-bold">Pengingat Pinjaman</h3>
                            <div class="col-lg-12 row justify-content-between mt-4 mb-5" >
                            <div class="col-md-4 px-1 col-lg-6 col-sm-12 mb-2">
                                <a class="cards" href="tugas-kelas.html">
                                <div class="bgds-3 d-flex text-white justify-content-center rounded align-items-center ds2 ">
                                    <h4 class="font-weight-bold">SBD</h4>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-4 px-1 col-lg-6 col-sm-12 mb-2 ">
                                <a class="cards" href="tugas-kelas.html">
                                <div class="bgds-3 d-flex text-white justify-content-center rounded align-items-center ds2" >
                                    <h4 class="font-weight-bold">Jarkom</h4>
                                </div>
                                </a>
                            </div>
                            </div>
                            <h3 class="font-weight-bold">Pengumuman</h3>
                            <div class=" card imk-shadow col-lg-11   mt-4 px-2 py-2 border-0 text-imk-secondary" >
                                <p><span class="font-weight-bold">Interaksi Manusia dan Komputer A</span> <br />
                                Immanuel Yosian Leo telah menambahkan komentar</p>
                                <p><span class="font-weight-bold">Interaksi Manusia dan Komputer A</span> <br />
                                Awanda Ardaneswari,S.Kom telah menambahkan komentar</p>
                            </div>
                        </div>
                    </div>
                </div>