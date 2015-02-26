@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить категорию</div>
                    <div class="panel-body">
                        {!! Form::open() !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Название:',['class'=>'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('title',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-2">
                                {!! Form::submit('Добавить',['class' => 'btn btn-primary form-control']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

