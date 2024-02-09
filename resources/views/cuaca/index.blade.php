<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <section class="body">
        <div class="container mt-4">


            <div class="row">
                <div class="col-md-4 mx-auto text-center">
                   <h4>Search Cuaca</h4>
                    <div class="mb-2">
                    <form onsubmit="searchCuaca(event)">
                        @csrf

                        <div class="d-flex align-items-center">
                            <div class="col-md-8">
                                <input type="text" name="lokasi" id="lokasi" class="form-control">
                            </div>
                            <div class="col-md">
                                <button type="submit" class="btn btn-sm bg-warning">Cari</button>
                            </div>
                        </div>

                    </form>
                </div>
                    <div class="card">
                        <h2>Cuaca</h2>
                        <p id="datacuaca"></p>
                        <div class="card-body">
                            <img src="" id="gambar" alt="">
                        </div>
                        <p id="negara"></p>
                        <h2 id="suhu"></h2>
                        <h4 id="waktu"></h4>
                        <div class="col-md-2">


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <script>
        //  function cuaca() {
        //     let cuaca = document.getElementById("datacuaca");
        //     cuaca.style.color = "red";
        //     let negara = document.getElementById("negara");
        //     let suhu = document.getElementById("suhu");
        //     let imagecuaca = document.getElementById("gambar");
        //     let waktu = document.getElementById("waktu");
        //     $.ajax({
        //         type: "GET",
        //         url: "/cuacadata",
        //         dataType: "json",
        //         success: function (response) {
        //             cuaca.innerHTML = response.location.name;
        //             negara.innerHTML = response.location.country;
        //             suhu.innerHTML = `${response.current.temp_c}<sup>o</sup>C`;
        //             imagecuaca.src = "https:" + response.current.condition.icon;
        //             waktu.innerHTML = `${response.location.localtime}`;

        //         },
        //         error: function () {
        //             cuacaElement.innerHTML = "Gagal mengambil data cuaca.";
        //             cuacaElement.style.color = "black";
        //         }
        //     });
        // }

        // function searchCuaca(event) {
        //     event.preventDefault(); // Mencegah form untuk melakukan submit dan memuat ulang halaman
        //     let lokasi = document.getElementById("lokasi").value;
        //     let cuacaElement = document.getElementById("datacuaca");
        //     cuacaElement.style.color = "red";
        //     let negara = document.getElementById("negara");
        //     let suhu = document.getElementById("suhu");
        //     let imagecuaca = document.getElementById("gambar");
        //     let waktu = document.getElementById("waktu");

        //     $.ajax({
        //         type: "GET",
        //         url: "/cuacadata?lokasi=" + lokasi,
        //         dataType: "json",
        //         success: function (response) {
        //             cuacaElement.innerHTML = response.location.name;
        //             negara.innerHTML = response.location.country;
        //             suhu.innerHTML = `${response.current.temp_c}<sup>o</sup>C`;
        //             imagecuaca.src = "https:" + response.current.condition.icon;
        //             waktu.innerHTML = `${response.location.localtime}`;
        //         },
        //         error: function () {
        //             cuacaElement.innerHTML = "Gagal mengambil data cuaca.";
        //             cuacaElement.style.color = "black";
        //         }
        //     });
        // }

        // searchCuaca();

        function searchCuaca(event) {
            if (event) {
                event.preventDefault();
            }
            let lokasi = document.getElementById("lokasi").value;
            let cuacaElement = document.getElementById("datacuaca");
            cuacaElement.style.color = "red";
            let negara = document.getElementById("negara");
            let suhu = document.getElementById("suhu");
            let imagecuaca = document.getElementById("gambar");
            let waktu = document.getElementById("waktu");



            let url = "/cuacadata";
            if (lokasi.trim() !== "") {
                url += "?lokasi=" + lokasi;
            }

            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {

                    let rawDate = response.location.localtime.split(' ')[0]; // Mengambil bagian tanggal dari string
                    let parts = rawDate.split('-'); // Membagi tanggal menjadi bagian-bagian
                    let formattedDate = `${parts[2]}-${parts[1]}-${parts[0]}`; // Mengatur ulang format tanggal
                    cuacaElement.innerHTML = response.location.name;
                    negara.innerHTML = response.location.country;
                    suhu.innerHTML = `${response.current.temp_c}<sup>o</sup>C`;
                    imagecuaca.src = "https:" + response.current.condition.icon;
                    waktu.innerHTML = `${formattedDate}`;
                },
                error: function() {
                    cuacaElement.innerHTML = "Gagal mengambil data cuaca.";
                    cuacaElement.style.color = "black";
                }
            });
        }

        searchCuaca();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
