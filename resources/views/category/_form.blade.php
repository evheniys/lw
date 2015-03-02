
<div class="form-group">
    {!! Form::label('title', 'Название:',['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('title',null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-8 col-md-offset-2">
        {!! Form::submit($submitButtonText,['class' => 'btn btn-primary']) !!}
        {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-default']) !!}
    </div>
</div>
