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


</head>

<body style="background-image: url('/assets/img/bg.jpeg')">
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

                    <a href="#Daftar-User" class="list-group-item list-group-item-action bg-white nav-item " data-toggle="tab" role="tab" aria-controls="Daftar-User" aria-selected="false">
                        <i class="fa fa-user-circle-o fa-lg mr-2" aria-hidden="true"></i> Data User</a>

                    <a href="#Daftar-Buku" class="list-group-item list-group-item-action bg-white nav-item " data-toggle="tab" role="tab" aria-controls="Daftar-Buku" aria-selected="false">
                        <i class="fa fa-newspaper-o fa-lg mr-2" aria-hidden="true"></i>Data Buku</a>

                    <a href="#Akun" class="list-group-item list-group-item-action bg-white nav-item " data-toggle="tab" role="tab" aria-controls="Akun" aria-selected="false">
                        <i class="fa fa-list fa-lg mr-2" aria-hidden="true"></i> Data Transaksi</a>

                    <a href="/admin/login" class="list-group-item list-group-item-action bg-white nav-item ">
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
                        
                </div>
                <div class="col-md-12 col-lg-12 tab-pane fade show " id="Daftar-User" role="tabpanel" aria-labelledby="Daftar-User-tab" >
                        Daftar-User
                </div>
                <div class="col-md-12 col-lg-12 tab-pane fade show " id="Daftar-Buku" role="tabpanel" aria-labelledby="Daftar-Buku-tab" >
                <!-- INSERT BUKU -->

                    <div class="d-flex flex-row">
                        <div class="col-md-6 col-sm-12">
                            <form method="post" action="{{ route('saveBuku') }}">
                                {{ csrf_field() }}
                                <table>
                                    <tr>
                                        <td>ID Buku</td>
                                        <td><input type="text" name="id_buku" required class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Buku</td>
                                        <td><input type="text" name="nama_buku" required class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Penulis Buku</td>
                                        <td><input type="text" name="penulis_buku" required class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Penerbit Buku</td>
                                        <td><input type="text" name="penerbit_buku" required class="form-control"></td>
                                    </tr>
                                        <td>Foto</td>
                                        <td>
                                            <input type="file" name="file" class="form-control">
                                        </td>
                                        
                        
                        
                                    </div>
                                    <!-- <tr>
                                        <td>URL Cover Buku</td>
                                        <td><input type="text" name="url_cover" required class="form-control"></td>
                                    </tr> -->
                                    <tr>
                                        <td>Tahun</td>
                                        <td><input type="text" name="tahun" required class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td><input type="text" name="stok_buku" required class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><input type="text" name="status_buku" required class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Insert Buku" required ></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    
                <!-- READ BUKU -->
                Data Buku
                <table class="table table-stripped table-bordered">
                    <tr>
                        <th>ID Buku</th>
                        <th>Nama Buku</th>
                        <th>Penulis Buku</th>
                        <th>Penerbit Buku</th>
                        <th>URL Cover Buku</th>
                        <th>Tahun</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($buku as $b): ?>
                        <tr>
                            <td>{{ $b->id_buku }}</td>
                            <td>{{ $b->nama_buku }}</td>
                            <td>{{ $b->penulis_buku }}</td>
                            <td>{{ $b->penerbit_buku }}</td>
                            <td>{{ $b->url_cover }}</td>
                            <td>{{ $b->tahun }}</td>
                            <td>
                                <a class="cards" href="#Modal" data-toggle="modal" data-target="#Modal" data-whatever="TEST"
                                    data-id="{{$b->id_buku}}"
                                    data-title="{{$b->nama_buku}}"
                                    data-author="{{$b->penulis_buku}}"
                                    data-publisher="{{$b->penerbit_buku}}"
                                    data-url="{{$b->url_cover}}"
                                    data-stock="{{$b->stok_buku}}"
                                    data-status="{{$b->status_buku}}"
                                    data-year="{{$b->tahun}}">
                                Edit</a>
                                 | 
                                <a href="/admin/deleteBuku/{{ $b->id_buku }}">Hapus</a></td>
                        </tr>
                    <?php endforeach ?>
                </table>
                <br>
                <br>
                
                </div>
                <div class="col-md-12 col-lg-12 tab-pane fade show " id="Akun" role="tabpanel" aria-labelledby="Daftar-Transaksi-tab" >
                        Daftar-Transaksi
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
                <h5 class="modal-title" id="ModalTitle">Update Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-row">
                <form method="post" action="/admin/updateBuku/{{ $b->id_buku }}">

                <!-- CEK DONG, KENAPA INI GA JADI :(  -->
                    {{ csrf_field() }}
                    <table>
                        <td><input type="hidden" name="id_buku" id="id_buku" required></td>

                        <tr>
                            <td>Nama Buku</td>
                            <td><input type="text" name="nama_buku" id="Title" required></td>
                        </tr>
                        <tr>
                            <td>Penulis Buku</td>
                            <td><input type="text" name="penulis_buku" id="Author" required></td>
                        </tr>
                        <tr>
                            <td>Penerbit Buku</td>
                            <td><input type="text" name="penerbit_buku" id="Publisher" required></td>
                        </tr>
                        <tr>
                            <td>URL Cover Buku</td>
                            <td><input type="text" name="url_cover" id="cover" required></td>
                        </tr>
                        <tr>
                            <td>Stok Buku</td>
                            <td><input type="text" name="stok_buku" id="Stock" required></td>
                        </tr>
                        <tr>
                            <td>Status Buku</td>
                            <td><input type="text" name="status_buku" id="Status" required></td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td><input type="text" name="tahun" id="Year" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Update Buku" required></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <div class="d-flex flex-row">
                    <p>MalasBaca Library App</p>
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
        var stock = button.data('stock');
        var status = button.data('status');
            
        var modal = $(this);
        var background =  "background-image: url('"+url+"');";
            modal.find('#cover').val(url);
            modal.find('#Title').val(title);
            modal.find('#Author').val(author);
            modal.find('#Publisher').val(publisher);
            modal.find('#Year').val(year);
            modal.find('#Stock').val(stock);
            modal.find('#Status').val(status);
        })
    </script>

</body>

</html>
