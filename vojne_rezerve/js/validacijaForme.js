//promenjive
const polM = document.getElementById('polM');
const polZ = document.getElementById('polZ');
const btn = document.getElementById('formBtn');

//funkcije
function proveraRadio() {
  const kliknut = this.dataset.pol;

  if (kliknut === 'musko') {
    polM.checked = true;
    polZ.checked = false;
  }

  if (kliknut === 'zensko') {
    polM.checked = false;
    polZ.checked = true;
  }
}

function proveraTxt(polje) {
  if (polje.value == '') {
    event.preventDefault();
    polje.focus();
    return false;
  }
  return true;
}

function proveraGodina(datum) {
  let datumPr = new Date(datum.value);
  danas = new Date();
  const godineStarosti = (danas - datumPr) / 31536000000;
  console.log(godineStarosti);
  if (godineStarosti < 18 || godineStarosti > 60) {
    return true;
  } else return false;
}

function validacijaForme() {
  const ime = document.getElementById('ime');
  const prezime = document.getElementById('prezime');
  const email = document.getElementById('email');
  const adresa = document.getElementById('adresa');
  const mesto = document.getElementById('mesto');
  const datum = document.getElementById('godinaR');

  const emailFilter =
    /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (!proveraTxt(ime)) {
    alert(`Greška pri unosu imena`);
    return;
  }
  if (!proveraTxt(prezime)) {
    alert(`Greška pri unosu prezimena`);
    return;
  }
  if (!proveraTxt(adresa)) {
    alert(`Greška pri unosu adrese`);
    return;
  }
  if (!proveraTxt(mesto)) {
    alert(`Greška pri unosu mesta prebivališta`);
    return;
  }

  if (!emailFilter.test(email.value)) {
    alert('Greška pri unosu email adrese');
    email.focus();
    event.preventDefault();
    return;
  }

  if (polM.checked == false && polZ.checked == false) {
    alert('Ni jedan pol nije odabran');
    polM.focus();
    event.preventDefault();
    return;
  }

  if (!datum.value) {
    alert('Greška pri unosu datuma');
    datum.focus();
    event.preventDefault();
    return;
  }

  if (proveraGodina(datum)) {
    alert(
      'Kandidat nema odgovarajuće godine da pristupi rezervnom sastavu vojske'
    );
    datum.focus();
    event.preventDefault();
    return;
  }
}

//callback
polM.addEventListener('click', proveraRadio.bind(polM));
polZ.addEventListener('click', proveraRadio.bind(polZ));
