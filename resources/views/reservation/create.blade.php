@extends('layoutfe')

@section('header')
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <link href="/css/jquery-ui.structure.css" rel="stylesheet">
    <link href="/css/jquery-ui.theme.css" rel="stylesheet">
    <link href="/css/bigvideo.css" rel="stylesheet">

@stop

@section('content')
    <div id="orderbutton">
        <span class="btn btn-default btn-order" onclick="show_cortege()">Заказать</span>
    </div>

<div id="cont">

                        @include('errors.list')
                        {!! Form::open(['class'=>'form-horizontal','url'=>'reservation','id'=>'reservationForm']) !!}
                        @include('reservation._form',['submitButtonText' => 'Заказать кортеж'])
                        {!! Form::close() !!}

</div>
<div id="successMessage"></div>

@stop

@section('footer')
    <script src='/js/jquery-ui.js'></script>
    <script src='/js/datepicker-ru.js'></script>
    <script src='/js/video.js'></script>
    <script src='/js/bigvideo.js'></script>

    <script>
        $(document).ready(function()
        {
            var ww = $(window).width();
            var hp = (ww - $('#cortegeSelect').width())/2;
            var obp = ww - hp - $('#orderbutton').width();
            $('#orderbutton').css('left',obp+'px');
            $('#cortegeSelect').css('left',hp+'px');
            var dsw = $('#dateSelect').width();
            $('#dateSelect').css('left','-'+dsw+'px');
            $('#dateSelect').show();
            var cip = ww+20;
            $('#customerInfo').css('left', cip+'px');
            $('#customerInfo').show();

//            var cip = $('#dateSelect').width()+hp;
//            $('#customerInfo').css('left', cip+'px');
//            $('#dateSelect').css('left',hp+'px');
//            var cip = $('#dateSelect').width()+hp;
//            $('#customerInfo').css('left', cip+'px');
        });
    </script>

    <script>
        $(function() {
            var BV = new $.BigVideo({useFlashForFirefox:false});
            BV.init();
            BV.show([
                { type: "video/mp4",  src: "/vids/289608268.mp4" },
                { type: "video/webm", src: "/vids/289608268.webm" },
                { type: "video/ogg",  src: "/vids/289608268.ogv" }
            ]);
        });

    </script>

    <script>
        function goBack() {
            window.history.back()
        }
        function show_cortege() {
            var cp = $('#cortegeSelect').offset();
            if (cp.top < 60) {
                $('#cortegeSelect').animate({top: '+=230px'});
            }
        }
        $("input[name='cortege']").change(function(){
            var dso = ($(window).width() - $('#cortegeSelect').width())/2 + $('#dateSelect').width();
            var cdso = $('#dateSelect').offset();
            if (cdso.left < 0) {
                $('#dateSelect').animate({left: '+=' + dso + 'px'});
            }
        });

        function setDate(value) {
//$('#datepicker').hide();
            $("#dateinput").val(value);
            var cci = $('#customerInfo').offset();
            if (cci.left > $(window).width()) {
                $('#customerInfo').animate({left : '-=860px'});
            }

        }
    </script>

    <script>

var approved = ["2015-03-14","2015-03-17","2015-04-26"]
var booked = ["2015-03-15","2015-03-16","2015-03-21"]




$('#datepicker').datepicker({
    minDate: 0,
    beforeShowDay: function (date) {
        var $return = true;
        var $returnclass = "available";
        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
        if (approved.indexOf(string) >= 0) {
            $return = false;
            $returnclass = "unavailable";
        }
        ;
        if (booked.indexOf(string) >= 0) {
            $return = true;
            $returnclass = "booked";
        }
        ;
        return [$return, $returnclass];
    },
    onSelect: function (selected, evnt) {
        setDate(selected);
    }

});
</script>
@stop
