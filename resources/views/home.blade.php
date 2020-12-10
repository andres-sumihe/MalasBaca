<!DOCTYPE html>
<html lang="id">

<head>
    <title>MalasBaca</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="icon" href="/assets/img/logoku.png" sizes="32x32" />
    <link rel="icon" href="/assets/img/logoku.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="img/logoku.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>
    <div class="d-flex" id="wrapper">

        <div class="bg-white border-right" id="sidebar-wrapper">
            <div class="sidebar-heading px-4 pt-3 pb-1 d-flex justify-content-between align-items-center"><a
                    href="index.html" class="cards" style="text-decoration: none;">
                    <h4><span class="text-imk font-weight-bold">Malas</span>Baca</h4>
                </a></div>
            <hr style="margin: 0; border: 1px solid black">
            <nav>
                <div class="list-group list-group-flush nav nav-tabs" id="nav-tabs" role="tablist">
                    <a href="#Dashboard" class="list-group-item list-group-item-action bg-white nav-item active" data-toggle="tab" role="tab" aria-controls="Dashboard" aria-selected="true">
                        <i class="fa fa-dashboard fa-lg mr-2" aria-hidden="true"></i> Dashboard</a>

                    <a href="#Daftar-Pinjam" class="list-group-item list-group-item-action bg-white nav-item " data-toggle="tab" role="tab" aria-controls="Daftar-Pinjam" aria-selected="false">
                        <i class="fa fa-newspaper-o fa-lg mr-2" aria-hidden="true"></i> Daftar Pinjam</a>

                    <a href="#Cari-Buku" class="list-group-item list-group-item-action bg-white nav-item " data-toggle="tab" role="tab" aria-controls="Cari-Buku" aria-selected="false">
                        <i class="fa fa-search fa-lg mr-2"aria-hidden="true"></i> Cari Buku</a>

                    <a href="#Daftar-Buku" class="list-group-item list-group-item-action bg-white nav-item " data-toggle="tab" role="tab" aria-controls="Daftar-Buku" aria-selected="false">
                        <i class="fa fa-list fa-lg mr-2" aria-hidden="true"></i> Daftar Buku</a>

                    <a href="#Akun" class="list-group-item list-group-item-action bg-white nav-item " data-toggle="tab" role="tab" aria-controls="Akun" aria-selected="false">
                        <i class="fa fa-user-circle-o fa-lg mr-2" aria-hidden="true"></i> Pengaturan Akun</a>

                    <a href="/" class="list-group-item list-group-item-action bg-white nav-item ">
                        <i class="fa fa-sign-out fa-lg mr-2" aria-hidden="true"></i> Logout</a>
                </div>
            </div>
        </nav>
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3">
                <button class="btn" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>
                <a href="index.html" class="cards">
                    <h4 class=" mt-1 mx-1"> <span class="text-imk font-weight-bold"> Malas</span>Baca</h4>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav navbar-nav ml-auto align-items-center">
                        <li class="nav-item active mx-2">
                            <a class="nav-link" href="#"><i class=" text-secondary fa fa-plus fa-lg" aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item mx-2">
                            <i class="fa fa-ellipsis-v fa-lg text-imk-secondary" aria-hidden="true"></i>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#"><img class="rounded-circle" src="/assets/img/logoku.png" style="width: 30px;"></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-imk mx-auto my-3 bg-white rounded py-3 px-3 tab-content" id="nav-tabContent">
                <div class="col-md-12 col-lg-12 tab-pane fade show active" id="Dashboard" role="tabpanel" aria-labelledby="Dashboard-tab" >
                    <div class="row">
                        <div class="col-md-6 col-lg-6 ">
                            <h3 class="font-weight-bold">Buku Terbaru</h3>
                            <div class="d-flex flex-row flex-wrap">
                                <?php foreach ($buku as $b): ?>
                                    <div class="col-md-6 px-1 col-lg-6 col-sm-12 mb-2">
                                        <a class="cards" href="#Modal" data-toggle="modal" data-target="#Modal" data-whatever="TEST"
                                            data-id="{{$b->id_buku}}"
                                            data-title="{{$b->nama_buku}}"
                                            data-author="{{$b->penulis_buku}}"
                                            data-publisher="{{$b->penerbit_buku}}"
                                            data-url="{{$b->url_cover}}"
                                            data-year="{{$b->tahun}}">
                                            <div style="background-image: url('{{ $b->url_cover }}');" class="d-flex text-white rounded ds">
                                                
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach ?>
                            </div>
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
                <div class="col-md-12 col-lg-12 tab-pane fade show " id="Daftar-Pinjam" role="tabpanel" aria-labelledby="Daftar-Pinjam-tab" >
                        Daftar-Pinjam
                </div>
                <div class="col-md-12 col-lg-12 tab-pane fade show " id="Cari-Buku" role="tabpanel" aria-labelledby="Cari-Buku-tab" >
                        Cari-Buku
                </div>
                <div class="col-md-12 col-lg-12 tab-pane fade show " id="Daftar-Buku" role="tabpanel" aria-labelledby="Daftar-Buku-tab" >
                        Daftar-Buku
                </div>
                <div class="col-md-12 col-lg-12 tab-pane fade show " id="Akun" role="tabpanel" aria-labelledby="Akun-tab" >
                        <h3><strong>Akun</strong></h3>
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">NIM</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" value="nim_pengguna" disabled>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" value="nama_pengguna">
                        </div>

                        <!-- Ganti Password -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Ganti Password
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                
                                <form action="/gantipassword" method="post">
                                    {{csrf_field()}}
                                    <div class="mb-3">
                                      <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Password Lama">
                                    </div>
                                    <div class="mb-3">
                                      <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Password Baru">
                                    </div>
                                    <div class="mb-3">
                                      <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" placeholder="Konfirmasi Password Baru">
                                    </div>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle">Detail Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-row">
                <div id="cover" style="" class="d-flex text-white rounded dsModal col-md-6 col-sm-12"></div>
                <div class="information p-3 col-md-6 col-sm-12">
                
                    <h6 class="rowTitleModal">Judul</h6>
                    <p id="Title"></p>
                    <hr>

                    <h6 class="rowTitleModal">Penulis</h6>
                    <p id="Author"></p>
                    <hr>
                
                    <h6 class="rowTitleModal">Penerbit</h6>
                    <p id="Publisher"></p>
                    <hr>

                    <h6 class="rowTitleModal">Tahun Terbit</h6>
                    <p id="Year"></p>
                    <hr>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex flex-row">
                    <p>Stok</p>
                </div>
            </div>
            </div>
        </div>
    </div>


    <script src="js/jquery/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    <script type="text/javascript" src="/js/imk.js"></script>

    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>

    <script>
        $('#Modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var recipient = button.data('whatever');
        var title = button.data('title'); 
        var book_id = button.data('id');    
        var author = button.data('author'); 
        var publisher = button.data('publisher'); 
        var url = button.data('url');
        var year = button.data('year');
            
        var modal = $(this);
        var background =  "background-image: url('"+url+"');";
        modal.find('#cover').attr("style", background);
        modal.find('#Title').text(title);
        modal.find('#Author').text(author);
        modal.find('#Publisher').text(publisher);
        modal.find('#Year').text(year);
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>
