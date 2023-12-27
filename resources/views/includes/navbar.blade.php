<nav class="navbar navbar-expand-lg navbar-light sticky-top p-2 p-md-3">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            {{-- <p>Waktu saat ini: {{ \Carbon\Carbon::now()->format('l, j F Y H:i:s') }}</p> --}}

            <img src="{{url('main-assets/images/smk.png') }}" width="70px" height="60px"
                class="d-inline-block align-top" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07"
            aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item me-2 ">
                    <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page"
                        href="{{url('/')}}">Beranda</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link {{ (request()->is('tentang-kami')) ? 'active' : '' }}"
                        href="{{url('tentang-kami')}}">Tentang</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link {{ (request()->is('faq')) ? 'active' : '' }}"
                        href="{{url('faq')}}">FAQ</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link {{ (request()->is('kontak')) ? 'active' : '' }}"
                        href="{{url('kontak')}}">Kontak</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link {{ (request()->is('kontak')) ? 'active' : '' }}"
                        href="{{url('kontak')}}">visi/misi</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link {{ (request()->is('kontak')) ? 'active' : '' }}"
                        href="{{url('kontak')}}">Layanan</a>
                </li>
            </ul>

            <a href="{{ url('/auth')}}" class="btn btn-primary px-4 py-2">Masuk</a>
        </div>

    </div>

</nav>
<style>
    .fixed-bottom {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #e9f1f8;
        padding: 10px;
        text-align: center;
    }
</style>

<div class="fixed-bottom">
    <p id="current-time"></p>
</div>

<script>
    function updateTime() {
        var currentTime = new Date();
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
        var formattedTime = currentTime.toLocaleDateString('id-ID', options);
        document.getElementById("current-time").textContent = "Waktu saat ini: " + formattedTime;
    }

    // Update time every second
    setInterval(updateTime, 1000);
</script>>
<style>
    .navbar-nav .nav-item .nav-link:hover {
        background-color: rgb(82, 131, 196);
        border-radius: 40px;
    }
    .navbar-nav .nav-item .nav-link:not(:hover) {
        border-radius: 50px;
    }
</style>
