const Sort = function() {
    const sort = this;
    sort.element = document.getElementById("sort");
    sort.form = document.getElementById("sortForm");
    sort.options = document.querySelectorAll(".sortOption");

    sort.element.addEventListener("change", () => {
        sort.form.submit();
    })
}

new Sort();

// TRY AS JQUERY

// const Sort = () => {
//     $(this).
// }