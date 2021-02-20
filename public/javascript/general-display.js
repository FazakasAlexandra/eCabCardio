/************Dropdown menu for admin button**************/

function dropdownMenu() {

    const x = document.querySelector(".drop-menu");
    if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
}

/************ Set active tab from navbar menu **************/

function setActiveTab(){
  if(window.location.href.includes("patients") && !window.location.href.includes("history")) document.querySelector('.patients-tab').classList.add('active-navbar-tab')
  if(window.location.href.includes("admin")) document.querySelector('.admin-tab').classList.add('active-navbar-tab')
  if(window.location.href.includes("history")) document.querySelector('.history-tab').classList.add('active-navbar-tab')
  if(window.location.href.includes("#admin")) document.querySelector(".drop-menu").style.display = "block"
}

function toggleAdminTab(){
  let adminTab = document.querySelector('.admin-tab')
  
  adminTab.addEventListener('click', () => {
    adminTab.classList.toggle('active-navbar-tab')
  })
}

toggleAdminTab()
setActiveTab();