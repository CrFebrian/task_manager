<!doctype html>
<html lang="{{ str_replace('_', '-',   app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Task Management Activity</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Custom Styles -->
    <style>
.custom-card {
    padding: 5px; /* Menambahkan padding */
    margin: 20px;  /* Menambahkan margin */
    height: 90%; /* Mengatur tinggi kotak agar memanfaatkan ruang */
    min-height: 200px; /* Mengatur tinggi minimum kotak */
}

        .btn-rounded {
            border-radius: 20px;
        }

        .full-width-header {
            width: 100%;
            background-color: #ececec ;
            padding: 15px 20px;
            box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-custom {
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .task-list {
            margin-top: 20px;
        }

        .task-list .card {
            margin-bottom: 20px;
        }

        .header-title {
            font-size: 24px;
            font-weight: bold;
            display: inline-block;
        }

        .full-width-header .header-title {
            text-align: left;
        }

        .full-width-header .float-end {
            margin-right: 0;
        }
    </style>

</head>
<body>

    <header class="full-width-header d-flex justify-content-between align-items-center">
        <div class="header-title">Task Manager</div>
        <div>
            <!-- Tombol mengarah ke halaman /create -->
            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-rounded">
                Tambah Task
            </a>
        </div>
    </header>


    <div class="container">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
