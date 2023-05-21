@extends('layout')

@section('main')
    <!-- main -->
    <main class="container">
      <section class="single-blog-post">
        <h1>Par mani:</h1>
        <div class="single-blog-post-ContentImage" data-aos="fade-left">
          <img src="{{asset('images/me.jpg')}}" alt="" />
        </div>

        <div>
          <p class="about-text">
            Sveiki! Esmu cetrutā kursa studente kura drīz pabeigs programmētājas profesiju un
            kas slimo ar cukura diabētu jau 6 gadus. Savas dzīves laikā esmu
            secinājusi, ka nav nevienas mājaslapas, kas digitalizētu cukura diabēta dienasgrāmatu, kuras rakstītšanas 
            process ir ilgs un ,manuprāt, mokošs.
            <br /><br />
            Tādēļ es radīju šo mājaslapu priekš cilvēkiem kā mēs, kur varēs apstīties interesantus rakstus
            un radīt savu cukura dienasgrāmatu un to ērti izmantot elektroniskajā vidē, kur ir arī plānots
            , ka tavs ārsts varēs apskatīties tavus datus jebkurā dienakts laikā. Tev būs iespēja izprintēt 
            arī PDF failu kuru varēsi sazīmēt un analizēt savas slimības gaitu kopā ar ārstu. Tiek piedāvāts arī
            devu kaulkulators kuru varat droši izmantot, ja gadījumā pašam slinkums rēķināt devu ēdienam.
            <br /><br />
            Jauku Jums dienu un priecīgu mājaslapas izmantošanu!
          </p>
        </div>
      </section>
    </main>
@endsection