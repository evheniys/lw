@extends('layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактировать категорию</div>
                    <div class="panel-body">
                        @include('errors.list')
                        {!! Form::model($category,['class'=>'form-horizontal','method' => 'PATCH', 'action'=>['CategoryController@update',$category->id]]) !!}
                        @include('category._form',['submitButtonText' => 'Изменить категорию'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

