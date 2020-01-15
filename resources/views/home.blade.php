@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Input</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('insert_data') }}"><button class="btn btn-primary">Add Data</button></a>
                   

                    <table class="table table-bordered" width="100%">
                        <tr style="text-align: center;">
                            <th>Nomor</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Telepon</th>
                            <th>Gender</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                            $files = File::allFiles(storage_path('app/data/'));
                            $no=1;
                            foreach ($files as $key ) {
                            $file = File::get(storage_path('app/data/'.basename($key)));
                            $arr = explode(",", $file)
                        ?>
                        <tr>
                            <td style="text-align: center">{{ $no }}</td>
                            <td>{{ $arr[0] }}</td>
                            <td> {{ $arr[1] }}</td>
                            <td>{{ $arr[2] }}</td>
                            <td>{{ $arr[3] }}</td>
                            <td>{{ $arr[4] }}</td>
                            <td style="text-align: center;"><img  src="image/{{ $arr[5] }}" height="70" width="70"></td>
                            <td><a href="edit_data/{{ basename($key) }}"><button class="btn btn-success">Edit</button></a> <a href="/delete_data/{{ basename($key) }}/{{ $arr[5] }}"><button class="btn btn-danger">Delete</button></a></td>
                        </tr>
                        <?php $no++; } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
