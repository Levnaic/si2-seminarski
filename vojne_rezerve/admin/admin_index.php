<!-- php deo -->
<?php
  session_start();

  if(!isset($_SESSION['Uloga']) && !$_SESSION['Uloga']=='admin')
    header("Location: ..\userLogin.php");
  
?>
<!-- html -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../img/grb_tab.png">
    <link rel="stylesheet" href="../css/admin_index.css" />
    <title>Vojska Srbije</title>
  </head>
  <body>
    <?php include '../delovi/admin_header.php' ?>
    <section class="headlineSection observeObject">
      <h1>Evidencija članova vojnih rezervi</h1>
    </section>
    <section class="mainTextSection">
      <div class="predText">
        <p>
          Ovo je online aplikacija koja služi za evidenciju vojnih rezervi
          Vojske Republike Srbije. <br /><br />
          <b>Ministarstvo odbrane Republike Srbije</b> počev od oktobra 2018.
          godine, širom zemlje sprovodi obuku rezervnog sastava Vojske Srbije za
          lica koja nisu odslužila vojni rok.
        </p>
      </div>

      <h2>Ko su pripadnici rezervnog sastava?</h2>
      <p>Rezervni sastav čine:</p>
      <ul>
        <li>
          svi muškarci i žene koji su odlužili vojni rok/civilnu službu, i to od
          dana otpusta do dana prestanka vojne obaveze;
        </li>
        <li>
          svi muškarci koji su navršili 30 godina, a pri tom nisu odslužili
          vojni rok.
        </li>
      </ul>
      <p>
        Vojne obaveza, time i obaveza u rezervnom sastavu, prestaje u
        kalendarskoj godini u kojoj vojni obaveznik navršava 60 godina
        (muškarci), odnosno 50 godina (žene).
      </p>
      <h2>Kada žene učestvuju u rezervnom sastavu?</h2>
      <p>
        Žene koje dobrovoljno odsluže vojni rok sa oružjem podležu obavezi
        služenja u rezervnom sastavu. One se uvode u evidenciju rezervnog
        sastava i u miru mogu biti pozvane na vojne vežbe i vežbe civilne
        zaštite.
      </p>
      <h2>
        Kome može da bude upućen poziv za vojnu obuku u rezervnom sastavu?
      </h2>
      <p>Poziv za vojnu obuku može biti upućen</p>
      <ul>
        <li>
          muškarcima od navršene 30. godine koji nisu služili vojni rok ni sa ni
          bez oružja;
        </li>
        <li>muškarcimas i ženama koji su služili vojni rok sa oružjem.</li>
      </ul>
      <h2>Koliko može da traje vojna obuka u toku godine?</h2>
      <p>Obučavanje može da traje najduže</p>
      <ul>
        <li>
          25 dana u toku kalendarske godine za pripadnike pasivne rezerve koji
          nisu prethodno odslužili vojni;
        </li>
        <li>
          20 dana u toku kalendarske godine za pripadnike pasivne rezerve koji
          su odslužili vojni rok sa oružjem.
        </li>
      </ul>
      <p>
        Pripadnici rezervnog sastava koji su u toku jedne godine bili na vojnoj
        obuci mogu se na obuku pozivati i narednih godina, sve do prestanka
        vojne obaveze.
      </p>
      <p>
        <a href="https://www.mod.gov.rs/cir/13680/saopstenje-13680"
          >Prema zvaničnom saopštenju Ministarstva odbrane Republike Srbije</a
        >, celokupan proces obuke u narednom periodu biće realizovan u dve faze
        od po 15 radnih dana u dve kalendarske godine.
      </p>
      <h2>Pod kojim uslovima je moguće odložiti obuku?</h2>
      <p>
        Odlaganje vojne obuke za lice u rezervnom sastavu moguće je u sledećim
        situacijama:
      </p>
      <ul>
        <li>u slučaju bolesti;</li>
        <li>
          ukoliko je na vežbu/obuku istovremeno pozvano drugo lice iz njegovog
          domaćinstva, ili se ono već nalazi na služenju vojnog roka;
        </li>
        <li>
          u slučaju da odazivanje pozivu onemogućava polaganje ispita ili
          završetak školske godine;
        </li>
        <li>
          ako se u vreme vežbe/obuke lice nalazi na pripremama za učešće na
          evropskim i svetskim sportskim takmičenjima ili Olimpijskim igrama;
        </li>
        <li>
          ako u vreme obuke/vežbe lice učestvuje u međunarodnim naučnim,
          istraživačkim i umetničkim manifestacijama ili treba da obavlja
          poslove od izuzetnog značaja za Republiku Srbiju;
        </li>
        <li>
          ukoliko je domaćinstvo lica u pitanju dovedeno u težak materijalni ili
          socijalni položaj, bilo usled delovanja elementarne nepogode, bilo
          usled smrti ili teške bolesti člana domaćinstva;
        </li>
        <li>
          u slučaju da u mestu boravišta lica u pitanju vlada zarazna bolest;
        </li>
        <li>
          usled zahteva državnog organa (privrednog društva ili drugog pravnog
          lica) za odlaganje obuke/vežbe;
        </li>
        <li>
          rezervisti koji se bavi poljoprivrednom delatnošću vežba se može
          odložiti zbog neodložnih radova, ukoliko u domaćinstvu nema drugog
          sposobnog lica za obavljanje takve delatnosti.
        </li>
      </ul>
      <p>
        Zahtev za odlaganje podnosi se nadležnom teritorijalnom organu u roku od
        osam dana od prijema poziva.
      </p>
      <h2>Da li prigovor savesti oslobađa lice od vojne obuke?</h2>
      <p>
        Ustavom je zagarantovano pravo na prigovor savesti, odnosno pravo
        građana da odbiju vršenje vojne obaveze sa oružjem. To pravo može biti
        ograničeno za sledeća lica:
      </p>
      <ul>
        <li>lice koje poseduje dozvolu za nošenje ili držanje oružja;</li>
        <li>
          lice koje je u poslednje tri godine pre dostavljanja poziva podnelo
          zahtev za nošenje ili držanje oružja;
        </li>
        <li>
          lice koje je pravosnažno osuđivano za krivično delo za koje se goni po
          službenoj dužnosti ili za krivično delo sa elementima nasilja za koje
          se goni po privatnoj tužbi;
        </li>
        <li>
          lice koje je u poslednje tri godine pre dostavljanja poziva
          pravosnažno kažnjavano za izazivanje ili učešće u neredima i tučama, i
          protiv koga je pokrenut krivični postupak za krivično delo za koje se
          goni po službenoj dužnosti, osim za krivično delo izbegavanja vojne
          obaveze.
        </li>
      </ul>
    </section>
    <?php include '../delovi/admin_footer.php' ?>
    <script src="../js/nav.js"></script>
  </body>
</html>
