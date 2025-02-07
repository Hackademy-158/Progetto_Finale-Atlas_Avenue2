document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search");
    const categoryDropdown = document.getElementById("categoryDropdown");
    const currencySelect = document.getElementById("currency");
    const minPriceInput = document.getElementById("min-price");
    const maxPriceInput = document.getElementById("max-price");
    const minPriceDisplay = document.querySelector(".min-value");
    const maxPriceDisplay = document.querySelector(".max-value");
    const articlesContainer = document.getElementById("articles-container");
    const noResultsMessage = document.getElementById("no-results");
    const resetFiltersButton = document.getElementById("resetFilters");
    const rangeTrack = document.querySelector(".range");
    const leftThumb = document.querySelector(".thumb.left");
    const rightThumb = document.querySelector(".thumb.right");

    let minPrice = 0;
    let maxPrice = 9999;
    let isDraggingLeft = false;
    let isDraggingRight = false;

    function filterArticles() {
        const query = searchInput.value.toLowerCase();
        const selectedCategory = categoryDropdown.getAttribute("data-selected") || "";
        const selectedCurrency = currencySelect.value;
        let hasVisibleArticles = false;

        document.querySelectorAll(".article-card").forEach(article => {
            const title = article.getAttribute("data-title").toLowerCase();
            const category = article.getAttribute("data-category");
            const price = parseFloat(article.getAttribute("data-price"));
            const currency = article.getAttribute("data-currency");

            const matchesSearch = title.includes(query);
            const matchesCategory = selectedCategory === "" || category === selectedCategory;
            const matchesCurrency = selectedCurrency === "" || currency === selectedCurrency;
            const matchesPrice = !isNaN(price) && price >= minPrice && price <= maxPrice;

            if (matchesSearch && matchesCategory && matchesCurrency && matchesPrice) {
                article.style.display = "block";
                hasVisibleArticles = true;
            } else {
                article.style.display = "none";
            }
        });

        noResultsMessage.classList.toggle("d-none", hasVisibleArticles);
    }

    function updatePriceRange() {
        minPrice = parseFloat(minPriceInput.value) || 0;
        maxPrice = parseFloat(maxPriceInput.value) || 9999;
        minPriceDisplay.textContent = minPrice + "€";
        maxPriceDisplay.textContent = maxPrice + "€";

        const minPercent = (minPrice / 9999) * 100;
        const maxPercent = (maxPrice / 9999) * 100;

        rangeTrack.style.left = minPercent + "%";
        rangeTrack.style.right = (100 - maxPercent) + "%";
        leftThumb.style.left = minPercent + "%";
        rightThumb.style.left = maxPercent + "%";

        filterArticles();
    }

    function handleThumbDrag(event, isLeft) {
        event.preventDefault();
        const sliderRect = rangeTrack.parentElement.getBoundingClientRect();
        const totalWidth = sliderRect.width;

        function moveThumb(moveEvent) {
            let newPercent = ((moveEvent.clientX - sliderRect.left) / totalWidth) * 100;
            newPercent = Math.max(0, Math.min(100, newPercent));

            if (isLeft) {
                minPrice = Math.min((newPercent / 100) * 9999, maxPrice - 1);
                minPriceInput.value = Math.round(minPrice);
            } else {
                maxPrice = Math.max((newPercent / 100) * 9999, minPrice + 1);
                maxPriceInput.value = Math.round(maxPrice);
            }
            updatePriceRange();
        }

        function stopDrag() {
            document.removeEventListener("mousemove", moveThumb);
            document.removeEventListener("mouseup", stopDrag);
        }

        document.addEventListener("mousemove", moveThumb);
        document.addEventListener("mouseup", stopDrag);
    }

    leftThumb.addEventListener("mousedown", (e) => handleThumbDrag(e, true));
    rightThumb.addEventListener("mousedown", (e) => handleThumbDrag(e, false));

    searchInput.addEventListener("input", filterArticles);
    document.querySelectorAll(".dropdown-item").forEach(item => {
        item.addEventListener("click", function () {
            categoryDropdown.setAttribute("data-selected", this.getAttribute("data-value"));
            document.getElementById("dropdownCategory").innerText = this.innerText;
            filterArticles();
        });
    });
    currencySelect.addEventListener("change", filterArticles);

    minPriceInput.addEventListener("input", updatePriceRange);
    maxPriceInput.addEventListener("input", updatePriceRange);
    minPriceInput.addEventListener("change", updatePriceRange);
    maxPriceInput.addEventListener("change", updatePriceRange);

    resetFiltersButton.addEventListener("click", function () {
        searchInput.value = "";
        categoryDropdown.setAttribute("data-selected", "");
        document.getElementById("dropdownCategory").innerText = "Seleziona Categoria";
        currencySelect.value = "";
        minPriceInput.value = "0";
        maxPriceInput.value = "9999";
        updatePriceRange();
    });

    updatePriceRange();
    filterArticles();

    // Logica per evidenziare gli slider markers
    const sliderMarkers = document.querySelectorAll(".slider-marker");
    const priceDots = document.querySelectorAll(".dot");

    function highlightMarkers() {
        sliderMarkers.forEach(marker => marker.style.background = "var(--primary)");
    }

    function resetMarkers() {
        sliderMarkers.forEach(marker => marker.style.background = "var(--neutral-400)");
    }

    // Aggiunta degli event listener ai dot e ai thumb
    [priceDots, leftThumb, rightThumb].forEach(element => {
        element.addEventListener("mouseenter", highlightMarkers);
        element.addEventListener("mouseleave", resetMarkers);
    });
});



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
                incremento(firstNumber, 700, 70);
                incremento(secondNumber, 600, 60);
                incremento(thirdNumber, 150, 250);
                check = true;
            }
        });
    });

    observer.observe(thirdNumber);
}

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






