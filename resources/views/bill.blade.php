<!DOCTYPE html>
<html>
<head>
	<title>บิล</title>
	<style>
		body{
			font-family:Raleway,sans-serif;
		}
		.right{
			float:right;
		}
		.red{color:red;}
		.tg  {border-collapse:collapse;border-spacing:0;margin: auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:4px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:4px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}

		
	</style>
	
</head>
<body>
	<h1><center>ระบบบิลค่าไฟหอพัก</center></h1>
	<hr>
  <br>
  <br>
  <div><strong>รหัสการเชื่อมต่อ: </strong>{{ Auth::user()->customerId }}</div>
  <div><strong>ชื่อ: </strong> {{ Auth::user()->name }}</div>
  <div><strong>อีเมล: </strong>{{ Auth::user()->email }}</div>
  <div><strong>ที่อยู่ เรียกเก็บเงิน: </strong> {{Auth::user()->address}}  </div>
  <div><strong>เรียกเก็บเงิน สำหรับ: </strong><span class="red">{{$data[0]->month}},{{$data[0]->year}}</span></div>
  <br>
  <br>
<table class="tg">
  <tr>
    <th class="tg-yw4l">การอ่านครั้งแรก<br></th>
    <th class="tg-yw4l">การอ่านครั้งสุดท้าย<br></th>
    <th class="tg-yw4l">หน่วยบริโภค<br></th>
    <th class="tg-yw4l">ประเมินค่า<br></th>
    <th class="tg-yw4l">ทั้งหมด<br></th>
  </tr>
  <tr>
    <td class="tg-yw4l">{{$data[0]->initial}}</td>
    <td class="tg-yw4l">{{$data[0]->final}}</td>
    <td class="tg-yw4l">{{$data[0]->units}}</td>
    <td class="tg-yw4l">Php {{number_format(($data[0]->amount)/($data[0]->units), 2)}} ต่อหน่วย</td>
    <td class="tg-yw4l red"><strong>Php {{number_format($data[0]->amount,2)}}</strong></td>
  </tr>
</table>
<br>

</body>
</html>