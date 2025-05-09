<!--  contact -->
<div id="contact" class="contact">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Contact Us</h2>
            </div>
         </div>

         @if(session()->has('message'))
         <div class="alert alert-success">
            <button type="button" class="close" data-bs-dismiss="alert">X</button>
            {{ session()->get('message') }}
         </div>
         @endif
      </div>
      
      <div class="row" style="box-shadow:8px 4px 8px 8px rgba(0, 0, 0, 0.2); background-color: #fff; margin-top :30px;">
         <!-- Map section on the left -->
         <div class="col-md-6" style="padding: 0;">
            <div class="map-responsive" style="height: 100%; min-height: 450px;">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.394868542655!2d115.25891!3d-8.506385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23d738f75247d%3A0x647a0d4ed7c2b51e!2sJl.%20Raya%20Ubud%20No.70%2C%20Ubud%2C%20Kecamatan%20Ubud%2C%20Kabupaten%20Gianyar%2C%20Bali%2080571!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid" 
                  width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
         </div>
         
         <!-- Contact form on the right -->
         <div class="col-md-6" style="padding: 40px;">
            <form id="request" class="main_form" method="post" action="{{url('contact')}}">
               @csrf
               <div class="row">
                  <div class="col-md-12 mb-4">
                     <input class="form-control" placeholder="Your Name" type="text" name="name" required
                        style="border: none; border-bottom :1px solid #eee; border-radius: 0; padding: 10px 0; font-size: 14px; box-shadow: none;">
                  </div>
                  <div class="col-md-12 mb-4">
                     <input class="form-control" placeholder="Your Email" type="email" name="email" required
                        style="border: none; border-bottom: 1px solid #eee; border-radius: 0; padding: 10px 0; font-size: 14px; box-shadow: none;">
                  </div>
                  <div class="col-md-12 mb-4">
                     <input class="form-control" placeholder="Your Phone" type="phone" name="phone" required
                        style="border: none; border-bottom :1px solid #eee; border-radius: 0; padding: 10px 0; font-size: 14px; box-shadow: none;">
                  </div>
                  <div class="col-md-12 mb-4">
                     <input class="form-control" placeholder="Your Subject" type="text" name="subject" required
                        style="border: none; border-bottom: 1px solid #eee; border-radius: 0; padding: 10px 0; font-size: 14px; box-shadow: none;">
                  </div>
                  <div class="col-md-12 mb-4">
                     <textarea class="form-control" placeholder="Your Message" name="message" required
                        style="border: none; border-bottom: 1px solid #eee; border-radius: 0; padding: 10px 0; min-height :100px; font-size: 14px; box-shadow: none;"></textarea>
                  </div>
                  <div class="col-md-12 text-center">
                     <button type="submit" class="send_btn" 
                        style="background-color: #ff7c33; color: white; border: none; border-radius:10px; cursor: pointer; transition: all 0.3s ease;font-size: 16px; padding: 10px 20px;">
                        SEND MESSAGE
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- end contact -->