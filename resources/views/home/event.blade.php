<!-- our_event -->
<div  class="our_event">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Event</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>

            <div class="row" >
               @foreach($event as $events)
               <div class="col-md-4 col-sm-6" >
                  <div id="serv_hover"  class="event">
                     <div class="event_img">
                        <figure><img style="height:200px; width:350px";  src="event/{{$events->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_event" >
                        <h3>{{$events->event_title}}</h3>
                        <p style="padding: 10px;">
                        {!! Str::limit($events->description,100)!!}
                         </p>

                         <a class="btn btn-primary" style="--bs-btn-bg:#E5C100;--bs-btn-border-color:#E5C100"; href="{{url('event_details',$events->id)}}">Event details</a>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- end our_event -->