<!-- filepath: resources/views/home/event.blade.php -->

<div class="our_event">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Our Event</h2>
                    <p>
                        Découvrez les événements incontournables de Marrakech : une ville où la culture, le sport et la musique se rencontrent pour créer des expériences uniques et inoubliables.
                        Explorez notre sélection d'événements adaptés à tous les goûts et préparez-vous à vivre la magie de Marrakech à chaque instant.
                    </p>

                    {{-- Filter Buttons with Bootstrap --}}
                    <div class="mb-4 mt-3 text-center">
                        <label class="form-label d-block mb-3 fw-semibold">Filtrer par catégorie :</label>
                        <div class="d-flex flex-wrap justify-content-center gap-2">

                            {{-- Tous --}}
                            <a href="{{ route('home', ['event' => 'all']) }}"
                               class="btn {{ $event == 'all' ? 'btn-warning text-white' : 'btn-outline-warning' }} rounded-pill px-4 py-2 fw-semibold">
                                Tous
                            </a>

                            {{-- Culturel --}}
                            <a href="{{ route('home', ['event' => 'culturel']) }}"
                               class="btn {{ $event == 'culturel' ? 'btn-primary text-white' : 'btn-outline-primary' }} rounded-pill px-4 py-2 fw-semibold">
                                Culturel
                            </a>

                            {{-- Sportif --}}
                            <a href="{{ route('home', ['event' => 'sportif']) }}"
                               class="btn {{ $event == 'sportif' ? 'btn-success text-white' : 'btn-outline-success' }} rounded-pill px-4 py-2 fw-semibold">
                                Sportif
                            </a>
             {{-- Artistique --}}
<a href="{{ route('home', ['event' => 'artistique']) }}"
   class="btn rounded-pill px-4 py-2 fw-semibold"
   style="{{ $event == 'artistique'
              ? 'background-color:#8e44ad; color:white; border:1px solid #8e44ad;'
              : 'background-color:transparent; color:#8e44ad; border:1px solid #8e44ad;' }}"
   onmouseover="this.style.backgroundColor='#8e44ad'; this.style.color='white';"
   onmouseout="this.style.backgroundColor='{{ $event == 'artistique' ? '#8e44ad' : 'transparent' }}'; this.style.color='{{ $event == 'artistique' ? 'white' : '#8e44ad' }}';">
    artistique
</a>

{{-- Gastronomique --}}
<a href="{{ route('home', ['event' => 'gastronomique']) }}"
   class="btn rounded-pill px-4 py-2 fw-semibold"
   style="{{ $event == 'gastronomique'
              ? 'background-color:#e67e22; color:white; border:1px solid #e67e22;'
              : 'background-color:transparent; color:#e67e22; border:1px solid #e67e22;' }}"
   onmouseover="this.style.backgroundColor='#e67e22'; this.style.color='white';"
   onmouseout="this.style.backgroundColor='{{ $event == 'gastronomique' ? '#e67e22' : 'transparent' }}'; this.style.color='{{ $event == 'gastronomique' ? 'white' : '#e67e22' }}';">
    gastronomique
</a>

                            {{-- Musical --}}
                            <a href="{{ route('home', ['event' => 'musical']) }}"
                               class="btn {{ $event == 'musical' ? 'btn-danger text-white' : 'btn-outline-danger' }} rounded-pill px-4 py-2 fw-semibold">
                                Musical
                            </a>



                        </div>
                    </div>
                    {{-- End Filter --}}
                </div>
            </div>
        </div>

        <div class="row">
            @if($event->isEmpty())
                <div class="col-md-12">
                    <p>No events found for this category. Please try another selection.</p>
                </div>
            @else
                @foreach($event as $e)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="event border rounded shadow-sm p-3 h-100 d-flex flex-column justify-content-between">
                            <div class="event_img mb-2">
                                <figure>
                                    <img style="height:200px; width:100%; object-fit:cover;" src="{{ asset('event/' . $e->image) }}" alt="{{ $e->event_title }}" />
                                </figure>
                            </div>
                            <div class="bed_event">
                                <h3>{{ $e->event_title }}</h3>
                                <p class="my-2">
                                    {!! Str::limit($e->description, 100) !!}
                                </p>
                                <a class="btn text-white mt-auto" style="background-color:#E5C100; border-color:#E5C100;" href="{{ route('event_details', $e->id) }}">
                                    Event details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
