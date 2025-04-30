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
    </style>
</head>
<body>
    @include('user.header')
    @include('user.sidebar')

    <div class="container-fluid px-4" style="background-color: white; min-height: 100vh; padding-top: 30px;">
        <h2 style="color: rgb(234, 88, 12); font-weight: bold;">Mes Réservations Approuvées</h2>

        <div class="table-responsive mt-4">
            <table class="table table-bordered shadow-sm">
                <thead style="background-color: rgb(234, 88, 12); color: white;">
                    <tr>
                        <th>Event title</th>
                        <th>Visitor</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Status</th>
                        <th>Prix</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="color:black;">
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->event->event_title }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td><span class="badge bg-success">Approuvé</span></td>
                            <td>{{ $item->event->price }}</td>
                            <td>
                                <img src="/event/{{ $item->event->image }}" alt="event image" style="height: 40px;">
                            </td>
                            <td>
                                <a class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ?')" href="{{ url('delete_booking', $item->id) }}">Supprimer</a>
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
