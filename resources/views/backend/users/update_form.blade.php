<!doctype html>
<html lang="tr">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Laravel E-Ticaret Sitesi">
    <meta name="author" content="Computer Worm">
    <title>Dashboard Users Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/favicon.ico">

    <link rel="stylesheet" href="{{asset('build/assets/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    <meta name="theme-color" content="#712cf9">

    <link href="{{asset('build/assets/dashboard.css')}}" rel="stylesheet">

</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"> Laravel E-Ticaret </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#"> Çıkış </a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span class="fa fa-home" class="align-text-bottom"></span>
                                Yönetim Paneli
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='{{url("/users")}}'>
                                <span class="fa fa-users" class="align-text-bottom"></span>
                                Kullanıcılar
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"> Yönetim Paneli </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="/users/create">
                                <button type="button" class="btn btn-sm btn-outline-danger">Yeni Ekle</button>
                            </a>
                        </div>
                    </div>
                </div>

                <h2> Kullanıcı Düzenle </h2>
                <div>
                    <form action='{{url("/users/$user->user_id")}}' method="POST" class="row g-3 needs-validation" novalidate>
                        @csrf
                        @method("PUT")
                        <div class="col-md-3">
                            <label for="name" class="form-label">Ad - Soyad</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
                            <div class="invalid-feedback">
                                Lütfen Adınızı Giriniz!
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="email" class="form-label">Mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                            <div class="invalid-feedback">
                                Lütfen Mail Adresinizi Giriniz!
                            </div>
                        </div>
                        <div class="col-md-6"></div> <!-- şife alanını tekrar aktif ettiğinde burayı da düzelt -->
                        <div class="col-md-3 custom-control">
                            <label for="is_active" class="form-label">Aktif - Pasif</label>
                            <select class="form-select" required aria-label="select example" name="is_active" id="is_active">
                                @if($user->is_active == 1)
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                @else
                                    <option value="0">Pasif</option>
                                    <option value="1">Aktif</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4 custom-control custom-checkbox" style="font-size: large; line-height: 75px;">
                            <input type="checkbox" class="custom-control-input" id="is_admin" name="is_admin" value="1" {{$user->is_admin == 1 ? "checked" : ""}}>
                            <label class="custom-control-label" for="is_admin">Yetkili Kullanıcı</label>
                        </div>                       
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                    </form>

                </div>
            </main>
        </div>
    </div>


    <script type="text/javascript" src="{{asset('build/assets/app.js')}}"></script>
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>


</body>

</html