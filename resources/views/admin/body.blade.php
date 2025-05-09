<div class="page-content" style="background-color: white; min-height: 100vh;">
    <div class="page-header" style="background-color: white ; color: white; padding: 20px; ">
        
    </div>
    <section class="no-padding-top no-padding-bottom" style="padding: 20px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block" style="background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 20px;">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon" style="color: rgb(234, 88, 12);"><i class="icon-user-1"></i></div>
                                <H3 style="color: #000 ">New Clients</H3>
                            </div>
                            <div class="number dashtext-1" style="color: rgb(234, 88, 12); font-size: 1.5rem;">{{ $newClients }}</div>
                        </div>
                        <div class="progress progress-template" style="height: 8px; border-radius: 4px; background-color: #f1f1f1;">
                            <div role="progressbar" style="width: 100%; background-color: rgb(234, 88, 12);" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block" style="background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 20px;">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon" style="color: rgb(234, 88, 12);"><i class="icon-contract"></i></div>
                                <H3 style="color: #000 ">New Events</H3>
                            </div>
                            <div class="number dashtext-2" style="color: rgb(234, 88, 12); font-size: 1.5rem;">{{ $newEvents }}</div>
                        </div>
                        <div class="progress progress-template" style="height: 8px; border-radius: 4px; background-color: #f1f1f1;">
                            <div role="progressbar" style="width: 100%; background-color: rgb(234, 88, 12);" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Events Section -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <h2 style="color: rgb(234, 88, 12); font-weight: bold;">Recent Events</h2>
                    
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered shadow-sm">
                            <thead style="background-color: rgb(234, 88, 12); color: white;">
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody style="color:black;">
                                @php
                                    $events = \App\Models\Event::latest()->take(5)->get();
                                @endphp
                                @foreach($events as $event)
                                <tr>
                                    <td>{{ $event->event_title }}</td>
                                    <td>{{ $event->date }}</td>
                                    <td>{{ $event->lieu }}</td>
                                    <td>{{ $event->price }} MAD</td>
                                    <td>
                                        <a href="{{ url('event_update/'.$event->id) }}" class="btn btn-sm btn-info">
                                            <i class="icon-pencil-case"></i> Edit
                                        </a>
                                        <a href="{{ url('event_delete/'.$event->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">
                                            <i class="icon-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JavaScript files-->
<script src="admin/vendor/jquery/jquery.min.js"></script>
<script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="admin/vendor/jquery.cookie/jquery.cookie.js"></script>
<script src="admin/vendor/chart.js/Chart.min.js"></script>
<script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="admin/js/front.js"></script>

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