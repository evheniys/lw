<div class="form-group">
    {!! Form::label('title', 'Название:',['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('title',null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('logo', 'Логотип:',['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
            <div>
    <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать файл</span><span class="fileinput-exists">Изменить</span>
        {!! Form::file('logo',null, ['class' => 'form-control']) !!}
     </span>
                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Удалить</a>
            </div>
        </div>
</div>
    </div>
<div class="form-group">
    {!! Form::label('url', 'Адрес сайта:',['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('url',null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('categories_list', 'Категории:',['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::select('categories_list[]',$categories,null, ['class' => 'form-control','multiple']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-8 col-md-offset-2">
        {!! Form::submit($submitButtonText,['class' => 'btn btn-primary']) !!}
        {!! link_to(URL::previous(), 'Отмена', ['class' => 'btn btn-default']) !!}
    </div>
</div>
