@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('alert'))
                <div class="alert alert-success">
                    {{ session()->get('alert') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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

                    <form method="POST" action="{{ route('phone.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Posts</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Your Phone Numbers</th>
                            <th scope="col">What You Can Do?</th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($phonelist as $phonenum)
                          <tr class="table-secondary">
                          <th scope="row">{{$phonenum->phone}}</th>
                            <td>
                            @can('update', $phonenum)
                                <a href="{{ route('phone.edit', $phonenum->id) }}" class="btn btn-primary btn-md">edit</a>
                            @endcan
                            @cannot('update', $phonenum)
                                <a class="btn btn-primary btn-md">edit</a>
                            @endcannot
                            @can('delete', $phonenum)
                            <form style="display: inline" method="POST" action="{{ route('phone.destroy', $phonenum->id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-md">delete</a>
                            </form>
                            @endcan
                            @cannot('delete', $phonenum)
                            <form style="display: inline" method="POST" action="{{ route('phone.destroy', $phonenum->id) }}">
                                @method('delete')
                                @csrf
                                <button disabled type="submit" class="btn btn-danger btn-md">delete</a>
                            </form>
                            @endcannot
                            </td>
                          </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script> --}}
@endsection
