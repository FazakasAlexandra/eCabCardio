<div class="patients-page-container">

    <div class="pacients-table-wraper">

        <div class="pacients-table-searchbar">

            <form action="http://localhost/ecabcardio/public/patients/search" method="GET" class="searchbar-form">

                <select name="search-criteria" id="">
                    <option value="name">name</option>
                    <option value="surname">surname</option>
                    <option value="cnp">CNP</option>
                </select>

                <input name="search-value" type="text">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>

            <a id="advanced-search-button">ADVANCED SEARCH </a>
            <a id="add-patient-button"><i class="fas fa-plus"></i></a>

        </div>

        <div class="pacients-table-searchbar hiden" >
            <form action="http://localhost/ecabcardio/public/patients/search" method="GET" class="searchbar-form advanced">

                <div class="wraper">
                    <label for="name">NAME</label>
                    <input name="name" type="text">
                </div>

                <div class="wraper">
                    <label for="surname">SURNAME</label>
                    <input name="surname" type="text">
                </div>

                <div class="wraper">
                    <label for="cnp">CNP</label>
                    <input name="cnp" type="text">
                </div>

                <button type="submit">SEARCH</button>
            </form>
        </div>

        <table style="width:100%">
            <tr>
                <th>NAME</th>
                <th>SURNAME</th>
                <th>CNP</th>
                <th id="order-by-th" colspan="3"><span>ORDER NAME BY :</span>
                    <a href="http://localhost/ecabcardio/public/patients/offset/0/ASC"><i class="fas fa-arrow-up"></i></a>
                    <a href="http://localhost/ecabcardio/public/patients/offset/0/DESC"><i class="fas fa-arrow-down"></i></a>
                </th>
            </tr>

            <?php foreach ($patients as $patient) : ?>

                <tr>
                    <td><?php echo $patient['name'] ?></td>
                    <td><?php echo $patient['surname'] ?></td>
                    <td><?php echo $patient['cnp'] ?></td>
                    <td><a href="http://localhost/ecabcardio/public/patients/edit" id="edit-patient-button"><i class="fas fa-pen"></i>EDIT PATIENT</a></td>
                    <td><a href="http://localhost/ecabcardio/public/patients/consult" id="consult-patient-button">CONSULT</a></td>
                    <td><a href="http://localhost/ecabcardio/public/patients/history" id="history-patient-button"><i class="fas fa-history"></i></a></td>
                </tr>

            <?php endforeach; ?>

        </table>

        <div class="pagination">
            <a href="">
                < PREVIOUS </a>
                    <a href=""> NEXT > </a>
        </div>
    </div>
</div>