@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                Hi, {{$user->name}}.

                <br/><br/>

                What do you want to do?

                <br/><br/>

                    @if(is_null($profile))
                        {!!Form::open(array('url'=>'add','method'=>'post'))!!}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button>Add Info</button>
                        {!!Form::close()!!}

                        {!!Form::open(array('url'=>'edit','method'=>'post'))!!}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button>Edit Info</button>
                        {!!Form::close()!!}

                    @else

                        {!!Form::open(array('url'=>'edit','method'=>'post'))!!}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button>Edit Info</button>
                        {!!Form::close()!!}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
