<!DOCTYPE html>
<html lang="en">
   <head>
<base href="/public">
@include('home.css')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



<style type="text/css">
   label{
      display: inline-block;
      width: 200px;
   }
   input{
      width: 100%;
     
   }

</style>


       </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
      @include('home.header')

      </header>
     


<!-- our_event -->
<div  class="our_event">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our event</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-8">
                  <div id="serv_hover"  class="event">
                     <div class="event_img" style="padding: 20px;">
                        <figure><img style="height:300px; width:800px";  src="event/{{$event->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_event">
                        <h2>{{$event->event_title}}</h2>
                        <p style="padding: 12px;">{{$event->description}} </p>
                        <h4> lieu :{{$event->lieu}} </h4>
                        <h4 style="padding: 12px;"> event type : {{$event->event_type}} </h4>
                        <h3 style="padding: 12px;"> Date : {{$event->date}} </h3>
                        <h3 style="padding: 12px;"> Price : {{$event->price}} </h3>

                     </div>
                  </div>
               </div>


               <div class="col-md-4">

                  <h1 style="font-size: 40px!important;">Book event</h1>



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

                  <form action="{{url('add_booking',$event->id)}}" method="POST">
                  @csrf
                  <div>
                     <label for="">Name</label>
                     <input type="text" name="name" 
                     @if(Auth::id())
                     value="{{Auth::user()->name}}"
                     @endif
                     >
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


                  <div style="padding-top: 20px;">
                     <input style="background-color:#E5C100" type="submit" class="btn btn-primary" value="Book event">
                  </div>

                  </form>
               </div>




            </div>
         </div>
      </div>
      <!-- end our_event -->



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