// SHOW/HIDE ADVANCED SEARCHBAR
document.querySelector('#advanced-search-button').addEventListener('click', (e) => {

    e.stopPropagation()

    const advancedSearchbarButton = document.querySelector('#advanced-search-button')
    const advancedSearchbar = document.querySelector('.advanced-searchbar')

    advancedSearchbar.classList.toggle('hidden')

    advancedSearchbarButton.innerHTML = advancedSearchbar.classList.contains('hidden') ? `<i class="fas fa-angle-up"></i>` : `<i class="fas fa-angle-down"></i>`
})

// SET ACTIVE ORDER BUTTON
function setActiveButtonColor() {
    if (window.location.href.indexOf("DESC") > -1) {
        document.querySelector('.desc').classList.add('active-order')
        document.querySelector('.asc').classList.remove('active-order')
    } else {
        document.querySelector('.asc').classList.add('active-order')
        document.querySelector('.desc').classList.remove('active-order')
    }
};

setActiveButtonColor()
