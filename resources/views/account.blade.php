@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Account</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-bordered" width="100%">
                        <tr style="text-align: center;">
                            <th>Nomor</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        <?php $no=1; ?>
                        @foreach($users as $a)

                        <tr>
                            <td style="text-align: center">{{ $no }}</td>
                            <td>{{ $a['name'] }}</td>
                            <td>{{ $a['email'] }}</td>
                            <td><a href="delete_akun/{{ $a['id'] }}"><button class="btn btn-danger">Delete</button></a></td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
