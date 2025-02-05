//setinterval()

function incremento(element, max, speed) {
    let counter = 0;
    let interval = setInterval(() => {
        if (counter < max) {
            counter++;
            element.innerHTML = counter;
        } else {
            clearInterval(interval);
        }
    }, speed);
}

let check = false;
if (firstNumber && secondNumber && thirdNumber) {
    let observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !check) {
                incremento(firstNumber, 700, 5);
                incremento(secondNumber, 600, 3);
                incremento(thirdNumber, 150, 10);
                check = true;
            }
        });
    });

    observer.observe(thirdNumber);
}


// Sistema di Filtri per il Catalogo
// document.addEventListener('DOMContentLoaded', function() {
//     // Elementi DOM
//     const filtroTitolo = document.getElementById('search');
//     const searchButton = document.querySelector('.search-button');
//     const dropdownCategoria = document.getElementById('categoryDropdown');
//     const dropdownItems = document.querySelectorAll('.dropdown-item');
//     const resetButton = document.getElementById('resetFilters');
//     const slider = document.querySelector('.double-slider');
//     const range = slider.querySelector('.range');
//     const leftThumb = slider.querySelector('.thumb.left');
//     const rightThumb = slider.querySelector('.thumb.right');
//     const minInput = document.getElementById('min-price');
//     const maxInput = document.getElementById('max-price');
//     const minValue = document.querySelector('.min-value');
//     const maxValue = document.querySelector('.max-value');
//     const markers = document.querySelectorAll('.slider-markers span');
//     const markerCount = markers.length - 1;
//     const articleContainer = document.querySelector('.article-container');
//     const currencySelect = document.getElementById('currency');

//     let selectedCategory = '';
//     let selectedCurrency = ''; // Variabile per la valuta selezionata

//     const MIN_PRICE = 0;
//     const MAX_PRICE = 9999;
//     const STEP = 100;

//     // Gestione Dropdown Categoria
//     dropdownItems.forEach(item => {
//         item.addEventListener('click', (e) => {
//             e.preventDefault();
//             const value = e.target.dataset.value;
//             const text = e.target.textContent.trim();
//             selectedCategory = value;
//             dropdownCategoria.querySelector('span').textContent = text;
//             applicaFiltri();
//         });
//     });

//     // Gestione Ricerca per Categoria
//     searchButton.addEventListener('click', () => {
//         const searchTerm = filtroTitolo.value.toLowerCase();
//         const articoli = document.querySelectorAll('.article-card');
//         let articoliVisibili = 0;

//         articoli.forEach(articolo => {
//             const titolo = articolo.getAttribute('data-title').toLowerCase();
//             const categoria = articolo.getAttribute('data-category');

//             const matchTitolo = titolo.includes(searchTerm);
//             const matchCategoria = !selectedCategory || categoria === selectedCategory;

//             if (matchTitolo && matchCategoria) {
//                 articolo.style.display = '';
//                 articoliVisibili++;
//             } else {
//                 articolo.style.display = 'none';
//             }
//         });

//         // Mostra/nascondi messaggio "nessun risultato"
//         const noResults = document.getElementById('no-results');
//         if (noResults) {
//             noResults.style.display = articoliVisibili === 0 ? 'block' : 'none';
//         }

//         // Aggiorna l'URL
//         const parametri = new URLSearchParams();
//         if (searchTerm) parametri.set('search', searchTerm);
//         if (selectedCategory) parametri.set('category', selectedCategory);
        
//         const nuovoURL = `${window.location.pathname}${parametri.toString() ? '?' + parametri.toString() : ''}`;
//         window.history.replaceState({}, '', nuovoURL);
//     });

//     // Gestione Dropdown Valuta
//     currencySelect.addEventListener('change', (e) => {
//         selectedCurrency = e.target.value;
//         applicaFiltri();
//     });

//     // Gestione Range Slider
//     function setLeftValue(percent) {
//         const rightPercent = (parseInt(maxInput.value) - MIN_PRICE) / (MAX_PRICE - MIN_PRICE) * 100;
//         percent = Math.min(percent, rightPercent);
//         const value = Math.round((percent * (MAX_PRICE - MIN_PRICE) / 100 + MIN_PRICE) / STEP) * STEP;
        
//         minInput.value = value;
//         leftThumb.style.left = `${percent}%`;
//         range.style.left = `${percent}%`;
//         minValue.textContent = formatPrice(value);
//         updateMarkers();
//     }

//     function setRightValue(percent) {
//         const leftPercent = (parseInt(minInput.value) - MIN_PRICE) / (MAX_PRICE - MIN_PRICE) * 100;
//         percent = Math.max(percent, leftPercent);
//         const value = Math.round((percent * (MAX_PRICE - MIN_PRICE) / 100 + MIN_PRICE) / STEP) * STEP;
        
//         maxInput.value = value;
//         rightThumb.style.left = `${percent}%`;
//         range.style.right = `${100 - percent}%`;
//         maxValue.textContent = formatPrice(value);
//         updateMarkers();
//     }

//     function updateMarkers() {
//         const minPercent = (parseInt(minInput.value) - MIN_PRICE) / (MAX_PRICE - MIN_PRICE);
//         const maxPercent = (parseInt(maxInput.value) - MIN_PRICE) / (MAX_PRICE - MIN_PRICE);
//         const minIndex = Math.round(minPercent * markerCount);
//         const maxIndex = Math.round(maxPercent * markerCount);
        
//         markers.forEach((marker, index) => {
//             if (index >= minIndex && index <= maxIndex) {
//                 marker.classList.add('active');
//             } else {
//                 marker.classList.remove('active');
//             }
//         });
//     }

//     function formatPrice(value) {
//         return `${value}€`;
//     }

//     // Gestione Drag dei Thumbs
//     function handleThumbDrag(thumb, setValue) {
//         let isDragging = false;
//         let startX, startLeft;

//         thumb.addEventListener('mousedown', startDragging);
//         document.addEventListener('mousemove', drag);
//         document.addEventListener('mouseup', stopDragging);

//         thumb.addEventListener('touchstart', startDragging);
//         document.addEventListener('touchmove', drag);
//         document.addEventListener('touchend', stopDragging);

//         function startDragging(e) {
//             isDragging = true;
//             startX = e.type === 'mousedown' ? e.pageX : e.touches[0].pageX;
//             startLeft = parseFloat(thumb.style.left || 0);
//             thumb.style.transition = 'none';
//         }

//         function drag(e) {
//             if (!isDragging) return;

//             e.preventDefault();
//             const x = e.type === 'mousemove' ? e.pageX : e.touches[0].pageX;
//             const walk = x - startX;
//             const sliderRect = slider.getBoundingClientRect();
//             const percent = Math.min(Math.max(
//                 ((startLeft * sliderRect.width / 100 + walk) / sliderRect.width * 100),
//                 0
//             ), 100);

//             setValue(percent);
//         }

//         function stopDragging() {
//             isDragging = false;
//             thumb.style.transition = '';
//         }
//     }

//     // Applicazione Filtri
//     function applicaFiltri() {
//         const testoRicerca = filtroTitolo.value.toLowerCase();
//         const prezzoMassimo = Number(maxInput.value);
        
//         // Filtra gli articoli
//         const articoli = document.querySelectorAll('.article-card');
//         let articoliVisibili = 0;

//         articoli.forEach(articolo => {
//             const titolo = articolo.getAttribute('data-title').toLowerCase();
//             const categoria = articolo.getAttribute('data-category');
//             const prezzo = Number(articolo.getAttribute('data-price'));
//             const valuta = articolo.getAttribute('data-currency');

//             const matchTitolo = titolo.includes(testoRicerca);
//             const matchCategoria = !selectedCategory || categoria === selectedCategory;
//             const matchPrezzo = prezzo <= prezzoMassimo;
//             const matchValuta = !selectedCurrency || valuta === selectedCurrency;

//             if (matchTitolo && matchCategoria && matchPrezzo && matchValuta) {
//                 articolo.style.display = '';
//                 articoliVisibili++;
//             } else {
//                 articolo.style.display = 'none';
//             }
//         });

//         // Mostra/nascondi messaggio "nessun risultato"
//         const noResults = document.getElementById('no-results');
//         if (noResults) {
//             noResults.style.display = articoliVisibili === 0 ? 'block' : 'none';
//         }

//         // Aggiorna l'URL
//         const parametri = new URLSearchParams();
//         if (testoRicerca) parametri.set('search', testoRicerca);
//         if (selectedCategory) parametri.set('category', selectedCategory);
//         if (selectedCurrency) parametri.set('currency', selectedCurrency);
//         if (maxInput.value < MAX_PRICE) parametri.set('maxPrice', maxInput.value);
        
//         const nuovoURL = `${window.location.pathname}${parametri.toString() ? '?' + parametri.toString() : ''}`;
//         window.history.replaceState({}, '', nuovoURL);
//     }

//     // Reset Filtri
//     function pulisciFiltri() {
//         // Reset campi
//         filtroTitolo.value = '';
//         selectedCategory = '';
//         dropdownCategoria.querySelector('span').textContent = 'Tutte le categorie';
        
//         // Reset valuta
//         currencySelect.value = ''; // Imposta l'opzione di default
//         selectedCurrency = '';
        
//         // Reset range slider
//         minInput.value = MIN_PRICE;
//         maxInput.value = MAX_PRICE;
//         setLeftValue(0);
//         setRightValue(100);

//         // Reset URL
//         window.history.replaceState({}, '', window.location.pathname);

//         // Mostra tutti gli articoli
//         const articoli = document.querySelectorAll('.article-card');
//         articoli.forEach(articolo => {
//             articolo.style.display = '';
//         });

//         // Nascondi messaggio "nessun risultato"
//         const noResults = document.getElementById('no-results');
//         if (noResults) {
//             noResults.style.display = 'none';
//         }

//         // Riapplica i filtri per aggiornare la vista
//         applicaFiltri();
//     }

//     // Carica Filtri da URL
//     function caricaFiltriDaURL() {
//         const parametri = new URLSearchParams(window.location.search);
        
//         // Imposta i valori dai parametri URL
//         filtroTitolo.value = parametri.get('search') || '';
//         selectedCategory = parametri.get('category') || '';
//         selectedCurrency = parametri.get('currency') || '';
//         maxInput.value = parametri.get('maxPrice') || MAX_PRICE;
        
//         // Aggiorna il testo del dropdown categoria
//         if (selectedCategory) {
//             const selectedItem = document.querySelector(`[data-value="${selectedCategory}"]`);
//             if (selectedItem) {
//                 dropdownCategoria.querySelector('span').textContent = selectedItem.textContent.trim();
//             }
//         }

//         // Aggiorna il range slider
//         const maxPercent = ((maxInput.value - MIN_PRICE) / (MAX_PRICE - MIN_PRICE)) * 100;
//         setRightValue(maxPercent);
        
//         // Applica i filtri se necessario
//         if (parametri.toString()) {
//             applicaFiltri();
//         }
//     }

//     // Inizializzazione
//     setLeftValue(0);
//     setRightValue(100);
//     handleThumbDrag(leftThumb, setLeftValue);
//     handleThumbDrag(rightThumb, setRightValue);
    
//     // Event Listeners
//     filtroTitolo.addEventListener('input', applicaFiltri);
//     minInput.addEventListener('change', applicaFiltri);
//     maxInput.addEventListener('change', applicaFiltri);
//     resetButton.addEventListener('click', pulisciFiltri);

//     // Carica filtri iniziali
//     caricaFiltriDaURL();

    
// });

// document.addEventListener('DOMContentLoaded', function () {
//     const slider = document.querySelector('.double-slider');
//     const range = slider.querySelector('.range');
//     const leftThumb = slider.querySelector('.thumb.left');
//     const rightThumb = slider.querySelector('.thumb.right');
//     const minInput = document.getElementById('min-price');
//     const maxInput = document.getElementById('max-price');
//     const minValue = document.querySelector('.min-value');
//     const maxValue = document.querySelector('.max-value');

//     const MIN_PRICE = 0;
//     const MAX_PRICE = 9999;
//     const STEP = 10; // Risoluzione del passo

//     // Funzione per aggiornare la posizione dei thumb e il range visivo
//     function updateSlider() {
//         const minPercent = ((minInput.value - MIN_PRICE) / (MAX_PRICE - MIN_PRICE)) * 100;
//         const maxPercent = ((maxInput.value - MIN_PRICE) / (MAX_PRICE - MIN_PRICE)) * 100;

//         leftThumb.style.left = `${minPercent}%`;
//         rightThumb.style.left = `${maxPercent}%`;
//         range.style.left = `${minPercent}%`;
//         range.style.right = `${100 - maxPercent}%`;

//         minValue.textContent = `${minInput.value}€`;
//         maxValue.textContent = `${maxInput.value}€`;
//     }

//     // Funzione per aggiornare i valori del filtro prezzo
//     function updatePriceFilter() {
//         const minVal = parseInt(minInput.value, 10);
//         const maxVal = parseInt(maxInput.value, 10);

//         document.querySelectorAll('.article-card').forEach(article => {
//             const price = parseInt(article.getAttribute('data-price'), 10);
//             if (price >= minVal && price <= maxVal) {
//                 article.style.display = '';
//             } else {
//                 article.style.display = 'none';
//             }
//         });
//     }

//     // Gestione degli input
//     minInput.addEventListener('input', function () {
//         if (parseInt(minInput.value) >= parseInt(maxInput.value)) {
//             minInput.value = maxInput.value - STEP;
//         }
//         updateSlider();
//         updatePriceFilter();
//     });

//     maxInput.addEventListener('input', function () {
//         if (parseInt(maxInput.value) <= parseInt(minInput.value)) {
//             maxInput.value = parseInt(minInput.value) + STEP;
//         }
//         updateSlider();
//         updatePriceFilter();
//     });

//     // Dragging dei thumb
//     // Funzione per gestire il trascinamento dei thumb  dello slider
//     function handleThumbDrag(thumb, isLeftThumb) {
//         let isDragging = false;// Variabile di stato per controllare se il thumb è in trascinamento
//         // Funzione che si attiva quando l'utente inizia a trascinare il thumb
//         function startDrag(e) {
//         isDragging = true; // Imposta il flag su "true" per indicare che il trascinamento è iniziato
//             e.preventDefault(); // Previene il comportamento predefinito per evitare effetti indesiderati (es. scrolling)
//         }
//  // Funzione che gestisce il movimento del thumb durante il trascinamento
//         function onDrag(e) {
//             if (!isDragging) return; // Se il thumb non è in trascinamento, esce dalla funzione
//             const sliderRect = slider.getBoundingClientRect();// Ottiene le dimensioni e la posizione dello slider
//             const x = e.touches ? e.touches[0].clientX : e.clientX;// Prende la posizione X del mouse o del tocco
//             let percent = ((x - sliderRect.left) / sliderRect.width) * 100;// Calcola la posizione in percentuale rispetto allo slider
//             // Limita il valore tra 0 e 100 per evitare che il thumb esca dallo slider
//             percent = Math.max(0, Math.min(percent, 100));
// // Calcola il nuovo valore del prezzo basandosi sulla posizione del thumb
//             let newValue = Math.round((percent * (MAX_PRICE - MIN_PRICE) / 100 + MIN_PRICE) / STEP) * STEP;

//             if (isLeftThumb) {// Se è il thumb sinistro
//                 if (newValue >= parseInt(maxInput.value)) 
//                     newValue = parseInt(maxInput.value) - STEP;// Impedisce che il min superi il max
//                 minInput.value = newValue; // Aggiorna il valore minimo del filtro prezzo
//             } else {// Se è il thumb destro
//                 if (newValue <= parseInt(minInput.value)) newValue = parseInt(minInput.value) + STEP; // Impedisce che il max sia inferiore al min
//                 maxInput.value = newValue;// Aggiorna il valore massimo del filtro prezzo
//             }

//             updateSlider();// Aggiorna la posizione grafica del range slider
//             updatePriceFilter();// Applica il filtro aggiornato ai prodotti
//         }
// // Funzione che si attiva quando l'utente rilascia il thumb
//         function stopDrag() {
//             isDragging = false;// Imposta il flag su "false" per indicare che il trascinamento è terminato
//         }

//     // Aggiunge gli event listener per l'inizio del trascinamento (mouse e touch)
//         thumb.addEventListener('mousedown', startDrag);
//         thumb.addEventListener('touchstart', startDrag);
//         // Aggiunge gli event listener per il movimento del mouse/touch durante il trascinamento
//         document.addEventListener('mousemove', onDrag);
//         document.addEventListener('touchmove', onDrag);
//         // Aggiunge gli event listener per il rilascio del thumb
//         document.addEventListener('mouseup', stopDrag);
//         document.addEventListener('touchend', stopDrag);
//     }

//     // Associa la funzione di trascinamento ai due thumbs dello slider
//     handleThumbDrag(leftThumb, true);// Gestisce il thumb sinistro
//     handleThumbDrag(rightThumb, false);// Gestisce il thumb destro

    
// // Inizializza lo slider e il filtro prezzo dopo il caricamento della pagina
//     updateSlider();
//     updatePriceFilter();
// });


//mostra la password

document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const toggleButton = this;

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleButton.textContent = 'Nascondi Password';
    } else {
        passwordField.type = 'password';
        toggleButton.textContent = 'Mostra Password';
    }
});

