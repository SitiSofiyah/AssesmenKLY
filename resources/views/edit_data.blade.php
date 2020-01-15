@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Data') }}</div>

                <div class="card-body">
                    <form method="POST" action="proses/{{ $file }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" name="name" value="{{ $data[0] }}" class="form-control" type="text" readonly>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" value="{{ $data[1] }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-2 col-form-label text-md-left">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="date" value="{{ $data[2] }}" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date">

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telp" class="col-md-2 col-form-label text-md-left">{{ __('No. Telpon') }}</label>

                            <div class="col-md-6">
                                <input id="telp" value="{{ $data[3] }}" type="text" class="form-control" name="telp" required autocomplete="telp">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-2 col-form-label text-md-left">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                               <select class="form-control" name="gender" required autocomplete="gender">
                                   <option value="{{ $data[4] }}" selected  hidden>{{ $data[4] }}</option>
                                   <option value="Male">Male</option>
                                   <option value="Female">Female</option>
                               </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="foto" class="col-md-2 col-form-label text-md-left">{{ __('Foto') }}</label>
                            <div class="col-md-6">
                               <img src="../image/{{ $data[5] }}" width="80"> <br>
                               <input type="file" value="{{ $data[5] }}" name="foto" class="form-control">
                               <input type="hidden" value="{{ $data[5] }}" name="pic" >
                            </div>
                        </div>                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
