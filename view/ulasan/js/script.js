AOS.init();

const stars = document.querySelectorAll(".star-rate i");

stars.forEach((star, index1) => {
    star.addEventListener("click", () => {
        stars.forEach((star, index2) => {
            index1 >= index2
                ? star.classList.add("checked")
                : star.classList.remove("checked");
        });
    });
});
