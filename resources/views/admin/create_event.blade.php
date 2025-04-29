<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Event Form</title>
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
      transition: all 0.3s ease;
      background-color: #fff;
    }
    input[type="date"],
    input[type="text"]:focus,
    input[type="number"]:focus,
    select:focus,
    textarea:focus {
      outline: none;
      /* border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(234, 88, 12, 0.2); */
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
      display: flex;
      flex-direction: column;
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
      right: 0;
      left: 0;
      z-index: 1;
      height: 2.75rem;
      padding: 0.75rem 1rem;
      background-color: #f1f5f9;
      border: 1px dashed #cbd5e1;
      border-radius: var(--border-radius);
      font-weight: 400;
      color: #64748b;
      text-align: center;
      transition: all 0.3s ease;
    }

    .custom-file-input:focus ~ .file-input-label,
    .custom-file-input:hover ~ .file-input-label {
      border-color: var(--primary-color);
      background-color: var(--primary-light);
      color: var(--primary-color);
    }

    .file-spacer {
      height: 2.75rem;
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
      transition: background-color 0.3s ease;
      width: 100%;
      margin-top: 1rem;
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
    }

    /* Responsive adjustments */
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
          <h1>Add New Event</h1>
        </div>
        
        <div class="form-body">
          <form action="{{url('add_event')}}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
              <label for="event-title">Event Title</label>
              <input type="text" id="event-title" name="title" style="color: #000" st placeholder="Enter event title">
            </div>

            <div class="form-group">
              <label for="event-description">Description</label>
              <textarea id="event-description" name="description"  style="color: #000"placeholder="Enter event description"></textarea>
            </div>

            <div class="form-group">
              <label for="event-price">Price</label>
              <input type="number" id="event-price" name="price" style="color: #000" placeholder="Enter event price">
            </div>

            <div class="form-group">
              <label for="event-date">Date</label>
              <input type="date" id="event-date" name="date" style="color: #000" >
            </div>

            <div class="form-group">
              <label for="event-type">Event Type</label>
              <select id="event-type"  style="color: #000"  name="type">
                <option value="musical">Musical</option>
                <option value="culturel">Culturel</option>
                <option value="gastronomique">Gastronomique</option>
                <option value="sportif">Sportif </option>
                <option value="artistique">Artistique </option>
              </select>
            </div>

            <div class="form-group">
              <label for="lieu">Place</label>
                 <input type="text" id="event-place" name="lieu" style="color: #000" placeholder="Enter event place">
            </div>

            <div class="form-group">
              <label for="event-image">Event Image</label>
              <div class="file-input-wrapper">
                <input type="file" id="event-image" name="image" class="custom-file-input">
                <div class="file-spacer"></div>
                <span class="file-input-label">Choose an image file</span>
              </div>
            </div>

            <button type="submit" class="btn-primary">Add Event</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('admin.footer')

  <script>
    // Update file input label with selected filename
    document.getElementById('event-image').addEventListener('change', function(e) {
      const fileName = e.target.files[0]?.name || 'Choose an image file';
      const label = this.nextElementSibling.nextElementSibling;
      label.textContent = fileName;
    });
  </script>
</body>
</html>