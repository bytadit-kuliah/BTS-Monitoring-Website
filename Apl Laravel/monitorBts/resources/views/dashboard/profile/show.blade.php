@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-12 justify-content-center text-center">
            <div class="d-flex flex-column">
                <h1 class="">Data {{ $user->firstName.' '.$user->lastName }}</h1>
                <span class="fs-5 fw-lighter mb-3"> ({{$user->is_admin?'Administrator':'Surveyor'}})</sp>

            </div>

           <a href="/dashboard/users"  class="btn btn-success add-new" style="background: #52784F; color: #fff"><span data-feather='arrow-left'></span>Back</a>
           @can('admin')
           <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>Delete</button>
           </form>
           @endcan
           <br>

           @if($user->photo)

                <div alt="{{ $user->firstName }}" class="w-100 rounded-5 img-fluid my-5 text-center"
                    style="width:400px;height:400px;background-size: contain;background-repeat:no-repeat;
                    background-position: center;background-image:url('{{ asset('storage/' . $user->photo) }}')"></div>
                </div>
           @else
                <img src="https://source.unsplash.com/400x400?person" alt="{{ $user->firstName }}" class="mw-75 rounded-5 img-fluid mb-5 mt-3">
           @endif



           <table class="table ">
            <thead class="table-success ">
                <th style='border-top-left-radius:1rem'>
                    Keterangan
                </th>
                <th style='border-top-right-radius:1rem;'>
                    Nilai
                </th>
            </thead>
            <tbody style='text-align:center'>
                <tr>
                    <td class='table-light w-25'>Nama</td>
                    <td> {{ $user->firstName . ' ' . $user->lastName }} </td>
                </tr>
                <tr>
                    <td class='table-light'>E-mail</td>
                    <td> {{ $user->email }} </td>
                </tr>
                <tr>
                    <td class='table-light'>Nomor Telepon</td>
                    <td> {{ $user->noTelp }}</td>
                </tr>
                <tr>
                    <td class='table-light'>Alamat</td>
                    <td> {{ $user->alamat }} </td>
                </tr>
                @if(!$user->is_admin)
                    <tr>
                        <td class='table-light'>Jumlah Survey</td>
                        <td>  {{ $user->mysurvey->count() }} </td>
                    </tr>
                @endif
            </tbody>
        </table>

        </div>
    </div>
</div>
@endsection
