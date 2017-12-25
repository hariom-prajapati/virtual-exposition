@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Stand</div>
                <div class="panel-body">
            
                    <div class="form-group">
                        <img class="img-fluid" style="width:200px;height:200px;" src="/storage/images/{{ $stand->booking_company->logo }}">
                    </div>

                    <div class="form-group">
                        <h1 for="name">{{ $stand->booking_company->name }}</h1>
                    </div>

                    <div class="form-group">
                        <a class="btn-sm btn-primary" href="/download?file={{$stand->booking_company->marketing_doc}}">Download Marketing Document</a>
                    </div>

                    <div class="form-group">
                        <label for="contact_person">Contact Person Name</label>
                        <input type="text" class="form-control" value="{{ $stand->booking_company->contact_person }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <a class="form-control" href="mailto:{{ $stand->booking_company->email }}">{{ $stand->booking_company->email }}</a>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <a class="form-control" href="tel:{{ $stand->booking_company->phone }}">{{ $stand->booking_company->phone }}</a>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" onclick="window.history.back()()">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
