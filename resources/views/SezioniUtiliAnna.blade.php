
    <!-- HEADER -->
    <header class="container-fluid mt-5 px-5" id="container-header" style="padding-top:80px">
        <div class="row justify-content-center bg-greenDark heros-header rounded-3 py-5">
            <div class="col-12 col-md-8 d-flex flex-column justify-content-center align-items-center text-center">
                <h1 class="display-2 text-sec"><span class=" text-acc">ATLAS AVENUE</span> <br>
                    
                    <span class="font-royal text-greenLight">Dove conti davvero</span>
                </h1>
                <!-- sezione input -->
                <div class="input-group flex-nowrap mt-3 w-50">
                    <input type="text" class="form-control py-2" placeholder="Dicci di più su cosa cerchi"
                        aria-label="Username" aria-describedby="addon-wrapping">
                    <span class="input-group-text" id="addon-wrapping">
                        
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                </div>

                <div class="d-flex justify-content-around align-items-center w-100 mt-5 flex-wrap">
                    <span class="text-sec">Il preferito da:</span>
                    <img src="/img/netflix-logo(1).png" alt="netflix logo" class="header-logo">
                    <img src="../public/img/google-logo.png" alt="google logo" class="header-logo">
                    <img src="../public/img/paypal-logo.png" alt="paypal logo" class="header-logo">
                    <img src="../public/img/aulab-logo.svg" alt="logo aulab" class="header-logo">
                </div>
            </div>
        </div>
    </header>
    <!-- FINE HEADER -->

    
        <!-- SEZIONE CATEGORIE -->
        <section class="container my-5">
            <div class="row"> >
                <div class="col-6 col-md-2">
                    <div data-aos="fade-up" data-aos-delay="400">
                        <!-- fade up attributo dentro a ognuna delle nostre card -->
                        <div class="category-card text-center">
                            <i class="fa-solid fa-layer-group fa-2x"></i>
                            <p class="pt-3 fs-5">Categoria</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div data-aos="fade-up" data-aos-delay="500">
                        <!-- 400, 500 etc sono millisecondi (partono da 300 ma aspetto un pò per farlo partire dopo interazione con quella zona) -->
                        <div class="category-card text-center">
                            <i class="fa-solid fa-layer-group fa-2x"></i>
                            <p class="pt-3 fs-5">Categoria</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="category-card text-center">
                            <i class="fa-solid fa-layer-group fa-2x"></i>
                            <p class="pt-3 fs-5">Categoria</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div data-aos="fade-up" data-aos-delay="700">
                        <div class="category-card text-center">
                            <i class="fa-solid fa-layer-group fa-2x"></i>
                            <p class="pt-3 fs-5">Categoria</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div data-aos="fade-up" data-aos-delay="800">
                        <div class="category-card text-center">
                            <i class="fa-solid fa-layer-group fa-2x"></i>
                            <p class="pt-3 fs-5">Categoria</p>
                        </div>
                    </div>
                </div>
                
        </section>
        
        <!-- FINE SEZIONE CATEGORIE -->

        <!-- SEZIONE NUMERI INCREMENTALI gestiti con js in main.js-->
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>I numeri di Atlas Avenue</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-4 text-center">
                    <img src="https://picsum.photos/200" />
                    <h3 id="firstNumber"></h3>
                    <p>Clienti soddisfatti</p>
                </div>
                <div class="col-4 text-center">
                    <img src="https://picsum.photos/200" />
                    <h3 id="secondNumber"></h3>
                    <p>Clienti soddisfatti</p>
                </div>
                <div class="col-4 text-center">
                    <img src="https://picsum.photos/200" />
                    <h3 id="thirdNumber"></h3>
                    <p>Clienti soddisfatti</p>
                </div>
            </div>
        </div>
    </section>
    <div class="spacer"></div>
    <div class="spacer"></div>
<div class="spacer"></div>

        <!-- SEZIONE CAROSELLO -->
        <section class="container pb-5">
            <div class="row">
                <h2 class="font-cool  text-center text-main mb-3">Servizi Popolari</h2>
                <div class="col-12">
                    <!-- Swiper (11 slide)-->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="position-relative" src=""
                                    alt="immagine casuale">
                                <div class="carousel-description text-start">
                                    <p class="text-sec mb-1"></p>
                                    <p class="text-sec fw-bold"></p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img class="position-relative" src=""
                                    alt="immagine casuale">
                                <div class="carousel-description text-start">
                                    <p class="text-sec mb-1"></p>
                                    <p class="text-sec fw-bold"></p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img class="position-relative" src=""
                                    alt="immagine casuale">
                                <div class="carousel-description text-start">
                                    <p class="text-sec mb-1"></p>
                                    <p class="text-sec fw-bold"></p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img class="position-relative" src=""
                                    alt="immagine casuale">
                                <div class="carousel-description text-start">
                                    <p class="text-sec mb-1"></p>
                                    <p class="text-sec fw-bold"></p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img class="position-relative" src=""
                                    alt="immagine casuale">
                                <div class="carousel-description text-start">
                                    <p class="text-sec mb-1"></p>
                                    <p class="text-sec fw-bold"></p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img class="position-relative" src=""
                                    alt="immagine casuale">
                                <div class="carousel-description text-start">
                                    <p class="text-sec mb-1"></p>
                                    <p class="text-sec fw-bold"></p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img class="position-relative" src=""
                                    alt="immagine casuale">
                                <div class="carousel-description text-start">
                                    <p class="text-sec mb-1"></p>
                                    <p class="text-sec fw-bold"></p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img class="position-relative" src=""
                                    alt="immagine casuale">
                                <div class="carousel-description text-start">
                                    <p class="text-sec mb-1"></p>
                                    <p class="text-sec fw-bold"></p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img class="position-relative" src=""
                                    alt="immagine casuale">
                                <div class="carousel-description text-start">
                                    <p class="text-sec mb-1"></p>
                                    <p class="text-sec fw-bold"></p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img class="position-relative" src=""
                                    alt="immagine casuale">
                                <div class="carousel-description text-start">
                                    <p class="text-sec mb-1"></p>
                                    <p class="text-sec fw-bold"></p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img class="position-relative" src=""
                                    alt="immagine casuale">
                                <div class="carousel-description text-start">
                                    <p class="text-sec mb-1"></p>
                                    <p class="text-sec fw-bold"></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-prev"></div> 
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FINE SEZIONE CAROSELLO -->

        <!-- SEZIONE VIDEO -->
        <section class="container-fluid my-5 bg-greenExtraLight py-5">

            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <!-- testo-->
                        <h2>Tutto quello di cui hai bisogno</h2>
                        <h3>Basta un click!</h3>
                        <br>
                        <h5><i class="bi bi-check-circle"></i> Lavoro di qualità: efficiente e affidabile</h5>
                        <p>Ricevi consegne puntuali e impeccabili, 0 intoppi.</p>

                        <h5><i class="bi bi-check-circle"></i> Sicurezza per ogni ordine</h5>
                        <p>Pagamenti protetti grazie alla tecnologia SSL. Le transazioni non vengono sbloccate finché
                            non viene approvata la consegna.</p>

                        <h5><i class="bi bi-check-circle"></i> Locale o globale</h5>
                        <p>Qui puoi trovare tutto quello che ti cerchi, da ogni parte del mondo e in ogni lingua.</p>

                        <h5><i class="bi bi-check-circle"></i> Assistenza H24</h5>
                        <p>Domande? Il nostro team di assistenza è disponibile H24, sempre e ovunque.</p>
                    </div>
                    <div class="col-6">
                        <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/5Peo-ivmupE?si=GQgupptKhlIZ8RWG"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sezione Our Team --> 
        <div class="container">
            <div class="spacer"></div>
            <div class="spacer"></div>
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center text-uppercase">Our team</h3>
                </div>
            </div>
            <div class="spacer"></div>
            <div class="spacer"></div>
            <div class="row">
                <div class="col-sm-6 col-md-2 text-center">
                    <img src="https://lipsum.app//id/07/150x150/" class="rounded-circle team-pic" alt="Cinque Terre">
                    <div class="spacer"></div>
                    <h3 class="">Danilo</h3>
                    <p>Lorem ipsum sic dolore amen</p>
                    <i class="bi bi-facebook  margin-right-20"></i>
                    <i class="bi bi-linkedin  margin-right-20"></i>
                    <i class="bi bi-instagram"></i>
                </div>
                <div class="col-sm-6 col-md-2 text-center">
                    <img src="https://lipsum.app//id/07/150x150/" class="rounded-circle team-pic" alt="Cinque Terre">
                    <div class="spacer"></div>
                    <h3 class="">Anna</h3>
                    <p>Lorem ipsum sic dolore amen</p>
                    <i class="bi bi-facebook  margin-right-20"></i>
                    <i class="bi bi-linkedin  margin-right-20"></i>
                    <i class="bi bi-instagram "></i>
                </div>
                <div class="col-sm-6 col-md-2 text-center">
                    <img src="https://lipsum.app//id/07/150x150/" class="rounded-circle team-pic" alt="Cinque Terre">
                    <div class="spacer"></div>
                    <h3 class="">Alessio</h3>
                    <p>Lorem ipsum sic dolore amen</p>
                    <i class="bi bi-facebook  margin-right-20"></i>
                    <i class="bi bi-linkedin  margin-right-20"></i>
                    <i class="bi bi-instagram "></i>
                </div>
                <div class="col-sm-6 col-md-2 text-center">
                    <img src="https://lipsum.app//id/07/150x150/" class="rounded-circle team-pic" alt="Cinque Terre">
                    <div class="spacer"></div>
                    <h3 class="">Matteo</h3>
                    <p>Lorem ipsum sic dolore amen</p>
                    <i class="bi bi-facebook  margin-right-20"></i>
                    <i class="bi bi-linkedin  margin-right-20"></i>
                    <i class="bi bi-instagram "></i>
                </div>
                <div class="col-sm-6 col-md-2 text-center">
                    <img src="https://lipsum.app//id/07/150x150/" class="rounded-circle team-pic" alt="Cinque Terre">
                    <div class="spacer"></div>
                    <h3 class="">Flavio</h3>
                    <p>Lorem ipsum sic dolore amen</p>
                    <i class="bi bi-facebook  margin-right-20"></i>
                    <i class="bi bi-linkedin  margin-right-20"></i>
                    <i class="bi bi-instagram"></i>
                </div>
            </div>

<!-- SEZIONE ANNUNCI con filtri Categorie, Prezzo, Parola gestita con js in main.js filtro categoria-->
<section class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-3">
            <!-- colonna per i filtri -->
            <div class="accordion" id="accordionExample"> <!--prendiamo accordion da bootstrap-->
                <h3 class="text-main mb-5">Ordina per:</h3>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Categoria
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body" id="radioWrapper">
                            <!-- Radio buttons per le categorie -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="categories" id="All" checked>
                                <!--mettiamo checked solo al primo e togliamolo al resto perchè (è l'attributo che fa in modo che al caricamento della pagina sia già checked ) id= tutte le categorie-->
                                <label class="form-check-label"
                                    for="All"><!-- se clicco su etichetta mi fa chacked anche lì-->
                                    Tutte le categorie
                                </label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Prezzo
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <input type="range" class="form-range" min="0" max="0" id="inputRange">
                            <p id="numberPrice"> 0 €</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Parola
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cerca..." id="wordInput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <!-- colonna popolata dalle card di annunci -->
            <h3 class="text-main">Annunci:</h3>
            <div class="row" id="cardsWrapper">
                <!-- colonna riempita dinamicamente con le card di annunci -->
            </div>
        </div>
    </div>
</section>

<!-- FINE SEZIONE ANNUNCI -->