<!DOCTYPE html>
<html>
  <head> 

<base href="/public">
 @include('admin.css')
<style>
    label{
        dispaly: inline-block;
        width: 200px ;
    }
.dev_deg{
    padding-top: 30px;
}
.dev_center{
   text-align: center;
   padding-top: 40px;
}

</style>

      </head>
  <body>
  @include('admin.header')

  @include('admin.sidebar')

  <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

                <div class="dev_center">
                    <h1 style="font-size:30px;font-weight:bold ">Update Event</h1>
                    <form action="{{url('edit_event',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf    
                    <div class="dev_deg">
                            <label for="" >event Title</label>
                            <input type="text" name="title" value="{{$data->event_title}}">
                        </div>

                        <div class="dev_deg">
                            <label for="">Description</label>
                           <textarea name="description" id="">
                           {{$data->description}}
                           </textarea>
                        </div>


                        <div class="dev_deg">
                            <label for="">price</label>
                            <input type="number" name="price" value="{{$data->price}}">
                        </div>

                        <div class="dev_deg">
                            <label for="">event type</label>
                           <select name="type" id="">
                                 <option selected value="{{$data->event_type}}"> {{$data->event_type}}</option>
                                 <option value="regular">Regular</option>
                                 <option value="premuim">Premuim</option>
                                 <option value="deluxe">Deluxe</option>
                           </select>
                        </div>

                        <div class="dev_deg">
                            <label for="">lieu</label>
                           <select name="lieu" id="">
                                 <option selected value="{{$data->lieu}}"> {{$data->lieu}}</option>
                                 <option value="yes">Yes</option>
                                 <option value="no">No</option>
                           </select>
                        </div>


                        <div class="dev_deg" >
                            <label for="">Current image</label>
                           <img  style=" margin:auto;" width="100" src="/event/{{$data->image}}" alt="">
                        </div>


                        <div class="dev_deg">
                            <label for="">Update image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="dev_deg">
                            <input class="btn btn-primary" type="submit" value="Update event" >
                        </div>
                    </form>
                </div>
          </div>
    </div>
 </div>

@include('admin.footer')

  </body>
</html>