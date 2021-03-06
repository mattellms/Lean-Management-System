@extends('layout/main-kaizenForm')



@section('title', 'Update Kaizen List')
@section('collapseClass', 'show')
@section('formClass', 'active')
@section('addKaizen', '')
@section('listKaizen', '')
@section('updateKaizen', '')
@section('approvalKaizen', 'active')
@section('dashboard', '')

@section('container')

        @if(Session::has('showModal'))
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @if(Session('alert'))
                    <div class="alert alert-danger">
                      <div>{{Session('alert')}}</div>
                    </div>
                  @endif
                  @if(Session('alert-success'))
                    <div class="alert alert-success">
                      <div>{{Session('alert-success')}}</div>
                    </div>
                  @endif
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-customyel" data-dismiss="modal">OK</button>
                </div>
              </div>
            </div>
          </div>
        @endif

        @if(Session::has('send'))
            
        @endif

<div class="container-fluid">
    <!-- <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action data-toggle=">
            <h5>Kaizen Title</h5>
            Type: ... Date: ...
        </a>
    </div> -->
    <!-- <form action="{{ url('/kaizen-form/test') }}" method="get">
        @csrf
        <button class="btn btn-primary">TEST</button>
    </form> -->
    <nav>
        <div class="nav nav-tabs nav-justified mb-3" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Waiting Approval</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Approved</a>
            <a class="nav-item nav-link" id="nav-cancel-tab" data-toggle="tab" href="#nav-cancel" role="tab" aria-controls="nav-cancel" aria-selected="false">Canceled</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
                @csrf
                @foreach($kaizen_list as $list)
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text font-weight-bold text-danger text-uppercase mb-1">{{ $list->Kaizen_title }}</div>
                                    </div>
                                </div>
                                <hr class="sidebar-divider my-0">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <div class="text font-weight-bold text-dark mb-1">Type</div>
                                    </div>
                                    <div class="col-auto mr-2">
                                        <div class="text font-weight-bold text-dark mb-1">{{ $list->Kaizen_type }}</div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <div class="text font-weight-bold text-dark mb-1">Day(s)</div>
                                    </div>
                                    <div class="col-auto mr-2">
                                        <div class="text font-weight-bold text-dark mb-1">
                                            @foreach($datelist as $date)
                                                @if($list->Kaizen_ID == $date->Kaizen_ID)
                                                    @php
                                                        $fdate = $date->Kaizen_DateFrom;
                                                        $tdate = $date->Kaizen_DateTo;

                                                        $datetime1 = new DateTime($fdate);
                                                        $datetime2 = new DateTime($tdate);
                                                        $interval = $datetime1->diff($datetime2);
                                                        $days = $interval->format('%a');
                                                    @endphp
                                                    {{$days+1}}
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <div class="text font-weight-bold text-dark mb-1">Status</div>
                                    </div>
                                    <div class="col-auto mr-2">
                                        <div class="text font-weight-bold text-dark mb-1">
                                        @if($list->Kaizen_status == 'Waiting')
                                            {{ $list->Kaizen_status }} <i class="fas fa-exclamation-circle text-warning"></i>
                                        @else
                                            {{ $list->Kaizen_status }} <i class="far fa-thumbs-up text-primary"></i>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <div class="text font-weight-bold text-dark mb-1">Room</div>
                                    </div>
                                    <div class="col-auto mr-2">
                                        <div class="text font-weight-bold text-dark mb-1">
                                            @if($list->Kaizen_room == "")
                                                -                                    
                                            @else
                                                {{$list->Kaizen_room}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="position-static">
                                
                                        <input type="text" name="kzid" value="{{ $list->Kaizen_ID }}" hidden>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kz{{ $list->Kaizen_ID }}">VIEW</button>
                                
                                </div> -->
                                
                            </div>
                            <div class="card-footer text-center">
                                <input type="text" name="kzid" value="{{ $list->Kaizen_ID }}" hidden>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kz{{ $list->Kaizen_ID }}">View</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="kz{{ $list->Kaizen_ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="text font-weight-bold text-light text-uppercase" id="exampleModalLongTitle">{{ $list->Kaizen_title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row p-2 rounded">
                                    <div class="col-3">
                                        Date
                                    </div>    
                                    <div class="col">
                                        @foreach($datelist as $date)
                                            @if($list->Kaizen_ID == $date->Kaizen_ID)
                                                {{ $date->Kaizen_DateFrom }} - {{ $date->Kaizen_DateTo }}
                                            @endif
                                    @endforeach
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Type
                                    </div>    
                                    <div class="col">
                                        {{ $list->Kaizen_type }}
                                    </div>
                                </div>
                                <div class="row  p-2 rounded">
                                    <div class="col-3">
                                        Status
                                    </div>    
                                    <div class="col">
                                        {{ $list->Kaizen_status }}
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Department
                                    </div>    
                                    <div class="col">
                                        {{ $list->Kaizen_dept }}
                                    </div>
                                </div>
                                <div class="row p-2  rounded">
                                    <div class="col-3">
                                        Member
                                    </div>
                                    <div class="col">
                                    @foreach($memberlist as $mem)
                                        @if($list->Kaizen_ID == $mem->Kaizen_ID)
                                            <li>{{ $mem->Fullname }} ({{ $mem->member_roles }})</li>
                                        @endif
                                    @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Scope
                                    </div>
                                    <div class="col">
                                    @foreach($scopelist as $scope)
                                            @if($list->Kaizen_ID == $scope->Kaizen_ID)
                                            
                                                <li>{{ $scope->scope }}</li>
                                            
                                            @endif
                                        @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2  rounded">
                                    <div class="col-3">
                                        Background
                                    </div>
                                    <div class="col">
                                    @foreach($backlist as $back)
                                        @if($list->Kaizen_ID == $back->Kaizen_ID)
                                            <li>{{ $back->background }}</li>
                                        @endif
                                    @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Baseline
                                    </div>
                                    <div class="col">
                                    @foreach($baselist as $base)
                                        @if($list->Kaizen_ID == $base->Kaizen_ID)
                                            <li>{{ $base->baseline }}</li>
                                        @endif
                                    @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2  rounded">
                                    <div class="col-3">
                                        Goals
                                    </div>
                                    <div class="col">
                                    @foreach($goalslist as $goal)
                                        @if($list->Kaizen_ID == $goal->Kaizen_ID)
                                            <li>{{ $goal->goals }}</li>
                                        @endif
                                    @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Deliverable
                                    </div>
                                    <div class="col">
                                        @if(count($delivlist) > 0)    
                                            @foreach($delivlist as $deliv)
                                                @if($list->Kaizen_ID == $deliv->Kaizen_ID)
                                                    <li>{{ $deliv->deliverable }}</li>
                                                @endif
                                            @endforeach
                                        @else
                                            <p>-</p>
                                        @endif
                                    </div> 
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalCancel" data-dismiss="modal">Cancel <i class="far fa-times-circle"></i></button>
                                <a href="/kaizen-form/update-kaizen/{{ $list->Kaizen_ID }}" class="btn btn-primary">Update <i class="fas fa-edit"></i></a>
                                <a href="/kaizen-form/approval-kaizen/{{ $list->Kaizen_ID }}" class="btn btn-success">Approve <i class="far fa-thumbs-up"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalCancel" tabindex="-1" role="dialog" aria-labelledby="modalCancelTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-light" id="exampleModalLongTitle">Cancel Kaizen {{$list->Kaizen_ID}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure to cancel this kaizen ?
                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <a href="/kaizen-form/cancel-kaizen/{{ $list->Kaizen_ID }}" class="btn btn-primary">Yes</a>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row">
                @csrf
                @foreach($approve_kaizen as $list)
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text font-weight-bold text-danger text-uppercase mb-1">{{ $list->Kaizen_title }}</div>
                                    </div>
                                </div>
                                <hr class="sidebar-divider my-0">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <div class="text font-weight-bold text-dark mb-1">Type</div>
                                    </div>
                                    <div class="col-auto mr-2">
                                        <div class="text font-weight-bold text-dark mb-1">{{ $list->Kaizen_type }}</div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <div class="text font-weight-bold text-dark mb-1">Day(s)</div>
                                    </div>
                                    <div class="col-auto mr-2">
                                        <div class="text font-weight-bold text-dark mb-1">
                                            @foreach($datelist as $date)
                                                @if($list->Kaizen_ID == $date->Kaizen_ID)
                                                    @php
                                                        $fdate = $date->Kaizen_DateFrom;
                                                        $tdate = $date->Kaizen_DateTo;

                                                        $datetime1 = new DateTime($fdate);
                                                        $datetime2 = new DateTime($tdate);
                                                        $interval = $datetime1->diff($datetime2);
                                                        $days = $interval->format('%a');
                                                    @endphp
                                                    {{$days+1}}
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <div class="text font-weight-bold text-dark mb-1">Status</div>
                                    </div>
                                    <div class="col-auto mr-2">
                                        <div class="text font-weight-bold text-dark mb-1">
                                        @if($list->Kaizen_status == 'Waiting')
                                            {{ $list->Kaizen_status }} Approval <i class="fas fa-exclamation-circle text-warning"></i>
                                        @else
                                            {{ $list->Kaizen_status }} <i class="far fa-thumbs-up text-primary"></i>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <div class="text font-weight-bold text-dark mb-1">Room</div>
                                    </div>
                                    <div class="col-auto mr-2">
                                        <div class="text font-weight-bold text-dark mb-1">
                                            @if($list->Kaizen_room == "")
                                                -                                    
                                            @else
                                                {{$list->Kaizen_room}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="position-static">
                                
                                        <input type="text" name="kzid" value="{{ $list->Kaizen_ID }}" hidden>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kz{{ $list->Kaizen_ID }}">VIEW</button>
                                
                                </div> -->
                                
                            </div>
                            <div class="card-footer text-center">
                                <input type="text" name="kzid" value="{{ $list->Kaizen_ID }}" hidden>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kz{{ $list->Kaizen_ID }}">View</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="kz{{ $list->Kaizen_ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="text font-weight-bold text-light text-uppercase" id="exampleModalLongTitle">{{ $list->Kaizen_title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row p-2 rounded">
                                    <div class="col-3">
                                        Date
                                    </div>    
                                    <div class="col">
                                        @foreach($datelist as $date)
                                            @if($list->Kaizen_ID == $date->Kaizen_ID)
                                                {{ $date->Kaizen_DateFrom }} - {{ $date->Kaizen_DateTo }}
                                            @endif
                                    @endforeach
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Type
                                    </div>    
                                    <div class="col">
                                        {{ $list->Kaizen_type }}
                                    </div>
                                </div>
                                <div class="row p-2 rounded">
                                    <div class="col-3">
                                        Status
                                    </div>    
                                    <div class="col">
                                        {{ $list->Kaizen_status }}
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Department
                                    </div>    
                                    <div class="col">
                                        {{ $list->Kaizen_dept }}
                                    </div>
                                </div>
                                <div class="row p-2 rounded">
                                    <div class="col-3">
                                        Member
                                    </div>
                                    <div class="col">
                                    @foreach($memberlist as $mem)
                                        @if($list->Kaizen_ID == $mem->Kaizen_ID)
                                            <li>{{ $mem->Fullname }} ({{ $mem->member_roles }})</li>
                                        @endif
                                    @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Scope
                                    </div>
                                    <div class="col">
                                    @foreach($scopelist as $scope)
                                            @if($list->Kaizen_ID == $scope->Kaizen_ID)
                                            
                                                <li>{{ $scope->scope }}</li>
                                            
                                            @endif
                                        @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2 rounded">
                                    <div class="col-3">
                                        Background
                                    </div>
                                    <div class="col">
                                    @foreach($backlist as $back)
                                        @if($list->Kaizen_ID == $back->Kaizen_ID)
                                            <li>{{ $back->background }}</li>
                                        @endif
                                    @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Baseline
                                    </div>
                                    <div class="col">
                                    @foreach($baselist as $base)
                                        @if($list->Kaizen_ID == $base->Kaizen_ID)
                                            <li>{{ $base->baseline }}</li>
                                        @endif
                                    @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2 rounded">
                                    <div class="col-3">
                                        Goals
                                    </div>
                                    <div class="col">
                                    @foreach($goalslist as $goal)
                                        @if($list->Kaizen_ID == $goal->Kaizen_ID)
                                            <li>{{ $goal->goals }}</li>
                                        @endif
                                    @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Deliverable
                                    </div>
                                    <div class="col">
                                        @if(count($delivlist) > 0)    
                                            @foreach($delivlist as $deliv)
                                                @if($list->Kaizen_ID == $deliv->Kaizen_ID)
                                                    <li>{{ $deliv->deliverable }}</li>
                                                @endif
                                            @endforeach
                                        @else
                                            <p>-</p>
                                        @endif
                                    </div> 
                                </div>
                                
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalCancel" data-dismiss="modal">Cancel <i class="far fa-times-circle"></i></button>
                                    <a href="/kaizen-form/update-kaizen/{{ $list->Kaizen_ID }}" class="btn btn-primary">Update <i class="fas fa-edit"></i></a>
                                    <a href="/kaizen-form/approval-kaizen/{{ $list->Kaizen_ID }}" class="btn btn-success">Re-Approve <i class="far fa-thumbs-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
        <div class="tab-pane fade" id="nav-cancel" role="tabpanel" aria-labelledby="nav-cancel-tab">
            <div class="row">
                @csrf
                @foreach($cancel_kaizen as $list)
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text font-weight-bold text-danger text-uppercase mb-1">{{ $list->Kaizen_title }}</div>
                                    </div>
                                </div>
                                <hr class="sidebar-divider my-0">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <div class="text font-weight-bold text-dark mb-1">Type</div>
                                    </div>
                                    <div class="col-auto mr-2">
                                        <div class="text font-weight-bold text-dark mb-1">{{ $list->Kaizen_type }}</div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <div class="text font-weight-bold text-dark mb-1">Day(s)</div>
                                    </div>
                                    <div class="col-auto mr-2">
                                        <div class="text font-weight-bold text-dark mb-1">
                                            @foreach($datelist as $date)
                                                @if($list->Kaizen_ID == $date->Kaizen_ID)
                                                    @php
                                                        $fdate = $date->Kaizen_DateFrom;
                                                        $tdate = $date->Kaizen_DateTo;

                                                        $datetime1 = new DateTime($fdate);
                                                        $datetime2 = new DateTime($tdate);
                                                        $interval = $datetime1->diff($datetime2);
                                                        $days = $interval->format('%a');
                                                    @endphp
                                                    {{$days+1}}
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <div class="text font-weight-bold text-dark mb-1">Status</div>
                                    </div>
                                    <div class="col-auto mr-2">
                                        <div class="text font-weight-bold text-dark mb-1">
                                        @if($list->Kaizen_status == 'Waiting')
                                            {{ $list->Kaizen_status }} <i class="fas fa-exclamation-circle text-warning"></i>
                                        @elseif($list->Kaizen_status == 'Approve')
                                            {{ $list->Kaizen_status }} <i class="far fa-thumbs-up text-primary"></i>
                                        @else
                                            {{ $list->Kaizen_status }} <i class="far fa-times-circle text-danger"></i>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <div class="text font-weight-bold text-dark mb-1">Room</div>
                                    </div>
                                    <div class="col-auto mr-2">
                                        <div class="text font-weight-bold text-dark mb-1">
                                            @if($list->Kaizen_room == "")
                                                -                                    
                                            @else
                                                {{$list->Kaizen_room}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="position-static">
                                
                                        <input type="text" name="kzid" value="{{ $list->Kaizen_ID }}" hidden>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kz{{ $list->Kaizen_ID }}">VIEW</button>
                                
                                </div> -->
                                
                            </div>
                            <div class="card-footer text-center">
                                <input type="text" name="kzid" value="{{ $list->Kaizen_ID }}" hidden>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kz{{ $list->Kaizen_ID }}">View</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="kz{{ $list->Kaizen_ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="text font-weight-bold text-light text-uppercase" id="exampleModalLongTitle">{{ $list->Kaizen_title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row p-2 rounded">
                                    <div class="col-3">
                                        Date
                                    </div>    
                                    <div class="col">
                                        @foreach($datelist as $date)
                                            @if($list->Kaizen_ID == $date->Kaizen_ID)
                                                {{ $date->Kaizen_DateFrom }} - {{ $date->Kaizen_DateTo }}
                                            @endif
                                    @endforeach
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Type
                                    </div>    
                                    <div class="col">
                                        {{ $list->Kaizen_type }}
                                    </div>
                                </div>
                                <div class="row  p-2 rounded">
                                    <div class="col-3">
                                        Status
                                    </div>    
                                    <div class="col">
                                        {{ $list->Kaizen_status }}
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Department
                                    </div>    
                                    <div class="col">
                                        {{ $list->Kaizen_dept }}
                                    </div>
                                </div>
                                <div class="row p-2  rounded">
                                    <div class="col-3">
                                        Member
                                    </div>
                                    <div class="col">
                                    @foreach($memberlist as $mem)
                                        @if($list->Kaizen_ID == $mem->Kaizen_ID)
                                            <li>{{ $mem->Fullname }} ({{ $mem->member_roles }})</li>
                                        @endif
                                    @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Scope
                                    </div>
                                    <div class="col">
                                    @foreach($scopelist as $scope)
                                            @if($list->Kaizen_ID == $scope->Kaizen_ID)
                                            
                                                <li>{{ $scope->scope }}</li>
                                            
                                            @endif
                                        @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2  rounded">
                                    <div class="col-3">
                                        Background
                                    </div>
                                    <div class="col">
                                    @foreach($backlist as $back)
                                        @if($list->Kaizen_ID == $back->Kaizen_ID)
                                            <li>{{ $back->background }}</li>
                                        @endif
                                    @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Baseline
                                    </div>
                                    <div class="col">
                                    @foreach($baselist as $base)
                                        @if($list->Kaizen_ID == $base->Kaizen_ID)
                                            <li>{{ $base->baseline }}</li>
                                        @endif
                                    @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2  rounded">
                                    <div class="col-3">
                                        Goals
                                    </div>
                                    <div class="col">
                                    @foreach($goalslist as $goal)
                                        @if($list->Kaizen_ID == $goal->Kaizen_ID)
                                            <li>{{ $goal->goals }}</li>
                                        @endif
                                    @endforeach
                                    </div> 
                                </div>
                                <div class="row p-2">
                                    <div class="col-3">
                                        Deliverable
                                    </div>
                                    <div class="col">
                                        @if(count($delivlist) > 0)    
                                            @foreach($delivlist as $deliv)
                                                @if($list->Kaizen_ID == $deliv->Kaizen_ID)
                                                    <li>{{ $deliv->deliverable }}</li>
                                                @endif
                                            @endforeach
                                        @else
                                            <p>-</p>
                                        @endif
                                    </div> 
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-toggle="modal"  data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
                
            </div>
        </div>
    </div>
</div>

<!-- Modal -->



@endsection