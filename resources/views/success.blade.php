@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                <div class="alert alert-success rounded-0">
                    <h3 class="text-center">เพิ่มการบันทึกเรียบร้อยแล้ว</h3> 
                    <center><a href="{{ url('/admin') }}" class="btn btn-primary bg-gradinet rounded-0">ย้อนกลับ</a></center>
                </div>
            </div>
        </div>
    </div>
@endsection
