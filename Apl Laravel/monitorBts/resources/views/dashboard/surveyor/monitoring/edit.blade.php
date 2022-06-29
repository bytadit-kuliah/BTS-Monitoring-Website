@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Monitoring {{ $monitoring->nama }}</h1>
</div>

<div class="col-lg-12">
    <form action="/dashboard/monitorings/{{ $monitoring->id }}" method="post" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Monitoring</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $monitoring->nama) }}">
          @error('nama')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>

        <div class="row md-3 mb-3">
            <div class="col-lg-6">
                <label for="btslist_id" class="form-label">Pilih BTS</label>
                <select class="form-select" name="btslist_id" style="">
                    @foreach ($btslists as $btslist)
                        @if(old('btslist_id', $monitoring->btslist_id) == $btslist->id)
                            <option value="{{ $btslist->id }}" selected>{{ $btslist->nama }}</option>
                        @else
                            <option value="{{ $btslist->id }}">{{ $btslist->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6">
                <label for="waktu_monitoring" class="form-label">Waktu Monitoring</label>
                <input type="date" class="form-control @error('waktu_monitoring') is-invalid @enderror" id="waktu_monitoring" name="waktu_monitoring" required autofocus value="{{ old('waktu_monitoring', $monitoring->waktu_monitoring) }}">
                @error('waktu_monitoring')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan Monitoring</label>
            @error('catatan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="catatan" type="hidden" name="catatan" value="{{ old('catatan', $monitoring->catatan) }}">
            <trix-editor input="catatan"></trix-editor>
        </div>

        <button type="submit" class="btn btn-success add-new" style="background: #52784F; color: #fff">Update Data</button>
      </form>
</div>

<script>

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    });

</script>

@endsection
