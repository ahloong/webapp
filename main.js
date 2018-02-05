function opensesame() {
    var pikachu = document.querySelector(".drawer");
    pikachu.classList.add("active");
    var charmander = document.querySelector(".kosong");
    charmander.classList.add("active");
    var bulbasaur = document.querySelector("body");
    bulbasaur.classList.add("active");
}

function closesesame() {
    var raichu = document.querySelector(".drawer");
    raichu.classList.remove("active");
    var charmeleon = document.querySelector(".kosong");
    charmeleon.classList.remove("active");
    var ivysaur = document.querySelector("body");
    ivysaur.classList.remove("active");
}
