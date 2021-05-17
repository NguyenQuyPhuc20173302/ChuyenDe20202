@extends('master.master')
@section('content')
         <!--==============================Content=================================-->
         <div class="content">
            <div class="ic">More Website Templates @ TemplateMonster.com - April 21, 2014!</div>
            <div class="container_12">
				<div>
                     	@if(Session::has('success'))
                     	<h3 style="color : red; text-align:center">{{ Session::get('success') }}</h3>
                     	@endif
                  	</div>
               <div class="grid_12">
                  <h3>Find Us</h3>
                  <div class="map">
                     <figure class="">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24214.807650104907!2d-73.94846048422478!3d40.65521573400813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1395650655094" style="border:0"></iframe>
                     </figure>
                  </div>
               </div>
               <div class="clear"></div>
               <div class="grid_5">
                  <h3>Địa chỉ</h3>
                  <div class="text1">Viện Công nghệ thông tin và truyền thông - Đại học Bách Khoa Hà Nội</div>
                  <p>Muốn biết thêm thông tin chi tiết vui lòng liên hệ theo các địa chỉ sau<span class="color1"></span>:</p>

                  Số 1 Đại Cồ Việt, <br>
                  Telephone: 0827534715 <br>
                  FAX: +1 800 889 9898 <br>
                  E-mail: <span class="color1"><a href="#">haupham99a@gmail.com</a></span>
               </div>
               <div class="grid_6 prefix_1">
                  <h3>Contact Form</h3>
                  <form method="POST" action="{{ url('feedback')}}">
                     {{ csrf_field()}}
                     <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                     </div>
                     <div class="form-group">
                        <label for="name">Tên của bạn:</label>
                        <input type="text" class="form-control" id="name" placeholder="Tên của bạn" name="name">
                     </div>
                     <div class="form-group">
                        <label for="content">Tóm tắt nội dung:</label>
                        <input type="textbox" class="form-control" id="content" placeholder="Tóm tắt nội dung" name="content">
                     </div>
                     <button type="submit" class="btn btn-primary">Gửi</button>
                  </form>
               </div>
               <div class="clear"></div>
            </div>
         </div>
      </div>
      @endsection