
    <!-- our_event -->
    <div class="our_event">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Event</h2>
                        <p>Lorem Ipsum available, but the majority have suffered </p>

                        {{-- Boutons de filtre par type --}}
                        <div class="mb-4 mt-3">
                            <a href="{{ route('events.search', ['q' => 'culturel']) }}" class="btn btn-outline-primary m-1">Culturel</a>
                            <a href="{{ route('events.search', ['q' => 'sportif']) }}" class="btn btn-outline-success m-1">Sportif</a>
                            <a href="{{ route('events.search', ['q' => 'musical']) }}" class="btn btn-outline-warning m-1">Musical</a>
                            <a href="{{ route('events.search', ['q' => 'autre']) }}" class="btn btn-outline-secondary m-1">Autre</a>
                        </div>
                        {{-- Fin des boutons --}}
                    </div>
                </div>
            </div>

            {{-- Display filtered events --}}
            <div class="row">
                @foreach($events as $event)
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="event">
                        <div class="event_img">
                            <figure>
                                <img style="height:200px; width:350px;" src="event/{{$event->image}}" alt="#" />
                            </figure>
                        </div>
                        <div class="bed_event">
                            <h3>{{ $event->event_title }}</h3>
                            <p style="padding: 10px;">
                                {!! Str::limit($event->description, 100) !!}
                            </p>
                            <a class="btn btn-primary" style="--bs-btn-bg:#E5C100;--bs-btn-border-color:#E5C100;" href="{{ url('event_details', $event->id) }}">
                                Event details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end our_event -->
