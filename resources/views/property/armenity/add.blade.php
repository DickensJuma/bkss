@extends('layouts.front.design')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Amenities</h3>
            <p>You're almost done! We just need a few more details about the extra bed options you provide, plus any amenities or specific features and services available.</p>
        </div>
        <div class="card-body">
            <form action="">
                @csrf
                <div class="divider">
                    <h5>Extra Bed Options</h5>
                    <p>These are the options for beds that can be added upon request.</p>
                </div>
                <div class="form-group">
                    <label for="extra_bed" class="form-lable">Can you provide extra beds?</label>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">Default radio</label>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection