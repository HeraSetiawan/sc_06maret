<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- leafleat -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <form action="{{ url('/karyawan/absen') }}" method="post">
            @csrf
            <div id="my_camera" style="width:320px; height:240px;" class="mx-auto"></div>
            <input id="hasil" type="hidden" name='foto'>
            <div class="d-flex justify-content-around my-3">
                <button type="button" onclick="batal()" class="btn btn-lg btn-warning"><i class="bi-arrow-counterclockwise"></i></button>
                <button type="button" onclick="tangkap()" class="btn btn-lg btn-primary"><i class="bi-camera"></i></button>
            </div>
            <div class="mb-3 mx-2">
                <label for="" class="form-label">Keterangan</label>
                <select class="form-select" name="keterangan" id="">
                    <option selected>--Pilih Satu--</option>
                    <option value="masuk">Masuk</option>
                    <option value="keluar">Keluar</option>
                </select>
            </div>
            <div id="map" style="height:200px"></div>
            <input type="hidden" id="lokasi" name="lokasi">
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-dark">absen</button>
            </div>
        </form>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="{{ asset('webcam.js') }}"></script>
    <script language="JavaScript">
        Webcam.set(
            'flip_horiz', true
        );
        Webcam.attach('#my_camera');

        function batal() {
            document.getElementById('hasil').value = "";
            Webcam.unfreeze()
        }

        function tangkap() {
            Webcam.snap(function(data_uri) {
                document.getElementById('hasil').value = data_uri;
            });
            Webcam.freeze()
        }
    </script>
    <script>
        // geolocation
        navigator.geolocation.getCurrentPosition(cekPosisi);
        function cekPosisi(posisi){
            let lokasi = document.querySelector('#lokasi')
            var lintang = posisi.coords.latitude;
            var bujur = posisi.coords.longitude;
            lokasi.value = lintang+','+bujur
            var marker = L.marker([lintang, bujur]).addTo(map);
        }
        // lefleat
        var map = L.map('map').setView([-2.966970, 104.748322], 18);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);


        var circle = L.circle([-2.966970, 104.748322], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 30
        }).addTo(map);
    </script>
</body>

</html>