<!DOCTYPE html>
<html>

<head>
    <title>Laravel Ajax Data Fetch Example - ItSolutionStuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Laravel Ajax Data Fetch Example - ItSolutionStuff.com</h1>

        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="javascript:void(0)" id="show-user" data-url="{{ route('users.show', $user->id) }}"
                                class="btn btn-info">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}

    </div>
    <div class="card text-center">
        <div class="col-md-4 p-4 mx-auto">
            <label for="">center layout</label>

            <input type="text" class="form-control" id="angka">
        </div>
        <div class="col-md-4 mb-4 p-4 ms-auto">
            <label for="">end layout</label>

            <input type="text" id="jumlah" class="form-control" disabled>
        </div>

        <div class="col-md-4 mb-4 p-4 me-auto">
            <label for="">start layout</label>
            <input type="text" id="total" class="form-control" disabled>
        </div>

    </div>
    <div class="col-md-2 mb-4 p-4 me-auto">
    <button id="tampilkan" class="form-control btn btn-secondary">tampilkan</button>
</div>

    <!-- Modal -->
    <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>ID:</strong> <span id="user-id"></span></p>
                    <p><strong>Name:</strong> <span id="user-name"></span></p>
                    <p><strong>Email:</strong> <span id="user-email"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="cekmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="hasil" class="form-control"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>

<script type="text/javascript">
    $(document).ready(function() {

        /* When click show user */
        $('body').on('click', '#show-user', function() {
            var userURL = $(this).data('url');
            $.get(userURL, function(data) {
                $('#userShowModal').modal('show');
                $('#user-id').text(data.id);
                $('#user-name').text(data.name);
                $('#user-email').text(data.email);
            })
        });

        //    $('#tampilkan').click(function (e) {
        //         e.preventDefault();

        //         $.ajax({
        //             type: "GET",
        //             url: "/ajax/data/cek",
        //             dataType: "json",
        //             success: function (response) {

        //                 var data = '<ul>';
        //                         $.each(response, function(index, user) {
        //                             data += '<li>Name: ' + user.name + ', Email: ' + user.email + '</li>';
        //                         });
        //                         data += '</ul>';


        //                         $('#hasil').html(data);
        //                         console.table(response)
        //                     },
        //             error: function (xhr, status, error) {
        //                 console.error(error);
        //             }
        //         });
        //     });

        // pakai loading data
        $('#tampilkan').click(function(e) {
            e.preventDefault();

            // Menampilkan indikator loading sebelum permintaan AJAX dimulai
            $('#hasil').html('<div>Loading....</div>');

            $.ajax({
                type: "GET",
                url: "/ajax/data/cek",
                dataType: "json",
                success: function(response) {
                    // Mengatur waktu tunda selama 2 detik sebelum menampilkan hasil
                    setTimeout(function() {
                        var data = '<ul>';
                        $.each(response, function(index, user) {
                            data += '<li>Name: ' + user.name + ', Email: ' +
                                user.email + '</li>';
                        });
                        data += '</ul>';

                        // Menampilkan data setelah waktu tunda
                        $('#hasil').html(data);
                        $('#cekmodal').modal('show');
                        alert('sukses di tampilkan');
                        console.table(response);
                    }, 2000); // Waktu tunda selama 2 detik (2000 milidetik)
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });


        //keyup penjumlahan
        $('#angka').keyup(function(e) {
            var counter = $(this).val();
            var hasil = $('#jumlah');
            var total = $('#total');

            // var kali = counter * 2;
            // var str = '';
            // var formattedResult = new Intl.NumberFormat('en-US', {
            //     style: 'decimal',
            //     minimumFractionDigits: 2
            // }).format(kali);


            // hasil.val(formattedResult);
            //  total.val(formattedResult);
            if (isNaN(counter)) {
        hasil.val('harus angka'); // Jika nilai yang dimasukkan adalah string, tampilkan 'chukas' di #hasil
        total.val('harus angka'); // Kosongkan #total jika nilai yang dimasukkan adalah string
    } else {
        var kali = counter * 2;
        var formattedResult = new Intl.NumberFormat('en-US', {
            style: 'decimal',
            minimumFractionDigits: 2
        }).format(kali);

        hasil.val(formattedResult); // Jika nilai yang dimasukkan adalah angka, tampilkan hasil perhitungan di #hasil
        total.val(formattedResult); // Tampilkan hasil perhitungan di #total jika nilai yang dimasukkan adalah angka
    }
        });






    });
</script>

</html>
