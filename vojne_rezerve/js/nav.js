//promenjive
const nav = document.querySelector('nav');
const navHeight = nav.getBoundingClientRect().height;
const observeObject = document.querySelector('.observeObject');
const navLeft = nav.querySelector('.navLeft');

//stiki
const stickyNav = function (entries) {
  const [entry] = entries;

  if (!entry.isIntersecting) {
    nav.classList.add('sticky');
    navLeft.style.width = '0';
  } else {
    nav.classList.remove('sticky');
    navLeft.style.width = '30%';
  }
};

const navObserver = new IntersectionObserver(stickyNav, {
  root: null,
  threshold: 0,
  rootMargin: `-${navHeight}px`,
});

navObserver.observe(observeObject);
