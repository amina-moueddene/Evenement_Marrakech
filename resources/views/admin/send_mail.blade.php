<!DOCTYPE html>
<html lang="fr">
<head> 
  <base href="/public">
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

    input[type="text"],
    textarea {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1px solid #e2e8f0;
      border-radius: var(--border-radius);
      font-size: 1rem;
      transition: all 0.3s ease;
      background-color: #fff;
      color: #000;
    }

    input[type="text"]:focus,
    textarea:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(234, 88, 12, 0.2);
    }

    textarea {
      min-height: 120px;
      resize: vertical;
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
          <h1>Envoyer un e-mail à {{$data->name}}</h1>
        </div>
        
        <div class="form-body">
          <form action="{{url('mail',$data->id)}}" method="post">
            @csrf
            
            <div class="form-group">
              <label for="greeting">Salutation</label>
              <input type="text" id="greeting" name="greeting" placeholder="Ex: Bonjour {{$data->name}}">
            </div>

            <div class="form-group">
              <label for="body">Corps du message</label>
              <textarea id="body" name="body" placeholder="Entrez le contenu principal de votre e-mail"></textarea>
            </div>

           

            <div class="form-group">
              <label for="endline">Phrase de conclusion</label>
              <input type="text" id="endline" name="endline" placeholder="Ex: Cordialement,">
            </div>

            <button type="submit" class="btn-primary">Envoyer l'e-mail</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('admin.footer')
</body>
</html>