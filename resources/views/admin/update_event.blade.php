<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <base href="/public">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Event</title>
  @include('admin.css')
  <style>
    :root {
      --primary-color: rgb(234, 88, 12);
      --primary-light: rgba(234, 88, 12, 0.1);
      --primary-dark: rgb(194, 65, 12);
      --text-light: #f8fafc;
      --text-dark: #334155;
      --border-radius: 8px;
    }

    .page-content {
      background-color: #f8fafc;
      min-height: 100vh;
      padding: 2rem 0;
    }

    .form-container {
      max-width: 650px;
      margin: 0 auto;
      background-color: white;
      border-radius: var(--border-radius);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .form-header {
      background-color: var(--primary-color);
      color: white;
      padding: 1.5rem 2rem;
      text-align: center;
      border-bottom: 4px solid var(--primary-dark);
    }

    .form-header h1 {
      margin: 0;
      font-size: 2rem;
      font-weight: 700;
    }

    .form-body {
      padding: 2rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      font-weight: 600;
      margin-bottom: 0.5rem;
      color: var(--text-dark);
      font-size: 1rem;
    }

    input[type="date"],
    input[type="text"],
    input[type="number"],
    select,
    textarea {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1px solid #e2e8f0;
      border-radius: var(--border-radius);
      font-size: 1rem;
      background-color: #fff;
      color: #000;
    }

    textarea {
      min-height: 120px;
      resize: vertical;
    }

    select {
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23475569' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 1rem center;
      background-size: 1rem;
      padding-right: 2.5rem;
    }

    .file-input-wrapper {
      position: relative;
    }

    .custom-file-input {
      position: relative;
      z-index: 2;
      width: 100%;
      height: 100%;
      opacity: 0;
      cursor: pointer;
    }

    .file-input-label {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      padding: 0.75rem 1rem;
      background-color: #f1f5f9;
      border: 1px dashed #cbd5e1;
      border-radius: var(--border-radius);
      text-align: center;
      color: #64748b;
    }

    .btn-primary {
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: var(--border-radius);
      padding: 0.75rem 1.5rem;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      width: 100%;
      margin-top: 1rem;
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
    }

    .form-image-preview {
      display: block;
      margin: 1rem auto;
      border-radius: var(--border-radius);
    }

    @media (max-width: 768px) {
      .form-body {
        padding: 1.5rem;
      }
    }
  </style>
</head>
<body>
  @include('admin.header')
  @include('admin.sidebar')

  <div class="page-content">
    <div class="container-fluid">
      <div class="form-container">
        <div class="form-header">
          <h1>Update Event</h1>
        </div>

        <div class="form-body">
          <form action="{{url('edit_event',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="title">Event Title</label>
              <input type="text" id="title" name="title"  style="color: #000"value="{{$data->event_title}}">
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea id="description" name="description" style="color: #000">{{$data->description}}</textarea>
            </div>

            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" id="price" name="price" style="color: #000" value="{{$data->price}}">
            </div>

            <div class="form-group">
              <label for="type">Event Type</label>
              <select id="type" name="type" style="color: #000">
                <option selected value="{{$data->event_type}}" >{{$data->event_type}}</option>
                <option value="musical">Musical</option>
                <option value="culturel">Culturel</option>
                <option value="gastronomique">Gastronomique</option>
                <option value="sportif">Sportif </option>
                <option value="artistique">Artistique </option>
              </select>
            </div>

            <div class="form-group">
              <label for="event-date">Date</label>
              <input type="date" id="event-date" name="date" style="color: #000" value="{{$data->date}}" >
            </div>


            <div class="form-group">
              <label for="lieu">Place</label>
                 <input type="text" id="event-place" name="lieu" style="color: #000" value="{{$data->lieu}}">
            </div>

            

            <div class="form-group">
              <label>Current Image</label>
              <img src="/event/{{$data->image}}" alt="Current Image" width="120" class="form-image-preview">
            </div>

            <div class="form-group">
              <label for="image">Update Image</label>
              <div class="file-input-wrapper">
                <input type="file" name="image" id="image" class="custom-file-input">
                <span class="file-input-label">Choose an image file</span>
              </div>
            </div>

            <button type="submit" class="btn-primary">Update Event</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('admin.footer')

  <script>
    document.getElementById('image').addEventListener('change', function(e) {
      const fileName = e.target.files[0]?.name || 'Choose an image file';
      const label = this.nextElementSibling;
      label.textContent = fileName;
    });
  </script>
</body>
</html>
