@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('alert'))
                <div class="alert alert-success">
                    {{ session()->get('alert') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('phone.update',$returnData->id)}}">
                        @method('put')
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">New Phone Number</label>

                            <div class="col-md-6">
                            <input id="phone" type="text" class="form-control" name="phone" value="{{$returnData->phone}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Update
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
