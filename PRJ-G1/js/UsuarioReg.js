const grid = new Muuri('.grid', {
  layout: {
    rounding: false
  }
});

window.addEventListener('load', () => {
  grid.refreshItems().layout();
  document.getElementById('item').classList.add('imagenes-cargadas');
});

 const overlay = document.getElementById('overlay');
 document.querySelectorAll('.grid .item img').forEach((elemento) => {
   elemento.addEventListener('click', () => {
     const ruta = elemento.getAttribute('src');
     const descripcion = elemento.parentNode.parentNode.dataset.descripcion;

     overlay.classList.add('activo');
     document.querySelector('#overlay img').src = ruta;
     document.querySelector('#overlay .descripcion').innerHTML = descripcion;
   });
 });

document.querySelector('#btn-cerrar-popup').addEventListener('click', () => {
  overlay.classList.remove('activo');
});

overlay.addEventListener('click', (evento) => {
  evento.target.id === 'overlay' ? overlay.classList.remove('activo') : '';
});
