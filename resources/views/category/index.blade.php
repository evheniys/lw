@extends('layout')

@section('content')
    <div class="panel panel-default">
        <table class="table table-bordered table-striped" id="sortable">
            <thead>
            <tr>
                <th class="col-md-6">
                    Категория
                </th>
                <th class="col-md-4 ">
                    Действие
                </th>
            </tr>
            </thead>
            <tbody>
    @foreach($categories as $category)
                    <tr class="item">
                        <td>
                            {!! $category->title !!}
                        </td>
                        <td>
                            <a class="btn btn-primary pull-left" style="margin-right:1%" href="{{ action('CategoryController@edit', $category->id) }}">Редактировать</a>


                            {!! Form::open(['method' => 'Delete', 'action' => ['CategoryController@destroy', $category->id]])!!}
                            {!! Form::submit('Удалить',['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
        @endforeach

            </tbody>
        </table>

    </div>
    <div class="row">
        <a class="btn btn-success" href="{{ action('CategoryController@create') }}">Создать</a>
    </div>
@stop