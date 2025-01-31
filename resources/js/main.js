//setinterval() counter numeri atlas avenue

let counter = 0;

let interval = setInterval(()=>{
    if (counter < 500) {
        counter++;
        firstNumber.innerHTML = counter;
    } else {
        clearInterval(interval);
    }
}, 5);

let interval2 = setInterval(()=>{
    if (counter < 600) {
        counter++;
        secondNumber.innerHTML = counter;
    } else {
        clearInterval(interval2);
    }
}, 1.5);

let interval3 = setInterval(()=>{
    if (counter < 700) {
        counter++;
        thirdNumber.innerHTML = counter;
    } else {
        clearInterval(interval3);
    }
});

//RAGAZZI QUESTA PARTE (se la vogliamo sfruttare) SAREBBE MEGLIO METTERLA IN UN ALTRO FILE.JS!!!!
// ~ JSON-> JavaScript Object Notation,(estensione che viene utilizzata per la trasmissione rapida dei dati)
// gli array/oggetti sono dati strutturali (pesanti) quindi se voglio trasmettere dati velocemente devo scegliere dei dati di tipo primitivo le stringhe
// formato json interviene così: file json contine un array di oggetti, prende l'array lo trasforma in una stringa lo trasmette al nostro file annunci.js e poi stringa riconvertita sotto forma di oggetto
// per prende dati da risorsa esterna dobbiamo fare una chiamata asincrona (funzione asincrona che resta in attesa che tutto il codice venga eseguito e poi parte loro esecuzione)
// quando questo passaggio avviene JS deve ritrasformarlo in un oggetto che (come il precedente passaggio richiede del tempo)
//invochiamo funzione:
//fetch: built-in function (già costruita all'interno del linguaggio), chiamata ascincrona (molto spesso le funzioni asincrone sono funzioni di ordine superiore per questo call back) che ci permette di collegarci ad un file esterno (avviene una REQUEST); dal json ne estrae il contenuto (RESPONSE), e ce lo restituisce sotto forma di PROMISE. Non è ancora utilizzabile in quanto tale, quindi va trasformato in oggetto

//metodi:
//fetch() //-> collegarci al file .json
//.then() //-> estrae dalla Promise il contenuto mediante il metodo .json
//.then() //-> per poter effettuare operazioni con l'oggetto ricavato

fetch('../annunci.json') //percorso per collegarsi a risorsa esterna
    .then(response => response.json()) //(come se stessi scrivendo tutto attaccato) prende la response che gli dà la build-in fuction, response deve diventare promise per poter ritrasformare in un oggetto)
    .then(data => { //(data array che contine tutti gli oggetti) per effettuare operazioni, data è una convenzione, che mi deve manipolare tutto quello che sto ricevendo
        console.log(data) //a partire da questo data devo creare un array di categorie uniche(senza ripetizioni)

        //catturo elementi html che ci saranno utili
        let radioWrapper = document.querySelector('#radioWrapper')
        let cardsWrapper = document.querySelector('#cardsWrapper')
        let inputRange = document.querySelector('#inputRange')
        let numberPrice = document.querySelector('#numberPrice')
        let wordInput = document.querySelector('#wordInput')

        
        //Estraggo solo le categorie uniche (senza ripetizioni)
        function setCategory() { //funzione che ci permette di estrarle
            let uniqueCategories = [] //creo un array di appoggio vuoto, su questo array dobbiamo ciclare per ogni annunicio se non c'è già nell'array category quella categoria noi ce lo facciamo mettere
            data.forEach(annuncio => { //cicliamo su data che è nostro array totale, per ogni singolo annuncio (singolo oggetto) cosa deve fare?
                if (!uniqueCategories.includes(annuncio.category)) { //se unique categories vuoto non c'è (not operator)non include la categoria csulla quale sto ciclando 
                    uniqueCategories.push(annuncio.category) //allora devi andare nell'array a ciclare proprio quella categoria
                }
            });
            console.log(uniqueCategories); //finche trova delle ripetizioni non pusha più dentro unique categories una categoria, alla fine ci troviamo con un array popolato solo da categorie degli elementi che abbiamo senza ripetizioni

            // creiamo dinamicamente i radio buttons, dobbiamo creare un radio button per ognuna delle categorie (saranno tutti figli del radiowrapper)
            uniqueCategories.forEach((category) => { //ciclo array, per ogni singola categoria cosa devo fare?
                //creare un div
                let div = document.createElement('div'); //dell'oggetto documento sfrutto il metodo create element 
                //dargli delle classi
                div.classList.add('form-check')
                //popolarlo
                div.innerHTML = `
                <input class="form-check-input" type="radio" name="categories" id="${category}"> 
                <label class="form-check-label" for="${category}">
                    ${category} 
                </label>
            `
                //appenderlo al wrapper
                radioWrapper.appendChild(div) //voglio appenderlo a radio wrapper, dnetro parentesi variabile div creata prima

            })
        }

        //creazione dinamica degli annunci (cards)
        //cicliamo funzione che ci permette di creare card di esempio per tutte le altre categorie
        function createCards(array) {

            cardsWrapper.innerHTML = '' //ogni volta che creo le cards devo ripulire il card wrapper ogni volta lo svuoterò

            array.forEach(annuncio => {
                let div = document.createElement('div') //creiamo div 
                div.classList.add('col-6', 'col-md-3', 'p-2') // diamo classi
                //riempiamo div con card che abbiamo creato in html e poi cancelliamo in html
                div.innerHTML = `
            <div class="card" style="width: 18rem;">
                <img src="${annuncio.url}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">${annuncio.name}</h5>
                    <p class="card-text">${annuncio.category}</p>
                    <p class="price-text">${annuncio.price}</p>
                    <a href="#" class="btn cardBtn">Acquista</a>
                </div>
            </div>
        `
                // andiamo ad appendere il div al cards wrapper
                cardsWrapper.appendChild(div)
            })

        }

        function filterByCategory(categoria) {     
            //alert ('Categoria ' + categoria)       
            if (categoria=="All") {
                createCards(data);
            } else {
                let filtered = data.filter(annuncio => annuncio.category == categoria)
                createCards(filtered)
            }
        }

        //invocazione funzioni
        setCategory()
        createCards(data)
        
        let radioCategories = document.querySelectorAll('.form-check-input');
        
        radioCategories.forEach(radioButton=>{
            radioButton.addEventListener('click', ()=>{
                let category = radioButton.id;
                filterByCategory(category)
                }        
            )
        })

    }) //chiudo fetch



