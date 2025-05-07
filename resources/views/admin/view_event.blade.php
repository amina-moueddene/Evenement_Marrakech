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
      
      .event-image {
          height: 70px;
          width: auto;
          border-radius: 4px;
          object-fit: cover;
      }
      
      .description-cell {
          max-width: 250px;
          overflow: hidden;
          text-overflow: ellipsis;
          text-align: left;
      }
    </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')

    <div class="container-fluid px-4" style="background-color: white; min-height: 100vh; padding-top: 30px;">
      <h2 style="color: rgb(234, 88, 12); font-weight: bold;">Liste des Événements</h2>

      <div class="table-responsive mt-4">
        <table class="table table-bordered shadow-sm">
          <thead style="background-color: rgb(234, 88, 12); color: white;">
            <tr>
              <th>Titre de l'événement</th>
              <th>Description</th>
              <th>Prix</th>
              <th>Date</th>
              <th>Lieu</th>
              <th>Type d'événement</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody style="color: black;">
            @foreach($data as $item)
            <tr>
              <td>{{ $item->event_title }}</td>
              <td class="description-cell">{!! Str::limit($item->description, 150) !!}</td>
              <td>{{ $item->price }}</td>
              <td>{{ $item->date }}</td>
              <td>{{ $item->lieu }}</td>
              <td>{{ $item->event_type }}</td>
              <td>
                <img class="event-image" src="event/{{ $item->image }}" alt="Event Image">
              </td>
              <td>
                <a href="{{url('event_update', $item->id)}}" class="btn btn-sm btn-warning mb-1">Modifier</a>
                <a onclick="return confirm('Voulez-vous vraiment supprimer cet événement ?')" href="{{url('event_delete', $item->id)}}" class="btn btn-sm btn-danger">Supprimer</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>