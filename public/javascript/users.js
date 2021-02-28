function checkRadio() {
    const rbs = document.querySelectorAll('.input-1');
    for (const rb of rbs) {
        rb.checked = true;
    }
}

checkRadio();