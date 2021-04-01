@extends('layout/main-kaizenForm-detail')


@section('title', 'Update Kaizen')
@section('collapseClass', 'show')
@section('formClass', 'active')
@section('addKaizen', '')
@section('listKaizen', 'active')
@section('updateKaizen', '')
@section('dashboard', '')

@section('container')

<div class="container" >

          <form class="user" method="post" action="{{ url('/kaizen-form/update-kaizen') }}">
            @csrf
            
              <div class="row justify-content-center">
                <div class="col-md-3 text-center">
                  <p class="text text-light bg-red rounded" id="">KZ ID: {{ $main->Kaizen_ID }}</p>
                  <input type="text" name="kzid" id="kzidi" hidden value="{{ $main->Kaizen_ID }}">
                  <input type="text" name="kzstatus" id="kzidi" hidden value="{{ $main->Kaizen_status }}">
                  <input type="text" name="kzmade" id="kzidi" hidden value="{{ $main->Kaizen_madeby }}">
                </div>
              </div>

              <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active text-dark" id="nav-main-tab" data-toggle="tab" href="#nav-main" role="tab" aria-controls="nav-main" aria-selected="true">Main</a>
                      <a class="nav-item nav-link text-dark" id="nav-member-tab" data-toggle="tab" href="#nav-member" role="tab" aria-controls="nav-member" aria-selected="false">Members</a>
                      <a class="nav-item nav-link text-dark" id="nav-detail-tab" data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">Details</a>
                      <a class="nav-item nav-link text-dark" id="nav-action-tab" data-toggle="tab" href="#nav-action" role="tab" aria-controls="nav-action" aria-selected="false">Finding</a>
                  </div>
              </nav>

              <div class="border-0 shadow-lg rounded pl-3 pt-3 pb-3 pr-3">
                <div class="tab-content pt-3" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-main" role="tabpanel" aria-labelledby="nav-main-tab">
                    <div class="list-group vertical-scrollable">
                      <div class="form-group row justify-content-center">
                        <div class="col-md-8 border-0 rounded pt-2 pb-2">
                          <label for="exampleInputEmail" class="bmd-label-floating blk  font-weight-bold">Title</label>
                          <input required type="text" class="form-control form-control" id="exampleInputEmail" name="kztitle" value="{{ $main->Kaizen_title }}">
                        </div>
                        <div class="col-md-3 border-0 rounded pt-2 pb-2">
                          <label for="exampleSelect1" class="bmd-label-floating blk  font-weight-bold">Kaizen Type</label>
                          <select class="form-control" id="exampleSelect1" name="kztypes" required>
                          <option value="{{ $main->Kaizen_type }}" selected hidden>{{$main->Kaizen_type}}</option>
                              <option value="BPK">BPK</option>
                              <option value="SFK">SFK</option>
                              <option value="DK">DK</option>
                              <option value="555">555</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row justify-content-center ">
                        <div class="col-md-6 border-0 rounded pt-2 pb-2">
                          <label for="exampleSelect1" class="bmd-label-floating blk  font-weight-bold">Department</label>
                          <select class="form-control" name="kzdept" id="kzdept" required>
                              <option value="{{ $main->Kaizen_dept }}" selected hidden>{{ $main->Kaizen_dept }}</option>
                              <option value="EHS">EHS</option>
                              <option value="Engineering">Engineering</option>
                              <option value="Finance & IT">Finance & IT</option>
                              <option value="Human Resources">Human Resources</option>
                              <option value="Manufacturing East">Manufacturing East</option>
                              <option value="Manufacturing West">Manufacturing West</option>
                              <option value="Quality">Quality</option>
                              <option value="Product Development">Product Development</option>
                              <option value="Materials">Materials</option>
                          </select>
                        </div>
                        <div class="col-md-5 border-0 rounded pt-2 pb-2">
                          <div id="date" class="row justify-content-center">
                            <div class="col-md-" id="dates">
                              <label for="dat" class="bmd-label-floating blk  font-weight-bold"> Date From</label>
                              <input class="form-control" type="date" name="dateFrom" value="{{ $dates->Kaizen_DateFrom }}" required>
                            </div>
                            <div class="col-md-6 pt-md-0 pt-2">
                              <label for="dat" class="bmd-label-floating blk  font-weight-bold">Date To</label>
                              <input class="form-control" type="date" name="dateTo" value="{{ $dates->Kaizen_DateTo }}" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row justify-content-center mt-5">
                        <button type="button" id="nextMems" class="btn btn-danger justify-content-center">Next <i class="fas fa-chevron-circle-right"></i></button>
                      </div>
                      
                    </div>
                  </div>
                  <div class="tab-pane fade show" id="nav-member" role="tabpanel" aria-labelledby="nav-member-tab">
                    <div class="list-group vertical-scrollable">
                      <div class="form-group row justify-content-center d-flex">
                        <div class="col-md-10 border-0 rounded pt-2 pb-2">
                          <label for="myTab" class="bmd-label-floating blk  font-weight-bold">Members</label>
                          <div class="row justify-content-center">
                            <div class="col-10 text-center">
                              <select class="" style="width: 100%;" id="nameEmp" name="">
                                  <option value="" selected disabled hidden></option>
                                  @foreach($employee as $emp)
                                    <option id="test2">{{ $emp->Fullname }}- {{ $emp->KPK }}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="col-2 text-center">
                              <button onclick="addRow()" type="button" class="btn btn-danger justify-content-center"><i class="fas fa-plus"></i></button>
                            </div>
                          </div>

                          <div class="row">
                            <table class="table text-center" id="myTab">
                              <thead class="text-center blk">
                                  <th>KPK</th>
                                  <th>Name</th>
                                  <th>Role</th>
                              </thead>
                              <tbody id="myRows" class="text-white">
                                @foreach($member as $mems)
                                  <tr>
                                      <td><input readonly name="kpk[]" scope="col" type="text" class="form-control" value="{{ $mems->kpkNum }}"></td>
                                      <td><input readonly name="name[]" scope="col" type="text" class="form-control"  value="{{ $mems->Fullname }}"></td>
                                      <td>
                                        <select class="form-control" name="role[]" id="role1" style="width:auto" required>
                                          <option value="{{$mems->member_roles}}" selected hidden>{{$mems->member_roles}}</option>
                                          <option value="Sponsor">Sponsor</option>
                                          <option value="Facilitator">Facilitator</option>
                                          <option value="Leader">Leader</option>
                                          <option value="Leader">Co-Leader</option>
                                          <option value="Leader">Participant</option>
                                        </select>
                                      </td>
                                      <td><button type='button' onclick='delRow(this)'  class='btn btn-danger'><i class='fas fa-trash'></i></button></td>
                                  </tr>
                                  
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <div class="form-group row justify-content-center mt-5">
                            <button type="button" id="befMain" class="btn btn-danger justify-content-center mr-2"><i class="fas fa-chevron-circle-left"></i> Back</button>
                            <button type="button" id="nextDet" class="btn btn-danger justify-content-center">Next <i class="fas fa-chevron-circle-right"></i></button>
                          </div>
                            <input type="text" id="totRow" name="totRow" hidden value="1">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade show" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                    <div class="list-group vertical-scrollable">
                    <div class="form-group row justify-content-center">
                      <div class="col-md-10 border-0  rounded pt-2 pb-2">
                        <div class="row justify-content-center">
                          <div class="col border-0 rounded pt-2 pb-2">
                            <label for="exampleTextarea" class="bmd-label-floating blk  font-weight-bold">Scope</label>
                            <table class="table" id="scopeTab">
                              <tbody id="scopeRow">
                                @foreach($scopes as $scp)
                                  <tr class="text-dark">
                                    <td class="text-center">
                                    <ul><li></li></ul>
                                    </td>
                                    <td>
                                      <textarea class="form-control" id="scope1" name="scope[]" rows="1">{{ $scp->scope }}</textarea>
                                    </td>
                                    <td><button type='button' onclick='delScope(this)'  class='btn btn-danger'><i class='fas fa-trash'></i></button></td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <div class="row">
                              <div class="col text-center">
                                  <input type="text" id="totRowScope" name="totRowScope" hidden value="1">
                                <button onclick="addScope()" type="button" class="btn btn-danger justify-content-center"><i class="fas fa-plus"></i></button>
                              </div>
                            </div>
                          </div>
                        </div>              
                        <div class="row justify-content-center">
                          <div class="col border-0 rounded pt-2 pb-2">
                            <label for="exampleTextarea" class="bmd-label-floating blk  font-weight-bold">Background</label>
                            <table class="table" id="backTab">
                              <tbody id="backRow">
                                @foreach($backs as $back)
                                  <tr class="text-dark">
                                    <td class="text-center">
                                    <ul><li></li></ul>
                                    </td>
                                    <td>
                                      <textarea class="form-control" id="back1" name="back[]" rows="1">{{ $back->background }}</textarea>
                                    </td>
                                    <td><button type='button' onclick='delBack(this)'  class='btn btn-danger'><i class='fas fa-trash'></i></button></td>
                                  </tr>
                                @endforeach
                              </tbody>
                              
                            </table>
                            <div class="row">
                              <div class="col text-center">
                                  <input type="text" id="totRowBack" name="totRowBack" hidden value="1">
                                <button onclick="addBack()" type="button" class="btn btn-danger justify-content-center"><i class="fas fa-plus"></i></button>
                              </div>
                            </div>
                          </div>
                        </div>              
                        <div class="row justify-content-center">
                          <div class="col border-0 rounded pt-2 pb-2">
                            <label for="exampleTextarea" class="bmd-label-floating blk  font-weight-bold">Baseline</label>
                            <table class="table" id="baseTab">
                              <tbody id="baseRow">
                                @foreach($bases as $base)
                                  <tr class="text-dark">
                                    <td class="text-center">
                                    <ul><li></li></ul>
                                    </td>
                                    <td>
                                      <textarea class="form-control" id="base1" name="base[]" rows="1">{{$base->baseline}}</textarea>
                                    </td>
                                    <td><button type='button' onclick='delBase(this)'  class='btn btn-danger'><i class='fas fa-trash'></i></button></td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <div class="row">
                              <div class="col text-center">
                                  <input type="text" id="totRowBase" name="totRowBase" hidden value="1">
                                <button onclick="addBase()" type="button" class="btn btn-danger justify-content-center"><i class="fas fa-plus"></i></button>
                              </div>
                            </div>
                          </div>
                        </div>              
                        <div class="row justify-content-center">
                          <div class="col border-0 rounded pt-2 pb-2">
                            <label for="exampleTextarea" class="bmd-label-floating blk  font-weight-bold">Goals</label>
                            <table class="table" id="goalsTab">
                              <tbody id="goalsRow">
                                @foreach($goals as $goal)
                                  <tr class="text-dark">
                                    <td class="text-center">
                                    <ul><li></li></ul>
                                    </td>
                                    <td>
                                      <textarea class="form-control" id="goals1" name="goals[]" rows="1">{{ $goal->goals }}</textarea>
                                    </td>
                                    <td><button type='button' onclick='delGoals(this)'  class='btn btn-danger'><i class='fas fa-trash'></i></button></td>
                                  </tr>
                                @endforeach
                              </tbody>
                              
                            </table>
                            <div class="row">
                              <div class="col text-center">
                                  <input type="text" id="totRowGoals" name="totRowGoals" hidden value="1">
                                <button onclick="addGoals()" type="button" class="btn btn-danger justify-content-center"><i class="fas fa-plus"></i></button>
                              </div>
                            </div>
                          </div>
                        </div>              
                        <div class="row justify-content-center">
                          <div class="col border-0 rounded pt-2 pb-2">
                            <label for="exampleTextarea" class="bmd-label-floating blk  font-weight-bold">Deliverables</label>
                            <table class="table" id="delivTab">
                              <tbody id="delivRow">
                                @foreach($delivs as $deliv)
                                  <tr class="text-dark">
                                    <td class="text-center">
                                    <ul><li></li></ul>
                                    </td>
                                    <td>
                                      <textarea class="form-control" id="deliv1" name="deliv[]" rows="1">{{$deliv->deliverable}}</textarea>
                                    </td>
                                    <td><button type='button' onclick='delDeliv(this)'  class='btn btn-danger'><i class='fas fa-trash'></i></button></td>
                                  </tr>
                                @endforeach
                              </tbody>
                              
                            </table>
                            <div class="row">
                              <div class="col text-center">
                                  <input type="text" id="totRowDeliv" name="totRowDeliv" hidden value="1">
                                <button onclick="addDeliv()" type="button" class="btn btn-danger justify-content-center"><i class="fas fa-plus"></i></button>
                              </div>
                            </div>
                          </div>
                        </div>              
                      </div>
                    </div>
                    <div class="form-group row justify-content-center mt-5">
                        <button type="button" id="befMem" class="btn btn-danger justify-content-center mr-2"><i class="fas fa-chevron-circle-left"></i> Back</button>
                      </div>                          
                    </div>
                  </div>
                  <div class="tab-pane fade show" id="nav-action" role="tabpanel" aria-labelledby="nav-action-tab">
                    <div class="list-group vertical-scrollable">
                      <!-- <div class="row">
                        <div class="col-md-2 border-0 rounded pt-2 pb-2">
                          <label for="exampleInputEmail" class="bmd-label-floating blk  font-weight-bold">Issue</label>
                          <input required type="text" class="form-control form-control" id="exampleInputEmail" name="kzissue" value="">
                        </div>
                        <div class="col-md-2 border-0 rounded pt-2 pb-2">
                          <label for="exampleInputEmail" class="bmd-label-floating blk  font-weight-bold">Issue</label>
                          <input required type="text" class="form-control form-control" id="exampleInputEmail" name="kzissue" value="">
                        </div>
                        <div class="col-md-2 border-0 rounded pt-2 pb-2">
                          <label for="exampleInputEmail" class="bmd-label-floating blk  font-weight-bold">Issue</label>
                          <input required type="text" class="form-control form-control" id="exampleInputEmail" name="kzissue" value="">
                        </div>
                        <div class="col-md-2 border-0 rounded pt-2 pb-2">
                          <label for="exampleInputEmail" class="bmd-label-floating blk  font-weight-bold">Issue</label>
                          <input required type="text" class="form-control form-control" id="exampleInputEmail" name="kzissue" value="">
                        </div>
                        <div class="col-md-2 border-0 rounded pt-2 pb-2">
                          <label for="exampleInputEmail" class="bmd-label-floating blk  font-weight-bold">Issue</label>
                          <input required type="text" class="form-control form-control" id="exampleInputEmail" name="kzissue" value="">
                        </div>
                        <div class="col-md-2 border-0 rounded pt-2 pb-2">
                          <label for="exampleInputEmail" class="bmd-label-floating blk  font-weight-bold">Issue</label>
                          <input required type="text" class="form-control form-control" id="exampleInputEmail" name="kzissue" value="">
                        </div>
                      </div> -->
                      <div class="form-group row justify-content-end mr-3">
                          <button onclick="getFindingID()" type="button" data-toggle="modal" data-target=".bd-example-modal-lg" id="addIssueBtn" class="btn btn-danger justify-content-center">Add Issue</button>
                      </div>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">KPI</th>
                            <th scope="col">Issue</th>
                            <th scope="col">Details</th>
                            <th scope="col">Remove</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-end pt-2">
                  <div class="col-md-3 pt-2 ">
                    @if($acc->kpkNum == '393560')
                      <button type="submit" class="btn btn-danger btn-block font2">
                          Update
                      </button>
                    @else
                      @if($rolesKaizen->member_roles == 'Leader' || $rolesKaizen->member_roles == 'Facilitator' || $rolesKaizen->member_roles == 'Sponsor')
                        <button type="submit" class="btn btn-danger btn-block font2">
                          Update
                        </button>
                      @else
                        <button class="btn btn-danger btn-block font2" disabled>
                          Update
                        </button>
                      @endif
                      
                    @endif
                  </div>
                </div>
              </div>
             
              <input type="text" name="kzroom" id="kzidi" hidden value="{{ $main->Kaizen_room }}">
          </form>

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title font2 font-weight-bold text-light" id="exampleModalCenterTitle">Finding Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="issueDesc" class="font2 text-dark font-weight-bold">Issue</label>
                                        <textarea required class="form-control font2" id="issueDesc" rows="3" placeholder="Type issue here..." name="issueDesc"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="actionDesc" class="font2 text-dark font-weight-bold">Action</label>
                                        <textarea required class="form-control font2" id="actionDesc" rows="3" placeholder="Type action here..." name="actionDesc"></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="exampleFormControlTextarea1" class="font2 text-dark font-weight-bold">KPI</label>
                                        <select class="form-control font2" name="selectKPI" id="selectKPI" required>
                                            <option value="" hidden>Select KPI</option>
                                            <option value="Quality">Quality</option>
                                            <option value="Cost">Cost</option>
                                            <option value="Safety">Safety</option>
                                            <option value="Delivery">Delivery</option>
                                            <option value="Moral">Moral</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="font2 text-dark font-weight-bold">Before</label>
                                            <input required class="form-control font2" type="text" id="beforeAct" name="beforeAct" placeholder="Before value">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="font2 text-dark font-weight-bold">After</label>
                                            <input required class="form-control font2" type="text" id="afterAct" name="afterAct" placeholder="After value">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleFormControlTextarea1" class="font2 text-dark font-weight-bold">Unit Measurement</label>
                                        <select class="form-control font2" id="selectUM" name="selectUM" required>
                                            <option value="" hidden>Select Unit Measurement</option>
                                            <option value="PPM">PPM</option>
                                            <option value="Cm">Cm</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="font2 text-dark font-weight-bold">Goals</label>
                                            <input required class="form-control font2" id="goalsAct" name="goalsAct" type="text" placeholder="Goals value">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="font2 text-dark font-weight-bold">Due Date</label>
                                            <input required class="form-control font2" id="dueDate" name="dueDate" type="date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleFormControlTextarea1" class="font2 text-dark font-weight-bold">Remarks/Status</label>
                                        <select class="form-control font2" id="selectRemarks" name="selectRemarks" required>
                                            <option value="" hidden>Select Remarks</option>
                                            <option value="On-Going">On-Going</option>
                                            <option value="Done">Done</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="exampleFormControlTextarea1" class="font2 text-dark font-weight-bold">R+</label>
                                        <select class="" style="width: 100%;" id="nameRplus" name="">
                                            <option value="" selected disabled hidden></option>
                                            @foreach($employee as $emp)
                                              <option id="test1" class="font2">{{ $emp->Fullname }}- {{ $emp->KPK }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-1 mt-4">
                                      <button onclick="addRplus()" type="button" class="btn btn-danger font2"><i class="fas fa-plus"></i></button>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                  <div class="col-md-7">
                                      <table class="table table-striped" id="rplusTab">
                                        <thead>
                                          <tr>
                                            <th scope="col">KPK</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Remove</th>
                                          </tr>
                                        </thead>
                                        <tbody id="rplusRow">
                                          
                                        </tbody>
                                      </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Add Finding</button>
                            <input id="findingID" name="findingID" hidden></input>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>

       
        <script>
          function getFindingID() {
          var date = new Date();
          var str = date.getFullYear() + "" + (date.getMonth() + 1) + "" + date.getDate() + "" +  date.getHours() + "" + date.getMinutes() + "" + date.getSeconds();
          var findId = "FID"+str;
          var a = document.getElementById("findingID").value = findId;
          console.log(findId);
        }


        </script>

@endsection