const datumi = document.querySelectorAll('.datum');
let datumSecen = [];

datumi.forEach((datum) => {
  datumSecen = datum.innerHTML.split('-').reverse().join('. ') + '.';
  datum.innerHTML = datumSecen;
});
