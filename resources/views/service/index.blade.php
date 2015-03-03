@extends('layout')

@section('content')
    <div class="panel panel-default">
        <table class="table table-bordered table-striped" id="sortable">
            <thead>
            <tr>
                <th class="col-md-6">
                    Сервис
                </th>
                <th class="col-md-4 ">
                    Действие
                </th>
            </tr>
            </thead>
            <tbody>
            @if (count($services)>0)
            @foreach($services as $service)
                <tr class="item">
                    <td>
                        {!! $service->title !!}
                    </td>
                    <td>
                        <a class="btn btn-primary pull-left" style="margin-right:1%" href="{{ action('ServiceController@edit', $service->id) }}">Редактировать</a>
                        {!! Form::open(['method' => 'Delete', 'action' => ['ServiceController@destroy', $service->id]])!!}
                        {!! Form::submit('Удалить',['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>

    </div>
    <div class="row">
        <a class="btn btn-success" href="{{ action('ServiceController@create') }}">Создать</a>
    </div>
@stop