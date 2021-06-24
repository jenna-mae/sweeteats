const Filter = function() {
    const filter = this;
    filter.element = document.querySelector(".filter");
    filter.btn = document.querySelector(".filterBtn");

    filter.btn.addEventListener("click", () => {
        filter.element.classList.toggle("activeFilter");
    })
}

new Filter();