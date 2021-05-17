<!DOCTYPE html>
<html lang="vi">
   <head>
      <title>Join</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="container">
         <h1 style = "color:#0099ff">Đăng ký tham gia:</h1>
         <br>
         <h4>Bạn hãy điền thông tin vào mẫu sau</h4>
         <br>
         <form method="POST" action="{{ url('join') }}">
         {{ csrf_field()}}
            <div class="form-group">
               <label for="email">Email address:</label>
               <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
            </div>
            <div class="form-group">
               <label for="phone">Number phone:</label>
               <input type="tel" class="form-control" placeholder="Enter phone number" id="phone" name="phone">
            </div>
            <div class="form-group">
               <label for="address">Address:</label>
               <input type="text" class="form-control" placeholder="Enter your address" id="add" name="address">
            </div>
            <div class="form-group">
               <label for="race_id">Cuộc thi bạn muốn tham gia:</label>
               <select id="race_id" name="race_id">
               @foreach($races as $race)
               <option value="{{ $race->race_id }}">{{ $race->name }}</option>
               @endforeach
               </select>
            </div>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
         </form>
      </div>
   </body>
   <script>
      $(document).ready(function(){
         $("#id").val(localStorage.getItem('id'));
      })
   </script>
</html>