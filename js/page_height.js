const PageHeight = function() {
    const page = this;

    page.targetDiv = document.getElementById("allProducts");
    page.heightToSet = page.targetDiv.clientHeight;
    page.divToSet = document.getElementById("shop");
    
    page.init = function() {
        page.divToSet.style.height = page.divToSet.clientHeight + page.heightToSet + "px";
    }

    page.init();
}