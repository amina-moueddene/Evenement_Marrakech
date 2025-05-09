<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
      table.table thead th {
          text-align: center;
          vertical-align: middle;
          font-size: 14px;
          font-weight: 400;
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
    </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')

    <div class="container-fluid px-4" style="background-color: white; min-height: 100vh; padding-top: 30px;">
      <h2 style="color: rgb(234, 88, 12); font-weight: bold;">Liste des Messages</h2>

      <div class="table-responsive mt-4">
        <table class="table table-bordered shadow-sm">
          <thead style="background-color: rgb(234, 88, 12); color: white;">
            <tr>
              <th>Nom</th>
              <th>Email</th>
              <th>Téléphone</th>
              <th>Message</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody style="color:black;">
            @foreach($data as $item)
            <tr>
              <td>{{ $item->name }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->phone }}</td>
              <td>{{ $item->message }}</td>
              <td>
                <a class="btn btn-sm btn-success" href="{{ url('send_mail', $item->id) }}">Envoyer un mail</a>
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