<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
      table.table thead th {
          text-align: center;
          vertical-align: middle;
          font-size: 14px;
          font-weight: 600;
      }

      table.table tbody td {
          vertical-align: middle;
          text-align: center;
          font-size: 13px;
      }

      .btn {
          border-radius: 6px;
      }

      .badge {
          font-size: 13px;
          padding: 6px 10px;
          border-radius: 12px;
      }
      
      .gallery-img {
          height: 200px;
          width: 300px;
          object-fit: cover;
          border-radius: 8px;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          margin-bottom: 15px;
      }
      
      .gallery-card {
          margin-bottom: 30px;
      }

      .upload-form {
          background-color: #f8f9fa;
          padding: 25px;
          border-radius: 8px;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          margin-top: 30px;
          max-width: 600px;
          margin-left: auto;
          margin-right: auto;
      }

      .btn-success{
        background-color: rgb(234, 88, 12);
      }

      .form-label {
          color: #333;
          font-weight: 600;
          margin-bottom: 10px;
          display: block;
      }

      .file-input {
          margin-bottom: 15px;
      }
    </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')

    <div class="container-fluid px-4" style="background-color: white; min-height: 100vh; padding-top: 30px;">

      <div class="row mt-4">
        @foreach($gallary as $item)
          <div class="col-md-4 gallery-card">
            <div class="card shadow-sm">
              <img src="/gallary/{{$item->image}}" alt="Gallery Image" class="gallery-img">
              <div class="card-body text-center">
                <a onclick="return confirm('Voulez-vous vraiment supprimer cette image?')" href="{{url('delete_gallary',$item->id)}}" class="btn btn-sm btn-danger">Supprimer</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="upload-form">
        <h4 style="color: rgb(234, 88, 12); font-weight: bold; margin-bottom: 20px;">Ajouter une nouvelle image</h4>
        
        <form action="{{url('upload_gallary')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="gallery-image">Sélectionner une image</label>
            <input type="file" name="image" id="gallery-image" class="form-control file-input" required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success">Ajouter l'image</button>
          </div>
        </form>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>