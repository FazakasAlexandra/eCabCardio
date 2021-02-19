    <div class="pacients-table-searchbar">

        <!-- REGULAR PATIETNS SEARCH FORM  -->
        <form action="/ecabcardio/public/patients/search" method="GET" class="searchbar-form">

            <a id="advanced-search-button"><i class="fas fa-angle-up"></i></a>

            <select name="search-criteria" id="">
                <option value="name">name</option>
                <option value="surname">surname</option>
                <option value="cnp">CNP</option>
            </select>

            <input name="search-value" type="text">

            <!-- SEARCH BUTTON  -->
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        <!-- ADD PATIENT BUTTON  -->
        <a class="add-patient-button" href="/ecabcardio/public/patients/add">
            <span class="add-patient-button-icon"><i class="fas fa-plus"></i></span>
            <span class="add-patient-button-text">Add Patient</span>
        </a>

    </div>