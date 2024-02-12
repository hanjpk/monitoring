<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta http-equiv="refresh" content="4"></meta>-->
    <title>Flood Early Warning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        .bg-gradient {
            background: linear-gradient(90deg, #663783 0%, #db1852 100%) !important;
        }

        body {
            background: #f5f5f5 !important;
        }

        nav ul {
            /* background: linear-gradient(90deg, #663783 0%, #db1852 100%) !important; */
            padding: 0 0px;
            list-style: none;
            position: relative;
            /*position: fixed;*/
            width: 100%;
            font-family: ‘helvetica’, arial;
        }

        nav ul:after {
            content: "";
            clear: both;
            display: block;
        }

        nav ul li {
            float: left;
        }

        nav ul li:hover {
            background-color: #222;
        }

        nav ul li a {
            display: block;
            padding: 20px 30px;
            text-decoration: none;
            color: #fff;
        }

        nav ul li a:hover {
            color: #fff;
        }

        nav ul ul {
            display: none;
            /* background: #111; */
            background: linear-gradient(90deg, #663783 0%, #db1852 100%) !important;
            padding: 0;
            position: absolute;
            top: 100%;
            max-width: 300px;
            width: auto;
        }

        nav ul ul li {
            float: none;
            /* border-bottom: 1px solid rgba(0,0,0,.2); */
            position: relative;
        }

        nav ul li:hover>ul {
            display: block;
        }

        nav ul ul li a {
            padding: 10px 40px;
            color: #fff;
        }

        nav ul ul ul {
            position: absolute;
            left: 100%;
            top: 0;
            width: 200px;
        }

        .percentage {
            position: absolute;
            bottom: 0;
            right: 0;
            margin: 10px;
            /* Atur margin sesuai dengan kebutuhan Anda */
            font-size: 18px;
            /* Sesuaikan dengan ukuran yang Anda inginkan */
        }
    </style>
</head>

<body>
    <div class=" navbar-expand-lg navbar-dark bg-gradient py-3" style="color: white; width: auto;">
        <a class="navbar-brand font-weight-bold" href="">
            <h5 class="text-center mb-0 py-0">WORKSHOP ITARSI STMKG</h5>
            <h6 class="text-center mb-1 py-1">Sekolah Tinggi Meteorologi Klimatologi dan Geofisika</h6>
        </a>
    </div>

    <div class="container">

        <h1 class="text-center mt-3 mb-5">MONITORING DHT11</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-center">
            
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-0"><strong>
                                Suhu
                            </strong></h4>
                        <p class="text-xs font-weight-bold">Data on: 2024-02-11 12:00
                            </p>
                        <hr>
                        <h1 class="card-text text-center mb-4">25°C
                        </h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-0"><strong>
                                Kelembaban
                            </strong></h4>
                        <p class="text-xs font-weight-bold mb-1">Data on: 2024-02-11 12:00
                            </p>
                        <hr>
                        <h1 class="card-text text-center mb-4">65%
                        </h1>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>
<!--<footer>-->
<!--    <div class= "container">-->
<!--    <p>Unit Penelitian dan Pengabdian Kepada Masyarakat Sekolah Tinggi Meteorologi Klimatologi dan Geofisika</p>         -->
<!--    </div> -->
<!--</footer>-->

</html>
