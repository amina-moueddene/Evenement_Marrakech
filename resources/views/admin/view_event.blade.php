<!DOCTYPE html>
<html>
  <head> 
 @include('admin.css')
 <style>
    .table_deg{
    border: 2px white solid;
    margin: auto;
    width: 100%;
    text-align: center;
    margin-top: 40px;
    }
    .th_deg{
        color: black;
        background-color: #E5C100;
        padding: 10px;
    }
    tr{
        border: 3px white solid;
    }
    td{
        padding: 5px;
        color: white;
        font-size: 14px;
    
    }


</style>
      </head>
  <body>
  @include('admin.header')

  @include('admin.sidebar')

  <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

                <table class="table_deg">
                    <tr>
                                <th class="th_deg">Event title</th>  
                                <th class="th_deg">Description</th> 
                                <th class="th_deg">price</th>
                                <th class="th_deg">Date</th>  
                                <th class="th_deg">lieu</th> 
                                <th class="th_deg">event type</th> 
                                <th class="th_deg">Image</th> 
                                <th class="th_deg">Delete</th>   
                                <th class="th_deg">Update</th>          
                    </tr>

                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->event_title }}</td>  
                        <td>{!! Str::limit( $item->description, 150)!!}</td> 
                        <td>{{ $item->price }}</td> 
                        <td>{{ $item->date }}</td> 
                        <td>{{ $item->lieu }}</td> 
                        <td>{{ $item->event_type }}</td> 
                        <td>
                            <img width="100" src="event/{{ $item->image }}" alt="">
                        </td> 
                        <td>
                            <a onclick="return confirm('are you sure to delete')" href="{{url('event_delete', $item->id)}}" class="btn btn-danger">Delete</a>
                        </td>

                        <td>
                            <a href="{{url('event_update', $item->id)}}" class="btn btn-warning">Update</a>
                        </td>
                    </tr>
                @endforeach

                </table>



          </div>

         </div>
   </div>
@include('admin.footer')

  </body>
</html>