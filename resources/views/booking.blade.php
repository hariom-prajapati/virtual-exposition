@extends('layouts.app')

@section('content')
<div class="container booking-page">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Book Your Stand</div>
                <div class="panel-body">
                @if($stand->reserved || session('error'))
                    <div class="alert alert-danger">This stand is already reserved.</div>
                @else
                    <form method="post" action="/booking" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <input type="hidden" id="stand" name="stand" value="{{ $stand->id }}">

                        <div class="form-group">
                            <label for="name">Your Company Name <red>*</red></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Company Name" required>
                        </div>

                        <div class="form-group">
                            <label for="logo">Company Logo <red>*</red></label>
                            <input type="file" class="form-control" id="logo" name="logo" placeholder="Upload Company Logo" accept="image/*" required>
                        </div>

                        <div class="form-group">
                            <label for="admin">Contact Person Name <red>*</red></label>
                            <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter Contact Person Name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email <red>*</red></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Company Email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone <red>*</red></label>
                            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter Company Phone" required>
                        </div>

                        <div class="form-group">
                            <label for="marketing_doc">Marketing Document <small>(PDF Only)</small> <red>*</red></label>
                            <input type="file" class="form-control" id="marketing_doc" name="marketing_doc" placeholder="Upload Marketing Document" accept="application/pdf" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Confirm Booking</button>
                        </div>
                    </form>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
