@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить сервис</div>
                    <div class="panel-body">
                        @include('errors.list')
                        {!! Form::model($service,['class'=>'form-horizontal','method' => 'PATCH', 'action'=>['ServiceController@update',$service->id]]) !!}
                        @include('service._form',['submitButtonText' => 'Изменить сервис'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop