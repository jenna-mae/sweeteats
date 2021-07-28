const ProductImages = function() {
    const pi = this;

    pi.imageDisplay = document.querySelector(".image-lrg img");
    pi.thubmnails = document.querySelectorAll(".productThumbnail img");

    pi.thubmnails.forEach(function(thumbnail) {
        thumbnail.addEventListener("click", function(e) {
            e.preventDefault();
            var imagesSrc = thumbnail.src;
            pi.imageDisplay.src = `${imagesSrc}`;
        })
    })
}