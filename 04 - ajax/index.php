<?php
// Include your connection.php to use the established connection
include 'config/connection.php';

// Prepare the SQL query to select the latest timestamp, suhu, and kelembaban
$query = "SELECT timestamp AS waktu, suhu, kelembaban FROM dht11 ORDER BY timestamp DESC LIMIT 1";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if we got a result
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the result row as an associative array
    $row = mysqli_fetch_assoc($result);

    // Define your variables
    $waktu = $row['waktu'];
    $suhu = $row['suhu'];
    $kelembaban = $row['kelembaban'];
} else {
    echo "No data found.";
}

// Close the connection
mysqli_close($conn);
?>


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

    <marquee id="alert_suhu" bgcolor="yellow" behavior="scroll" scrollamount="25"
        style="font-weight: bold; font-size:32px; font-family: 'Roboto Mono', monospace; margin-bottom: 2px;"></marquee>
    <marquee id="alert_kelembaban" bgcolor="yellow" behavior="scroll" scrollamount="25"
        style="font-weight: bold; font-size:32px; font-family: 'Roboto Mono', monospace; margin-bottom: 2px;"></marquee>

    <div class="container">

        <h1 class="text-center mt-3 mb-5">MONITORING DHT11</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-center">
            
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 border-0 shadow-sm" id="card_suhu">
                    <div class="card-body">
                        <h4 class="card-title mb-0"><strong>
                                Suhu
                            </strong></h4>
                        <p class="text-xs font-weight-bold">Data on: <?= $waktu ?>
                            </p>
                        <hr>
                        <h1 class="card-text text-center mb-4"><?= $suhu ?>°C
                        </h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 border-0 shadow-sm" id="card_kelembaban">
                    <div class="card-body">
                        <h4 class="card-title mb-0"><strong>
                                Kelembaban
                            </strong></h4>
                        <p class="text-xs font-weight-bold mb-1">Data on: <?= $waktu ?>
                            </p>
                        <hr>
                        <h1 class="card-text text-center mb-4"><?= $kelembaban ?>%
                        </h1>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    function fetchData() {
        fetch('fetch_data.php') // Adjust the path to where your PHP file is located
            .then(response => response.json())
            .then(data => {
                if (!data.error) {
                    // Assuming you have elements with IDs 'card_suhu' and 'card_kelembaban' for displaying data
                    document.querySelector('#card_suhu .card-text').textContent = data.suhu + '°C';
                    document.querySelector('#card_kelembaban .card-text').textContent = data.kelembaban + '%';
                    document.querySelectorAll('.text-xs.font-weight-bold').forEach(p => {
                        p.textContent = 'Data on: ' + data.waktu;
                    });
                } else {
                    console.error(data.error);
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Fetch data initially and then set an interval to refresh it every 5 minutes (300000 milliseconds)
    fetchData();
    setInterval(fetchData, 1000);
    });
    </script>


    <script>
        // Assuming $data->curah_hujan is your PHP variable
        var suhu = <?= $suhu ?>;
        var kelembaban = <?= $kelembaban ?>;
        var alert_suhu = document.getElementById('alert_suhu');
        var alert_kelembaban = document.getElementById('alert_kelembaban');
        var card_suhu = document.getElementById('card_suhu');
        var card_kelembaban = document.getElementById('card_kelembaban');

        if (suhu >= 40) {
            alert_suhu.innerHTML = 'Suhu tinggi terdeteksi';
            card_suhu.style.backgroundColor = 'pink'; // Example color
        } else {
            card_suhu.style.backgroundColor = 'white';
            alert_suhu.style.display = 'none';
        }

        if (kelembaban > 90) {
            alert_kelembaban.innerHTML = 'Kelembaban tinggi terdeteksi';
            card_kelembaban.style.backgroundColor = 'pink'; // Example color
        } else {
            card_kelembaban.style.backgroundColor = 'white';
            alert_kelembaban.style.display = 'none';
        }
    </script>

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
