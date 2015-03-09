{!! Form::hidden('status', $statuses['id']) !!}
<div id="cortegeSelect">
    @if (count($corteges)>1)
        <div class="selectCortege">
            @foreach($corteges as $cortege)
                <label class="norb">
                    <input type="radio" name="cortege" value="{!! $cortege['id'] !!}">
                    <img src="{!! $cortege['cortegepic'] !!}" title="{!! $cortege['cortegename'] !!}">

                    <p>{!! $cortege['cortegename'] !!}</p>
                </label>
            @endforeach
        </div>
    @else
        {!! Form::hidden('cortege', $corteges['id']) !!}
    @endif
</div>

<div id="dateSelect">
    <div id="datepicker"></div>
    <input type="hidden" id="dateinput" name="bookingdate"/>
</div>

<div id="customerInfo">
    <div style="padding: 10px">
    <div class="form-group">
        {!! Form::label('customerName', 'Ваше имя:',['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('customerName',null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('customerPhone', 'Телефон:',['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-4">
            {!! Form::text('customerPhone',null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::label('customerEmail', 'e-mail:',['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-4">
            {!! Form::text('customerEmail',null, ['class' => 'form-control']) !!}
        </div>
    </div>


    <div class="form-group">
         <p><strong>Время аренды кортежа:</strong></p>
            {!! Form::label('reservation_time_from', 'От:',['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('reservation_time_from',null, ['class' => 'form-control timepicker']) !!}
            </div>
            {!! Form::label('reservation_time_till', 'До:',['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('reservation_time_till',null, ['class' => 'form-control timepicker']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('timetocall', 'Удобное для звонка время:',['class'=>'col-md-5 control-label']) !!}
            <div class="col-md-3">
                {!! Form::select('timetocall',$timetocalles,null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('comment', 'Коментарий:',['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::textarea('comment',null, ['size' => '60x3']) !!}
            </div>
        </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::submit($submitButtonText,['class' => 'btn btn-primary']) !!}
            {!! link_to(URL::previous(), 'Отмена', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
        </div>
</div>