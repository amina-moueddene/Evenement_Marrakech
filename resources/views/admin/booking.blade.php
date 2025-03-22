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
    margin-top: 30px;
    }
    .th_deg{
        background-color: #E5C100;
        padding: 3px;
        font-size: 13px;
        color: black;

    }
    tr{
        border: 2px white solid;
    }
    td{
        padding: 5px;
        font-size: 12px;
        color: white;
    
    }
    .btn{
        padding: 3px;
        font-size: 15px;
        margin: 2px;
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

                                    
                                <th class="th_deg">Event_id</th>  
                                <th class="th_deg">Customer name</th> 
                                <th class="th_deg">Email</th> 
                                <th class="th_deg">Phone</th> 
                                <th class="th_deg">Arrival Date</th> 
                                <th class="th_deg">leaving Date</th> 
                                <th class="th_deg">Status</th> 
                                <th class="th_deg">Room title</th> 
                                <th class="th_deg">Price</th> 
                                <th class="th_deg">Image</th> 
                                <th class="th_deg">Delete</th> 
                                <th class="th_deg">Status Update</th> 

            
                    </tr>


                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->room_id}}</td>  
                        <td>{{ $item->name}}</td> 
                        <td>{{ $item->email }}</td> 
                        <td>{{ $item->phone}}</td> 
                        <td>{{ $item->start_date}}</td> 
                        <td>{{ $item->end_date}}</td> 
                        <td>

                            @if($item->status == 'approve')
                            <span style="color: #E5C100;">Approved</span>
                            @elseif($item->status == 'reject')
                            <span style="color: red;">Rejected</span>
                            @else
                            <span style="color: yellow;">Waiting</span>
                            @endif

                            
                        </td> 
                        <td>{{ $item->room->room_title}}</td> 
                        <td>{{$item->room->price}}</td> 
                        <td>
                            <img src="/room/{{ $item->room->image}}" alt="">
                         </td> 
                         <td>
                             <a  onclick="return confirm('are you sure to delete')" class="btn btn-danger" href="{{url('delete_booking', $item->id)}}">Delele</a>
                        </td> 

                        <td>
                            <span style="padding-bottom: 5px;">
                             <a  class="btn btn-success" href="{{url('approve_book', $item->id)}}">Approve</a>

                            </span>
                             <a class="btn btn-warning" href="{{url('reject_booking', $item->id)}}">Rejected</a>

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