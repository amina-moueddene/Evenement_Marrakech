<<<<<<< HEAD:resources/views/home/event.blade.php
<!-- Events Section -->
<div class="our_event py-5" id="event">
   <div class="container">
      <div class="row mb-5">
         <div class="col-md-12 text-center">
            <div class="titlepage">
               <h2 class="display-4 fw-bold">Our Events</h2>
               <p class="text-muted">Discover our exciting events happening in Marrakech</p>
=======
<!-- our_room -->
<div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Event</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
>>>>>>> parent of 2f48760 (Merge pull request #16 from MohAitMesskine/CreateEvents):resources/views/home/room.blade.php
            </div>

<<<<<<< HEAD:resources/views/home/event.blade.php
      <div class="row g-4">
         @foreach($event as $events)
         <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm hover-effect">
               <div class="overflow-hidden position-relative">
                  <img class="card-img-top" src="{{$events->image}}" alt="{{$events->event_title}}" style="height: 220px; object-fit: cover;">
                  <div class="event-date position-absolute top-0 end-0 bg-primary text-white px-3 py-2 m-2 rounded">
                     {{date('d M', strtotime($events->date))}}
                  </div>
               </div>
               <div class="card-body">
                  <h3 class="card-title fw-bold">{{$events->event_title}}</h3>
                  <div class="d-flex align-items-center mb-3">
                     <i class="fa fa-map-marker text-primary me-2"></i>
                     <span class="text-muted">{{$events->lieu}}</span>
                  </div>
                  <p class="card-text">
                     {!! Str::limit($events->description, 100) !!}
                  </p>
               </div>
               <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                  <div class="price fw-bold text-primary">
                     {{$events->price}} MAD
                  </div>
                  @auth
                     <a href="{{url('event_details', $events->id)}}" class="btn btn-primary px-4">View Details</a>
                  @else
                     <a href="{{ route('login') }}" class="btn btn-outline-primary px-4">Login to View</a>
                  @endauth
               </div>
=======
            <div class="row" >
               @foreach($room as $rooms)
               <div class="col-md-4 col-sm-6" >
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img style="height:200px; width:350px";  src="room/{{$rooms->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room" >
                        <h3>{{$rooms->room_title}}</h3>
                        <p style="padding: 10px;">
                        {!! Str::limit($rooms->description,100)!!}
                         </p>

                         <a class="btn btn-primary" style="--bs-btn-bg:#E5C100;--bs-btn-border-color:#E5C100"; href="{{url('room_details',$rooms->id)}}">Event details</a>
                     </div>
                  </div>
               </div>
               @endforeach
>>>>>>> parent of 2f48760 (Merge pull request #16 from MohAitMesskine/CreateEvents):resources/views/home/room.blade.php
            </div>
         </div>
      </div>
      <!-- end our_room -->