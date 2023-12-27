@include('component.app')



<form action="{{route('photo.store')}}" method="post">
    @csrf
<label for="nama">Nama</label>
<div class="input-group mb-3">
  <input type="text" class="form-control" name='nama' >
</div>
<label for="studio">studio</label>
<div class="input-group mb-3">
  <input type="text" class="form-control" name='alamat' >
</div>
<label for="basic-url">nomor</label>
<div class="input-group mb-3">
  <input type="text" class="form-control" name='jenis' >
</div>
<label for="basic-url">nomor</label>
<div class="input-group mb-3">
  <input type="text" class="form-control" name='kode_id' >
</div>
<button type="submit" class="btn btn-primary" >submit</button>

</form>



<div class="container">
    <div class="card">
        <table class="table table-striped">
            <thead>
              <tr>

                <th scope="col">NO</th>
                <th scope="col">Nama</th>
                <th scope="col">studio kelas</th>
                <th scope="col">nomor</th>
              </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;?>
                @foreach ($photos as $user)
                <?php
                $no++;
                ?>
              <tr>

                <th scope="row">{{$no}}</th>
                <td>{{ $user->nama}}</td>
                <td>{{ $user->studio_kelas }}</td>
                <td>{{ $user->nomor }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>



        </table>
    </div>
</div>

</div>
</div>
