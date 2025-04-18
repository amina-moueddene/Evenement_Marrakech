<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <!-- <div class="avatar"><img src="admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div> -->
          <!-- <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div> -->
        </div>
       
        <ul class="list-unstyled">
                <li  class="active"><a style="color: white;" href="index.html"> <i class="icon-home"></i>Home </a></li>
          
                <li><a style="color: white;" href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Event Manage </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a style="color: white;" href="{{url('create_event')}}">Add Event</a></li>
                    <li><a  style="color: white;" href="{{url('view_event')}}">View Event</a></li>
                  </ul>
                </li>

                <li>
                  <a style="color: white;" href="{{url('bookings')}}"> <i class="icon-home"></i>Bookings </a>
                </li>

                <li>
                  <a style="color: white;" href="{{url('view_gallary')}}"> <i class="icon-home"></i>Gallary </a>
                </li>

                <li>
                  <a style="color: white;" href="{{url('all_messages')}}"> <i class="icon-home"></i>Message </a>
                </li>

                
      </nav>
      <!-- Sidebar Navigation end-->