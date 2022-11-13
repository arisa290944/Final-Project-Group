@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card rounded-0 shadow text-reset">
                <div class="card-header">
                  <div class="card-title h3 my-2 text-center">ยินดีต้อนรับ {{ Auth::user()->name }}!</div>
                </div>

                <div class="card-body">
                  <div class="container-fluid">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <fieldset class="border pb-2">
                      <legend class="w-auto mx-3 border-0 mb-0 px-4">รายละเอียดของคุณ</legend>
                        <div class="container-fluid">
                          <div class="lh-1">
                            <dl class="d-flex w-100 my-0">
                                <dt class="col-auto pe-2">รหัสการเชื่อมต่อ:</dt>
                                <dd class="col-auto flex-shrink-1 flex-grow-1">{{ Auth::user()->customerId }}</dd>
                            </dl>
                            <dl class="d-flex w-100 my-0">
                                <dt class="col-auto pe-2">ชื่อ:</dt>
                                <dd class="col-auto flex-shrink-1 flex-grow-1">{{ Auth::user()->name }}</dd>
                            </dl>
                            <dl class="d-flex w-100 my-0">
                                <dt class="col-auto pe-2">อีเมล:</dt>
                                <dd class="col-auto flex-shrink-1 flex-grow-1">{{ Auth::user()->email }}</dd>
                            </dl>
                            <dl class="d-flex w-100 my-0">
                                <dt class="col-auto pe-2">ที่อยู่เรียกเก็บเงิน:</dt>
                                <dd class="col-auto flex-shrink-1 flex-grow-1">{{ Auth::user()->address }}</dd>
                            </dl>
                          </div>
                        </div>
                    </fieldset>
                    <div class="clear-fix"></div>
                    <div class="row text-center">
                      <h3 class="text-center my-2 pt-3">คุณมียอดค้างชำระอยู่จำนวน: 
                        <span class="text-muted">  @php
                          use App\Http\Controllers\billController;
                          echo number_format(billController::calculate(Auth::user()->customerId));
                          @endphp    </span>
                      </h3>
                    </div>
                    <center>
                      <hr class="bg-primary bg-opacity-100" width="40%" style="opacity: 1; height:2px my-1">
                    </center>
                    <div class="clear-fix"></div>
                    @php
                      if(billController::calculate(Auth::user()->customerId) > 0) :
                    @endphp
                    <fieldset class="border pb-4">
                      <legend class="w-auto mx-3 border-0 mb-0 px-4">การชำระ</legend>
                      <div class="container-fluid">
                        <div class="row justify-content-center">
                          <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12">
                            <div class="d-grid">
                              <a href="{{url('/home/pay')}}" class="btn btn-primary rounded-pill px-4">จ่าย</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    @php
                      endif;
                    @endphp
                    <div class="clear-fix py-3"></div>
                    <fieldset class="border pb-4">
                      <legend class="w-auto mx-3 border-0 mb-0 px-4">บิลที่ออก</legend>
                      <div class="container-fluid">
                        <table class="table table-striped table-bordered">
                          <thead class="thead-dark">
                              <tr>
                                <th scope="col">เดือน</th>
                                <th scope="col">ปี</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">จำนวน</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($data as $value)
                              <tr>
                                    <td>{{$value->month}}</td>
                                    <td>{{$value->year}}</td>
                                    <td>{{$value->status}}</td>
                                    <td>{{$value->amount}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                          </table>
                      </div>
                    </fieldset>
                    <div class="clear-fix mb-3"></div>                    
                    <fieldset class="border pb-4">
                      <legend class="w-auto mx-3 border-0 mb-0 px-4">ดาวน์โหลด</legend>
                      <div class="container-fluid">
                        <form class="form-inline" action="{{route('home.pdf')}}" method="POST" target="_blank">
                          {{csrf_field()}}
                          <!-- Form Name -->
                          <div class="row align-items-end">
                            <!-- Select Basic -->
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3">
                              <label class=" control-label" for="month">เดือน</label>
                              <select id="month" name="month" class="form-select rounded-0">
                                <option value="January">มกราคม</option>
                                <option value="February">กุมภาพันธ์</option>
                                <option value="March">มีนาคม</option>
                                <option value="April">เมษายน</option>
                                <option value="May">พฤษภาคม</option>
                                <option value="June">มิถุนายน</option>
                                <option value="July">กรกฎาคม</option>
                                <option value="August">สิงหาคม</option>
                                <option value="September">กันยายน</option>
                                <option value="October">ตุลาคม</option>
                                <option value="November">พฤศจิกายน</option>
                                <option value="Decemeber">ธันวาคม</option>
                              </select>
                            </div>
    
                            <!-- Select Basic -->
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3">
                              <label class=" control-label" for="year">Year</label>
                              <select id="year" name="year" class="form-select rounded-0">
                                @php
                                for($i= (date("Y") - 20); $i < (date("Y") + 5); $i++ ):
                                $year = $i;
                                @endphp
                                <option <?= $i == date('Y')? "selected" : '' ?>><?= $i ?></option>
                                
                                @php
                                endfor;
                                @endphp
                              </select>
                            </div>
                            <!-- Button -->
                              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3">
                                <div class="d-grid">
                                  <button type="submit" class="btn btn-primary btn-sm rounded-0 bg-gradient">ดาวน์โหลด</button>
                                </div>
                              </div>
  
                          </div>
                        </form>
                      </div>
                    </fieldset>
                    
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
