window.addEventListener("DOMContentLoaded", () => {
    let nav = document.getElementById('we-like-kpop');
    let navOffset = nav.offsetTop;
    function naviScroll() {
        if (window.pageYOffset >= navOffset) {
            document.body.classList.add('navi-scroll');
        }
        if (window.pageYOffset <= navOffset) {
            document.body.classList.remove('navi-scroll');
        }
    }

    window.addEventListener('load', naviScroll);
    window.addEventListener('scroll', naviScroll);
})