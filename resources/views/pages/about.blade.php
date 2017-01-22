@extends('pages.info')

@section('info')

    <div>
        <h1>The basics: I am 26 years old. <br>I have great husband. <br> I leave in Toronto, Canada.</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div style="height: 640px;">
                <img src="{{ asset('images/olena.jpg') }}" alt="Here should be my photo" style="height: 100%;">
            </div>
        </div>
        <div class="col-md-6">
            <p>I am extremely passionate about what I do.</p>
            <p>With each wedding I photograph, I want to capture the genuine story and vibe of the day.</p>
            <p>I want every couple I shoot for to be able to look back at their photographs and feel their wedding day again, not just see it.</p>
            <p>Hopefully, all of this shows throughout my work.</p>
            <p>If you feel like we would be a good fit, please don&#8217;t hesitate to <a href="{{ asset('contact') }}">get in touch</a>!</p>
        </div>
    </div>

@endsection