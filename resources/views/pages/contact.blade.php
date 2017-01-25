@extends('pages.info')

@section('info')

    <div>
        <h1>Go ahead - you know you wanna say hello!</h1>
    </div>
    <div>
        slider
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="#">
                <div class="row">
                    <div class="col-md-12">
                        <h2>NAME<span>*</span></h2>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="firstname"><br>
                        <label for="firstname">First</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="lastname"><br>
                        <label for="lastname">Last</label>
                    </div>
                    <div class="col-md-12">
                        <h2>Email<span>*</span></h2>
                    </div>
                    <div class="col-md-12">
                        <input type="email" id="email"><br>
                        <label for="email">Enter Email</label>
                    </div>
                    <div class="col-md-12">
                        <input type="email" id="confirm_email"><br>
                        <label for="confirm_email">Confirm Email</label>
                    </div>
                    <div class="col-md-12">
                        <h2>Phone<span>*</span></h2>
                    </div>
                    <div class="col-md-12">
                        <input type="tel" id="phone">
                    </div>
                    <div class="col-md-12">
                        <label for="wedding-photos">
                            <input type="radio" id="wedding-photos" value="wedding-photos"
                                   name="request-name"> Wedding photos
                        </label><br>
                        <label for="couples-engagements">
                            <input type="radio" id="couples-engagements" value="couples-engagements"
                                   name="request-name"> Couples/Engagements
                        </label><br>
                        <label for="lifestyle-commercial">
                            <input type="radio" id="lifestyle-commercial" value="lifestyle-commercial"
                                   name="request-name"> Lifestyle/Commercial
                        </label><br>
                        <label for="family-photos">
                            <input type="radio" id="family-photos" value="family-photos"
                                   name="request-name"> Family photos
                        </label>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-submit">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Cyber high five</h2>
            <p>Thanks for taking the time to look through my work! If you have any questions, want to chat about your wedding day or talk about setting up a session, please let me know.</p>
            <p>For pricing and wedding package details, just fill out the form to the left!</p>
            <p>If you don’t hear a reply from me within 72 hours, please don’t hesitate to get back in touch or email me directly at soloviovaphoto@gmail.com!</p>
        </div>
    </div>

@endsection