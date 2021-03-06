@extends('layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить категорию</div>
                    <div class="panel-body">
                        @include('errors.list')
                        {!! Form::open(['class'=>'form-horizontal','url'=>'category']) !!}
                                                @include('category._form',['submitButtonText' => 'Добавить категорию'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

