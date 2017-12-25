@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Event Places<small>(Click on Marker on Book a place)</small></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="googlemap"></div>

                    <div class="row book-button" ng-if="route == '' || route == 'current-events'">
                        <div class="col-xs-12 text-center">
                            <a class="btn btn-primary" 
                                    href="/event/@{{ currentEvent.id }}" 
                                    ng-disabled="currentEvent==null">
                                <span ng-if="route == ''">Book Your Place</span>
                                <span ng-if="route == 'current-events'">Visit Event</span>
                            </a>        
                        </div>
                    </div>

                    <h2 ng-if="currentEvent != null">Event Detail</h2>
                    <table class="table table-striped table-hover">
                        <tr ng-repeat="event in events" ng-if="currentEvent.name == event.name">
                            <td>
                                <strong>Event:</strong> @{{ event.name }}
                            </td>
                            <td>
                                <strong>Location:</strong> @{{ event.address }}
                            </td>
                            <td>
                                <strong>Event Dates:</strong> @{{ event.start_date }} - @{{ event.end_date }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection