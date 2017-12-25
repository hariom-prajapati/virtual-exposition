@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Event Stands <small>(Green stands are available to book)</small></div>

                <div class="panel-body">
                    @if ($msg = session('success'))
                        <div class="alert alert-success">
                            {{ $msg }}
                        </div>
                    @endif

                    
                    <!-- Stands -->
                    <svg id="svg" data-name="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 430 400">
                        <defs>
                            <style>
                                .stand {
                                    fill: green;
                                    stroke-width: 0.9px;
                                    stroke: #3d4752;
                                }
                            </style>
                        </defs>
                        
                        <g>
                            <rect class="stand stand1" ry="2.25" rx="2.25" height="40" width="80" y="0" x="0" />

                            <text class="stand1" x="30" y="15" font-family="Verdana" font-size="10" fill="white">S1</text>

                            <text class="stand1" x="20" y="25" font-family="Verdana" font-size="8" fill="white">$@{{ stands[0].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand2" ry="2.25" rx="2.25" height="80" width="40" y="40" x="0" />

                            <text class="stand2" x="15" y="75" font-family="Verdana" font-size="10" fill="white">S2</text>
                            <text class="stand2" x="5" y="85" font-family="Verdana" font-size="8" fill="white">$@{{ stands[1].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand3" ry="2.25" rx="2.25" height="80" width="40" y="120" x="0" />
                            
                            <text class="stand3" x="15" y="157" font-family="Verdana" font-size="10" fill="white">S3</text>
                            <text class="stand3" x="5" y="167" font-family="Verdana" font-size="8" fill="white">$@{{ stands[2].price }}</text>
                        </g>
                            
                        <g>
                            <rect class="stand stand4" ry="2.25" rx="2.25" height="80" width="40" y="200" x="0"/>

                            <text class="stand4" x="15" y="239" font-family="Verdana" font-size="10" fill="white">S4</text>
                            <text class="stand4" x="5" y="249" font-family="Verdana" font-size="8" fill="white">$@{{ stands[3].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand5" ry="2.25" rx="2.25" height="80" width="40" y="280" x="0" class="stand"/>

                            <text class="stand5" x="15" y="315" font-family="Verdana" font-size="10" fill="white">S5</text>
                            <text class="stand5" x="5" y="325" font-family="Verdana" font-size="8" fill="white">$@{{ stands[4].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand6" ry="2.25" rx="2.25" height="40" width="87" y="360" x="0"/>

                            <text class="stand6" x="30" y="375" font-family="Verdana" font-size="10" fill="white">S6</text>
                            <text class="stand6" x="20" y="385" font-family="Verdana" font-size="8" fill="white">$@{{ stands[5].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand7" ry="2.25" rx="2.25" height="40" width="80" y="360" x="88"/>

                            <text class="stand7" x="115" y="375" font-family="Verdana" font-size="10" fill="white">S7</text>
                            <text class="stand7" x="105" y="385" font-family="Verdana" font-size="8" fill="white">$@{{ stands[6].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand8" ry="2.25" rx="2.25" height="40" width="80" y="360" x="169.2"/>

                            <text class="stand8" x="195" y="375" font-family="Verdana" font-size="10" fill="white">S8</text>
                            <text class="stand8" x="185" y="385" font-family="Verdana" font-size="8" fill="white">$@{{ stands[7].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand9" ry="2.25" rx="2.25" height="40" width="80" y="360" x="250.3"/>

                            <text class="stand9" x="275" y="375" font-family="Verdana" font-size="10" fill="white">S9</text>
                            <text class="stand9" x="265" y="385" font-family="Verdana" font-size="8" fill="white">$@{{ stands[8].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand10" ry="2.25" rx="2.25" height="40" width="98" y="360" x="332"/>

                            <text class="stand10" x="365" y="375" font-family="Verdana" font-size="10" fill="white">S10</text>
                            <text class="stand10" x="358" y="385" font-family="Verdana" font-size="8" fill="white">$@{{ stands[9].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand11" ry="2.25" rx="2.25" height="80" width="40" y="280" x="390"/>

                            <text class="stand11" x="400" y="315" font-family="Verdana" font-size="10" fill="white">S11</text>
                            <text class="stand11" x="395" y="325" font-family="Verdana" font-size="8" fill="white">$@{{ stands[10].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand12" ry="2.25" rx="2.25" height="80" width="40" y="200" x="390"/>

                            <text class="stand12" x="400" y="239" font-family="Verdana" font-size="10" fill="white">S12</text>
                            <text class="stand12" x="395" y="249" font-family="Verdana" font-size="8" fill="white">$@{{ stands[11].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand13" ry="2.25" rx="2.25" height="80" width="40" y="120" x="390"/>

                            <text class="stand13" x="400" y="157" font-family="Verdana" font-size="10" fill="white">S13</text>
                            <text class="stand13" x="395" y="167" font-family="Verdana" font-size="8" fill="white">$@{{ stands[12].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand14" ry="2.25" rx="2.25" height="80" width="40" y="40" x="390"/>

                            <text class="stand14" x="400" y="75" font-family="Verdana" font-size="10" fill="white">S14</text>
                            <text class="stand14" x="395" y="85" font-family="Verdana" font-size="8" fill="white">$@{{ stands[13].price }}</text>
                        </g>

                        <g>
                            <rect class="stand stand15" ry="2.25" rx="2.25" height="40" width="80" y="0" x="350"/>
                            <text class="stand15" x="375" y="15" font-family="Verdana" font-size="10" fill="white">S15</text>
                            <text class="stand15" x="370" y="25" font-family="Verdana" font-size="8" fill="white">$@{{ stands[14].price }}</text>
                        </g>
                    </svg>

                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                        <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Stand Detail</h4>
                                </div>
                                
                                <div class="modal-body">

                                    <div class="row" ng-repeat="stand in stands" ng-if="currentStand.name == stand.name">
                                        <div class="col-md-2 col-sm-2 stand-name">
                                            <img class="img-thumbnail" src="/storage/images/@{{stand.picture}}" alt="@{{stand.name}}" width="100">
                                            <strong>@{{ stand.name }}</strong>
                                        </div>
                                        
                                        <div class="col-sm-2 text-center">
                                            <span ng-if="!stand.reserved">$@{{ stand.price }}</span>
                                        
                                            <span ng-if="!stand.reserved">
                                                <a class="btn btn-primary" href="/booking/@{{stand.id}}">Reserve</a>
                                            </span>
                                        
                                        </div>
                                        
                                        <div class="col-sm-4">
                                            <div ng-if="stand.reserved">
                                                <img class="img-thumbnail" src="/storage/images/@{{stand.booking_company.logo}}" alt="@{{stand.booking_company.name}}">
                                                
                                                <strong>Company Name: @{{ stand.booking_company.name }}</strong>
                                                <p>
                                                    <ul class="list-unstyled">
                                                        <li><a class="btn-sm btn-primary dropdown-toggle" href="/download?file=@{{stand.booking_company.marketing_doc}}">Download Marketing Docs</a></li>
                                                        <li>
                                                            <strong>Contact Details:</strong>
                                                            <ul>
                                                                <li><strong>Admin:</strong> @{{ stand.booking_company.admin_name }}</li>
                                                                <li><strong>Email:</strong> 
                                                                    <a href="mailto:@{{ stand.booking_company.email }}"> @{{ stand.booking_company.email }} </a>
                                                                </li>
                                                                <li><strong>Phone:</strong> 
                                                                    <a href="tel:@{{ stand.booking_company.phone }}">@{{ stand.booking_company.phone }} </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </p>                                        
                                            </div>

                                            <span ng-if="stand.reserved">
                                                <a class="btn btn-primary" href="/stand/@{{stand.id}}">Visit</a>
                                            </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection