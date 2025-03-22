<!DOCTYPE html>
<html>
  <head> 
 @include('admin.css')

 <style>
     .no-margin-bottom{
        color: white;
        text-align: center;
        margin-top: 20px;
        font-size: 25px;
    }
    .btn{
        padding: 5px;
            font-size: 15px;
            margin: 2px;
    }
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
        font-size: 15px;
        color: white;
    
    }

</style>

      </head>
  <body>
  @include('admin.header')

  @include('admin.sidebar')

        <div class="page-content">
                <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">All Messages</h2>

                    <table class="table_deg">
                    <tr>
                                <th class="th_deg">Name</th>  
                                <th class="th_deg">Email</th> 
                                <th class="th_deg">Phone</th> 
                                <th class="th_deg">Message</th> 
                                <th class="th_deg">Send Email</th> 
                                  
                    </tr>


                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->name}}</td>  
                        <td>{{ $item->email}}</td> 
                        <td>{{ $item->phone}} </td> 
                        <td> {{ $item->message}}</td> 
                        <td>
                            <a class="btn btn-success" href="{{url('send_mail',$item->id)}}"> Send mail</a>
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