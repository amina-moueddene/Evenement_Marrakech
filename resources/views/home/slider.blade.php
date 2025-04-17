<section class="banner_main">
   <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
      <ol class="carousel-indicators">
         <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <li data-target="#myCarousel" data-slide-to="1"></li>
         <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img class="first-slide" src="images/banner1.jpg" alt="First slide">
            <div class="container">
               <div class="carousel-caption">
                  <h1>Welcome to Event Management</h1>
                  <p>Book your next special event with us</p>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
            <div class="container">
               <div class="carousel-caption">
                  <h1>Exceptional Venues</h1>
                  <p>Find the perfect location for your event</p>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
            <div class="container">
               <div class="carousel-caption">
                  <h1>Unforgettable Experiences</h1>
                  <p>Create memories that last a lifetime</p>
               </div>
            </div>
         </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>

   <div class="booking_ocline">
      <div class="container">
         <div class="row">
            <div class="col-md-5">
               <div class="book_room">
                  <h1>Book an Event Online</h1>

                  @if(session('message'))
                     <div class="alert alert-success">
                        {{ session('message') }}
                     </div>
                  @endif

                  <form class="book_now" action="{{ url('search_event') }}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col-md-12">
                           <span>Event Date</span>
                           <img class="date_cua" src="images/date.png">
                           <input class="online_book" type="date" name="date" required>
                        </div>
                        <div class="col-md-12">
                           <span>Event Type</span>
                           <select class="online_book" name="event_type">
                              <option value="">All Event Types</option>
                              <option value="Wedding">Wedding</option>
                              <option value="Corporate">Corporate</option>
                              <option value="Birthday">Birthday</option>
                              <option value="Conference">Conference</option>
                              <option value="Other">Other</option>
                           </select>
                        </div>
                        <div class="col-md-12">
                           <span>Location</span>
                           <input class="online_book" placeholder="Enter location" type="text" name="location">
                        </div>
                        <div class="col-md-12">
                           <button type="submit" class="book_btn">Find Events</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
