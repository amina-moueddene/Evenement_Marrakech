<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
      @include('home.css')
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
      <style type="text/css">
         /* Global Styles */
         body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
         }

         label {
            display: inline-block;
            width: 100%;
         }
         input, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-shadow: none;
            font-size: 18px;
         }
         input:focus, textarea:focus {
            border-color: #FF8C00;
            outline: none;
         }

         /* Event Section */
         .event img {
            height: 300px;
            width: 100%;
            object-fit: cover;
            border-radius: 12px;
         }



         .card-custom {
            border-radius: 12px;
            background-color: #fff;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1), 0 4px 15px rgba(255, 140, 0, 0.2);
            padding: 20px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
         }

         .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15), 0 6px 25px rgba(255, 140, 0, 0.3);
         }

         .event h2 {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
         }

         .event p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
         }

         /* Price Tag */
         .price-tag {
            background-color: rgba(255, 140, 0, 0.8); /* Transparent orange */
            color: #fff;
            padding: 8px 15px;
            font-size: 18px; /* Slightly smaller font size */
            border-radius: 25px;
            font-weight: bold;
            width: auto;
            max-width: 180px; /* Limit width */
            margin: 20px auto;
            display: block; /* Ensure it behaves as a block element */
            text-align: center;
         }

         .price-tag i {
            margin-right: 8px;
            font-size: 20px;
         }

         /* Event Details Container */
         .event-details {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            margin-top: 20px;
         }

         .event-detail {
            flex: 1;
            min-width: 200px;
            max-width: 350px;
         }

         .event-detail h4 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
         }

         .event-detail p {
            font-size: 16px;
            color: #555;
         }

         /* Booking Form */
         .booking-card {
            background-color: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
         }

         .orange-btn {
            background-color: #FF8C00;
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
            padding: 14px;
            font-size: 18px;
            width: 100%;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
         }

         .orange-btn:hover {
            background-color: #E07B00; /* Darker Orange for hover */
         }

         /* Responsive Design */
         @media (max-width: 768px) {
            .event img {
               height: auto;
               width: 100%;
            }

            .event-details {
               flex-direction: column;
               gap: 20px;
            }
         }

         .star-rating .rating-group {
        display: inline-flex;
        flex-direction: row-reverse;
    }
    
    .star-rating .star-label {
        color: #ddd;
        cursor: pointer;
        font-size: 1.5rem;
        padding: 0 0.2rem;
    }
    
    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #f8ce0b;
    }

    .comment-container {
   transition: background-color 0.2s;
}

.comment-container:hover {
   background-color: #f9f9f9;
}

.avatar {
   width: 48px;
   height: 48px;
   border-radius: 50%;
   background-color: #e9ecef;
   display: flex;
   align-items: center;
   justify-content: center;
   font-weight: bold;
   color: #6c757d;
}

.star-rating .rating-group {
   display: inline-flex;
   flex-direction: row-reverse;
}

.star-rating .star-label {
   color: #ddd;
   cursor: pointer;
   font-size: 1.5rem;
   padding: 0 0.2rem;
}

.star-rating input:checked ~ label,
.star-rating label:hover,
.star-rating label:hover ~ label {
   color: #f8ce0b;
}

.formatting-tools button {
   padding: 0.25rem 0.5rem;
   font-size: 0.875rem;
   border: none;
   background-color: transparent;
}

.formatting-tools button:hover {
   background-color: #e9ecef;
   border-radius: 4px;
}

/* Customisation du dropdown */
.dropdown-toggle::after {
   display: none;
}

.dropdown .dropdown-menu {
   box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
   border: none;
   border-radius: 0.5rem;
}

.dropdown-item {
   padding: 0.5rem 1rem;
}

.dropdown-item:active, .dropdown-item:focus {
   background-color: rgba(255, 140, 0, 0.1);
   color: #212529;
}

/* Bouton Submit */
button[type="submit"] {
   padding: 0.5rem 1.5rem;
   border-radius: 20px;
   font-weight: 500;
   border: none;
   transition: all 0.3s ease;
}

button[type="submit"]:hover {
   background-color: #E07B00 !important;
   transform: translateY(-1px);
}

      </style>
   </head>
   <body class="main-layout">
      <!-- loader  -->
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
         <div class="col-md-12 text-center mb-4">
            <div class="titlepage">
               <h2 class="section-title">Our Events</h2>
            </div>
         </div>
      </div>

      <div class="row">
         <!-- Event Details -->
         <div class="col-md-8 mb-4">
            <div id="serv_hover" class="event card-custom p-4 bg-white shadow-sm rounded-lg">
               <div class="event_img mb-4">
                  <figure>
                     <img class="w-full h-72 object-cover rounded-lg shadow-md" src="event/{{$event->image}}" alt="Event Image"/>
                  </figure>
               </div>
               <div class="bed_event">
                  <h2 style="color: #FF8C00; font-size: 1.25rem; font-weight: 600;">{{$event->event_title}}</h2>
                  <p style="text-align: justify; color: #555; margin-top: 0.5rem;">{{$event->description}}</p>
                  <div class="event-details">
                     <div class="event-detail">
                        <h4>Location</h4>
                        <p>{{$event->lieu}}</p>
                     </div>
                     <div class="event-detail">
                        <h4>Event type</h4>
                        <p>{{$event->event_type}}</p>
                     </div>
                     <div class="event-detail">
                        <h4>Date</h4>
                        <p>{{$event->date}}</p>
                     </div>
                  </div>
                  <!-- Price Tag -->
                  <div class="price-tag">
                     <i class="fas fa-tag"></i>{{$event->price}} DH
                  </div>
               </div>
            </div>
         </div>

         <!-- Booking Form -->
         <div class="col-md-4">
            <div class="card shadow-sm p-4 booking-card rounded-lg">
               <h4 class="text-center mb-4 text-orange-600 font-semibold">📅 Book a ticket</h4>

               @if(session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     {{ session()->get('message') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
               @endif

               @if($errors)
                  @foreach($errors->all() as $error)
                     <div class="alert alert-danger">{{ $error }}</div>
                  @endforeach
               @endif

               <form action="{{ url('add_booking', $event->id) }}" method="POST">
                  @csrf
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" name="name" class="form-control"
                        @if(Auth::id()) value="{{ Auth::user()->name }}" @endif>
                  </div>

                  <div class="form-group">
                     <label for="email">Email</label>
                     <input type="email" name="email" class="form-control"
                        @if(Auth::id()) value="{{ Auth::user()->email }}" @endif>
                  </div>

                  <div class="form-group">
                     <label for="phone">Phone number</label>
                     <input type="text" name="phone" class="form-control"
                        @if(Auth::id()) value="{{ Auth::user()->phone }}" @endif>
                  </div>

                  <button type="submit" class="btn orange-btn">Book now</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Section des commentaires -->
<div class="container mt-5 mb-5">
   <div class="card shadow-sm rounded-lg">
      <div class="card-body p-4">
         <!-- Formulaire d'ajout de commentaire -->
         @if(Auth::check())
            <div class="mb-4">
               <div class="form-floating mb-3">
                  <form action="{{ route('events.comments.store', $event) }}" method="POST">
                     @csrf
                     <div class="border rounded-lg p-3 bg-light">
                        <h5 class="mb-3">Add a comment...</h5>
                        
                        <!-- Étoiles de notation -->
                        <div class="mb-3">
                           <div class="star-rating">
                              <div class="rating-group">
                                 @for($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="rating-{{ $i }}" name="rating" value="{{ $i }}" class="d-none" {{ old('rating') == $i ? 'checked' : '' }}>
                                    <label for="rating-{{ $i }}" class="star-label">
                                       <i class="fas fa-star"></i>
                                    </label>
                                 @endfor
                              </div>
                           </div>
                           @error('rating')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                        
                        <!-- Zone de texte pour le commentaire -->
                        <div class="mb-3">
                           <textarea name="content" id="content" rows="3" class="form-control @error('content') is-invalid @enderror" placeholder="Partagez votre expérience...">{{ old('content') }}</textarea>
                           @error('content')
                              <span class="invalid-feedback">{{ $message }}</span>
                           @enderror
                        </div>
                        
                        <!-- Options de formatage et bouton de soumission -->
                        <div class="d-flex justify-content-between align-items-center">
                           <button type="submit" class="btn" style="background-color: #FF8C00; color: white;">Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         @else
            <div class="alert alert-info mb-4">
               <a href="{{ route('login') }}" class="alert-link">Log in</a> to write a comment.
            </div>
         @endif

         <!-- En-tête de section commentaires -->
         <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Comments <span class="badge rounded-pill" style="background-color: #FF8C00;">{{ $event->comments->count() }}</span></h4>
            <div class="dropdown">
               <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-sort-amount-down"></i> Most recent <i class="fas fa-chevron-down"></i>
               </button>
               <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                  <li><a class="dropdown-item" href="#">Most recent</a></li>
                  <li><a class="dropdown-item" href="#">Top rated</a></li>
                  <li><a class="dropdown-item" href="#">Oldest first</a></li>
               </ul>
            </div>
         </div>

         <!-- Liste des commentaires -->
         @if($event->comments->count() > 0)
            @foreach($event->comments as $comment)
               <div class="comment-container mb-4">
                  <div class="d-flex">
                     <!-- Avatar -->
                     <div class="me-3">
                        <div class="avatar" style="width: 48px; height: 48px; border-radius: 50%; background-color: #e9ecef; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #6c757d;">
                           {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                        </div>
                     </div>
                     
                     <!-- Contenu du commentaire -->
                     <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                           <div>
                              <h6 class="mb-0 fw-bold">{{ $comment->user->name }}</h6>
                              <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                           </div>
                           <div class="rating">
                              @for($i = 1; $i <= 5; $i++)
                                 @if($i <= $comment->rating)
                                    <i class="fas fa-star" style="color: #f8ce0b;"></i>
                                 @else
                                    <i class="far fa-star" style="color: #ddd;"></i>
                                 @endif
                              @endfor
                           </div>
                        </div>
                        
                        <div class="comment-content mb-2">
                           <p class="mb-2">{{ $comment->content }}</p>
                        </div>
                        
                     </div>
                  </div>
               </div>
               <hr class="my-3">
            @endforeach
         @else
            <div class="text-center py-5">
               <i class="far fa-comment-dots fa-3x mb-3 text-muted"></i>
               <p class="text-muted">No comments yet. Be the first to give your opinion!</p>
            </div>
         @endif
      </div>
   </div>
</div>


<!-- end our_event -->

      <!-- footer -->
      @include('home.footer')

      <!-- Javascript files-->
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
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-JrA3U+UgZBfsh3Pzj6tEHO+e//7wMFzDb3gwzZxVXkq1q0+fUnk4o0QmFA7t5yH4" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-kyZXEJ03Jtl1p5j9J2fLJrH10rtFuZJ5amX+3eH7kNk6v9wZz7KqFzTf02Fq8yR2" crossorigin="anonymous"></script>
         
      <!-- JavaScript pour les étoiles -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const starLabels = document.querySelectorAll('.star-label');
        
        starLabels.forEach(label => {
            label.addEventListener('mouseover', function() {
                const labelFor = this.getAttribute('for');
                const rating = labelFor.split('-')[1];
                
                // Réinitialiser toutes les étoiles
                starLabels.forEach(l => l.style.color = '#ddd');
                
                // Colorier les étoiles appropriées
                for (let i = 5; i >= rating; i--) {
                    document.querySelector(`label[for="rating-${i}"]`).style.color = '#f8ce0b';
                }
            });
        });
        
        const ratingGroup = document.querySelector('.rating-group');
        ratingGroup.addEventListener('mouseleave', function() {
            starLabels.forEach(label => label.style.color = '#ddd');
            
            // Restaurer la sélection si une note est choisie
            const checkedInput = document.querySelector('.rating-group input:checked');
            if (checkedInput) {
                const rating = checkedInput.value;
                for (let i = 5; i >= rating; i--) {
                    document.querySelector(`label[for="rating-${i}"]`).style.color = '#f8ce0b';
                }
            }
        });
    });
</script>

   </body>
</html>
