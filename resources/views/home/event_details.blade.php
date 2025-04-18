<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .bed_room h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .bed_room p {
            line-height: 1.6;
            color: #555;
        }

        .bed_room h3, .bed_room h4 {
            color: #555;
            margin-bottom: 10px;
        }

        .date-container {
            display: flex;
            align-items: center;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .date-icon {
            font-size: 24px;
            color: #E5C100;
            margin-right: 15px;
        }

        .date-label {
            display: block;
            font-size: 14px;
            color: #777;
        }

        .date-value {
            margin: 0;
            font-weight: 600;
            color: #333;
        }

        .booking-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .booking-title {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #E5C100;
            padding-bottom: 10px;
        }

        .btn-book {
            background-color: #E5C100;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-book:hover {
            background-color: #c9a900;
            transform: translateY(-2px);
        }

        .event-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="main-layout">
    <!-- loader -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
    </div>
    <!-- end loader -->

    <!-- header -->
    <header>
        @include('home.header')
    </header>

    <!-- our_room -->
    <div class="our_room py-5">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="room mb-4">
                        <div class="event-image mb-4">
                            <figure><img src="{{$room->image}}" alt="{{$room->room_title}}"/></figure>
                        </div>
                        <div class="bed_room">
                            <h2>{{$room->room_title}}</h2>
                            <p>{{$room->description}}</p>

                            <div class="event-details mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4><i class="fas fa-map-marker-alt me-2" style="color: #E5C100;"></i> Location: {{$room->lieu}}</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h4><i class="fas fa-tag me-2" style="color: #E5C100;"></i> Event Type: {{$room->room_type}}</h4>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <h3><i class="fas fa-dollar-sign me-2" style="color: #E5C100;"></i> Price: {{$room->price}}</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="date-container">
                                            <div class="date-icon">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <div class="date-info">
                                                <span class="date-label">Event Date</span>
                                                <h3 class="date-value">{{ \Carbon\Carbon::parse($room->date)->format('F j, Y') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               <div class="col-md-4">

                  <h1 style="font-size: 40px!important;">Book room</h1>



                  <div>
                     @if(session()->has('message'))

                   <div class="alert alert-success">

                   <button type="button" class="close" data-bs-dismiss="alert">
                     X
                   </button>
                   {{ session()->get('message') }}

                   </div>
                
                     @endif
                  </div>


                   
                  @if($errors)

                  @foreach($errors->all() as $errors)
                  <li style="color: red;">
                     {{$errors}}
                  </li>

                  @endforeach
                  @endif

                        <form action="{{url('add_booking',$room->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user me-2"></i>Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    @if(Auth::id())
                                        value="{{Auth::user()->name}}"
                                    @endif
                                    required>
                            </div>

                  <div>
                     <label for="">Email</label>
                     <input type="text" name="email" 
                     @if(Auth::id())
                     value="{{Auth::user()->email}}"
                     @endif
                     >
                  </div>
                  <div>
                     <label for="">Phone</label>
                     <input type="text" name="phone"
                      
                     @if(Auth::id())
                     value="{{Auth::user()->phone}}"
                     @endif
                     >
                  </div>

                  <div>
                     <label for="">Start date</label>
                     <input type="date" name="startDate" id="startDate">
                  </div>

                  <div>
                     <label for="">End date</label>
                     <input type="date" name="endDate" id="endDate">
                  </div>

                  <div style="padding-top: 20px;">
                     <input style="background-color:#E5C100" type="submit" class="btn btn-primary" value="Book Room">
                  </div>

                  </form>
               </div>




            </div>
        </div>
    </div>
    <!-- end our_room -->

      @include('home.footer')
      <!-- Javascript files-->
      

<script type="text/javascript">
$(function(){
   var dtToday = new Date();
   var month = dtToday.getMonth() + 1;
   var day = dtToday.getDate();
   var year = dtToday.getFullYear();
   if(month < 10)
       month = '0' + month.toString();
       if(day < 10) 
       day = '0' + day.toString();
       var maxDate = year + '-' + month + '-' + day;
       $('#startDate').attr('min', maxDate);
         $('#endDate').attr('min', maxDate);
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


   </body>
</html>