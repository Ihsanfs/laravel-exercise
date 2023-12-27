@include('component.app')
<div class="container">
    <form action="{{route('photos.store')}}" method="post">
        @csrf
    <label for="nama">studio kelas</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" name='studio_kelas' >
    </div>
    <label for="studio">nomor</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" name='nomor' >
    </div>

    <button type="submit" class="btn btn-primary" >submit</button>

    </form>
