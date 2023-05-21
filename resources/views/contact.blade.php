@extends('layout')

@section('main')
    <!-- main -->
    <main class="container">
      <section id="contact-us">
        <h1>Sazinies ar mani!</h1>

        <!-- contact info -->
        <div class="container">
          <div class="contact-info">
            <div class="specific-info">
              <i class="fas fa-home"></i>
              <div>
                <p class="title">Trešais stāvs, VEF offiss</p>
                <p class="subtitle">Rīga</p>
              </div>
            </div>
            <div class="specific-info">
              <i class="fas fa-phone-alt"></i>
              <div>
                <a href="">+371 223 111 456 </a>
                <br />
                <a href="">+371 223 111 456</a>

                <p class="subtitle">Pirmdienas līdz Piekdienas 9:00 - 18:00</p>
              </div>
            </div>
            <div class="specific-info">
              <i class="fas fa-envelope-open-text"></i>
              <div>
                <a href="mailto:info@alphayo.co.ke">
                  <p class="title">cukuradienasgramata@gmail.com</p>
                </a>
                <p class="subtitle">Rakstiet mums jebkurā laikā!</p>
              </div>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="contact-form">
            <form action="" method="">
              <!-- Name -->
              <label for="name"><span>Vārds</span></label>
              <input type="text" id="name" name="name" value="" />

              <!-- Email -->
              <label for="email"><span>E-pasts</span></label>
              <input type="text" id="email" name="email" value="" />

              <!-- Subject -->
              <label for="subject"><span>Galvenā doma</span></label>
              <input type="text" id="Subject" name="subject" value="" />

              <!-- Message -->
              <label for="message"><span>Vēstule</span></label>
              <textarea id="message" name="message"></textarea>

               <!-- Button -->
              <input type="submit" value="Sūtīt" />
            </form>
          </div>
        </div>
      </section>
    </main>
@endsection