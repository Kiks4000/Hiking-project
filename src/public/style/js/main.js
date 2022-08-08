//
//
//NavBAR

const btnNav = document.querySelector('.hamburger')
const navMobile = document.querySelector('.navMobile')

btnNav.addEventListener("click", () => {
    navMobile.classList.toggle("active");
    
    btnNav.classList.toggle("burger");
});