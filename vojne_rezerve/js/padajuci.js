const navBar = document.querySelector('nav');
const padajuci = document.querySelector('.padajuci');
const meta = document.getElementById('meta');

function promena(addDeo, removeDeo) {
  padajuci.classList.add(addDeo);
  padajuci.classList.remove(removeDeo);
}

navBar.addEventListener('mouseover', (e) => {
  if (e.target.classList.contains('prikaz')) promena('vidljiv', 'nevidljiv');

  if (
    !e.target.classList.contains('prikaz') &&
    !e.target.classList.contains('padajuciEl') &&
    e.target.tagName == 'A'
  )
    promena('nevidljiv', 'vidljiv');
});

meta.addEventListener('mouseleave', () => {
  promena('nevidljiv', 'vidljiv');
});
