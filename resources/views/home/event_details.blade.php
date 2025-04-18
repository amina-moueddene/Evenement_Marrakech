<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .bed_event h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .bed_event p {
            line-height: 1.6;
            color: #555;
        }

        .bed_event h3, .bed_event h4 {
            color: #555;
            margin-bottom: 10px;
        }

        .date-container {
            display: flex;
            align-items: center;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .date-icon {
            font-size: 24px;
            color: #E5C100;
            margin-right: 15px;
        }

        .date-label {
            display: block;
            font-size: 14px;
            color: #777;
        }

        .date-value {
            margin: 0;
            font-weight: 600;
            color: #333;
        }

        .booking-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .booking-title {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #E5C100;
            padding-bottom: 10px;
        }

        .btn-book {
            background-color: #E5C100;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-book:hover {
            background-color: #c9a900;
            transform: translateY(-2px);
        }

        .event-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="main-layout">
    <!-- loader -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
    </div>
    <!-- end loader -->

    <!-- header -->
    <header>
        @include('home.header')
    </header>

    <!-- our_event -->
    <div class="our_event py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage text-center mb-5">
                        <h2>Event Details</h2>
                        <p>Discover and book your perfect event experience</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="event mb-4">
                        <div class="event-image mb-4">
                            <figure><img src="{{$event->image}}" alt="{{$event->event_title}}"/></figure>
                        </div>
                        <div class="bed_event">
                            <h2>{{$event->event_title}}</h2>
                            <p>{{$event->description}}</p>

                            <div class="event-details mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4><i class="fas fa-map-marker-alt me-2" style="color: #E5C100;"></i> Location: {{$event->lieu}}</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h4><i class="fas fa-tag me-2" style="color: #E5C100;"></i> Event Type: {{$event->event_type}}</h4>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <h3><i class="fas fa-dollar-sign me-2" style="color: #E5C100;"></i> Price: {{$event->price}}</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="date-container">
                                            <div class="date-icon">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <div class="date-info">
                                                <span class="date-label">Event Date</span>
                                                <h3 class="date-value">{{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="booking-form">
                        <h1 class="booking-title">Book This Event</h1>

                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif

                        <form action="{{url('add_booking',$event->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user me-2"></i>Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    @if(Auth::id())
                                        value="{{Auth::user()->name}}"
                                    @endif
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope me-2"></i>Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    @if(Auth::id())
                                        value="{{Auth::user()->email}}"
                                    @endif
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="phone"><i class="fas fa-phone me-2"></i>Phone</label>
                                <input type="tel" id="phone" name="phone" class="form-control"
                                    @if(Auth::id())
                                        value="{{Auth::user()->phone}}"
                                    @endif
                                    required>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-book">
                                    <i class="fas fa-ticket-alt me-2"></i> Book Event
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end our_event -->

    @include('home.footer')

    <!-- Javascript files-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(function(){
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);
        });
    </script>
</body>
</html>
