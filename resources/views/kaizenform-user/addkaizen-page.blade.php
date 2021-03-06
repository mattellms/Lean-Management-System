@extends('layout/main-kaizenForm')



@section('title', 'Add Kaizen')
@section('collapseClass', 'show')
@section('formClass', 'active')
@section('addKaizen', 'active')
@section('listKaizen', '')
@section('updateKaizen', '')
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

<!-- Main Content -->

        <!-- Begin Page Content -->
        <div class="container">

          <form class="user" id="forms" method="post" action="{{ url('/kaizen-form/add-kaizen') }}">
            @csrf
              <div class="row justify-content-center">
                <div class="col-md-3 text-center">
                  <p class="text text-light bg-red rounded" id="kzid">KZ ID: </p>
                  <input type="text" name="kzid" id="kzidi" hidden value="">
                </div>
              </div>

              <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active text-dark" id="nav-main-tab" data-toggle="tab" href="#nav-main" role="tab" aria-controls="nav-main" aria-selected="true">Main</a>
                      <a class="nav-item nav-link text-dark" id="nav-member-tab" data-toggle="tab" href="#nav-member" role="tab" aria-controls="nav-member" aria-selected="false">Members</a>
                      <a class="nav-item nav-link text-dark" id="nav-detail-tab" data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">Details</a>
                  </div>
              </nav>

              <div class="border-0 shadow-lg rounded pl-3 pt-3 pb-3 pr-3">
                <div class="tab-content pt-3" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-main" role="tabpanel" aria-labelledby="nav-main-tab">
                    <div class="list-group vertical-scrollable">
                      <div class="form-group row justify-content-center">
                        <div class="col-md-8 border-0 rounded pt-2 pb-2">
                          <label for="exampleInputEmail" class="bmd-label-floating blk font-weight-bold">Title</label>
                          <input required type="text" class="form-control form-control" id="kztitle" name="kztitle" placeholder="Title here...">
                        </div>
                        <div class="col-md-3 border-0 rounded pt-2 pb-2">
                          <label for="exampleSelect1" class="bmd-label-floating blk font-weight-bold">Kaizen Type</label>
                          <select class="form-control" id="kztypes" name="kztypes" required>
                              <option value="" selected disabled hidden>Kaizen Type</option>
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
                              <option value="" selected disabled hidden>Select Department</option>
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
                              <input class="form-control" type="date" name="dateFrom" id="dateFrom" required>
                            </div>
                            <div class="col-md-6 pt-md-0 pt-2">
                              <label for="dat" class="bmd-label-floating blk  font-weight-bold">Date To</label>
                              <input class="form-control" type="date" name="dateTo" id="dateTo" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="form-group row justify-content-center mt-5">
                        <button type="button" id="nextMem" class="btn btn-danger justify-content-center" disabled>Next <i class="fas fa-chevron-circle-right"></i></button>
                      </div> -->
                      <div class="form-group row justify-content-center mt-3">
                        <div id="remind">
                          <p class="text-danger">*Please fill all the field</p>
                        </div>
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
                                    <option id="test1">{{ $emp->Fullname }}- {{ $emp->KPK }}</option>
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
                                <tr>
                                  <td><input readonly name="kpk[]" scope="col" type="text" class="form-control" value="{{ $acc->kpkNum }}"></td>
                                  <td><input readonly name="name[]" scope="col" type="text" class="form-control"  value="{{ $acc->Fullname }}"></td>
                                  <td>
                                    <select class="form-control" name="role[]" id="role" style="width:auto" required>
                                      <option value="" selected disabled hidden>Select Roles</option>
                                      <option value="Sponsor">Sponsor</option>
                                      <option value="Facilitator">Facilitator</option>
                                      <option value="Leader">Leader</option>
                                    </select>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
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
                                <tr class="text-dark">
                                  <td class="text-center">
                                    <ul><li></li></ul>
                                  </td>
                                  <td>
                                    <textarea class="form-control" id="scope1" name="scope[]" rows="1"></textarea>
                                  </td>
                                </tr>
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
                                <tr class="text-dark">
                                  <td class="text-center">
                                    <ul><li></li></ul>
                                  </td>
                                  <td>
                                    <textarea class="form-control" id="back1" name="back[]" rows="1"></textarea>
                                  </td>
                                </tr>
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
                                <tr class="text-dark">
                                  <td class="text-center">
                                  <ul><li></li></ul>
                                  </td>
                                  <td>
                                    <textarea class="form-control" id="base1" name="base[]" rows="1"></textarea>
                                  </td>
                                </tr>
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
                                <tr class="text-dark">
                                  <td class="text-center">
                                  <ul><li></li></ul>
                                  </td>
                                  <td>
                                    <textarea class="form-control" id="goals1" name="goals[]" rows="1"></textarea>
                                  </td>
                                </tr>
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
                                <tr class="text-dark">
                                  <td class="text-center">
                                  <ul><li></li></ul>
                                  </td>
                                  <td>
                                    <textarea class="form-control" id="deliv1" name="deliv[]" rows="1"></textarea>
                                  </td>
                                </tr>
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
                    </div>
                  </div>
                </div>
                <div class="row"> 
                  <div class="col d-flex justify-content-end">
                    <button type="button" id="prevTabAdd" class="btn btn-danger justify-content-center mr-2"><i class="fas fa-chevron-circle-left"></i> Prev</button>
                    <button type="button" id="nextTabAdd" class="btn btn-danger justify-content-center mr-3">Next <i class="fas fa-chevron-circle-right"></i></button>

                    <button type="submit" id="btnSubmit" class="btn btn-primary font2" disabled>
                        Submit <i class="fas fa-hand-pointer"></i>
                    </button>
                  </div>
                </div>
              </div>
          </form>
                    

                
        </div>
        <!-- /.container-fluid -->

  
    
@endsection