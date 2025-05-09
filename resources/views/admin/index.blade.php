<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    @php
        $newClients = \App\Models\User::count();
        $newEvents = \App\Models\event::count();
    @endphp
    @include('admin.body', ['newClients' => $newClients, 'newEvents' => $newEvents])
</body>
</html>