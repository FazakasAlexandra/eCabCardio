/************Dropdown menu for admin button**************/

function dropdownMenu() {

    const x = document.querySelector(".drop-menu");
    if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
}