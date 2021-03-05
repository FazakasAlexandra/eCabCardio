<form class="patient-form add-form hidden" method="POST" action="/ecabcardio/public/patients/post">
<div class="header-form"><button type="button" class="button-close cancel">X</button></div>
<div class="alert alert-primary"><i class="fas fa-info"></i>All fields are required </div>
<div class="outer-wraper">
        <div class="inner-wraper">
            <span class="patient-field-text">Name </span>
            <input class="form-control" name="name" type="text" id="name">
        </div>
        <div class="inner-wraper">
            <span class="patient-field-text">Surname </span>
            <input class="form-control" name="surname" type="text" id="surname">
        </div>
    </div>

    <div class="outer-wraper">
        <div class="inner-wraper">
            <span class="patient-field-text">Phone </span>
            <input class="form-control" name="phone" type="text" id="phone">
        </div>

        <div class="inner-wraper">
            <span class="patient-field-text">Email </span>
            <input class="form-control" name="email" type="email" id="email">
        </div>

    </div>

    <div class="outer-wraper">
        <div class="inner-wraper" style="width: 50%;">
            <span class="patient-field-text">City </span>
            <select class="form-control" name="city_id" id="city"></select>
        </div>

        <div class="inner-wraper">
            <span class="patient-field-text">County </span>
            <input type="text" class="form-control" id="county" conty_id disabled></select>
        </div>

    </div>

    <div class="outer-wraper">
        <div class="inner-wraper">
            <span class="patient-field-text">Address </span>
            <input class="form-control" name="address" type="text" id="address">
        </div>

        <div class="inner-wraper">
            <span class="patient-field-text">Work Place </span>
            <input class="form-control" name="work_place" type="text" id="work_place">
        </div>

    </div>

    <div class="outer-wraper">
        <div class="inner-wraper">
            <span class="patient-field-text">Married </span>
            <div class="radio-wraper">
                <input type="radio" class="married" value="0" name="married">
                <label for="male">no</label>
                <input type="radio" class="married" value="1" name="married">
                <label for="female">yes</label>
            </div>
        </div>

        <div class="inner-wraper">
            <span class="patient-field-text">Occupation </span>
            <input class="form-control" name="occupation" type="text" id="occupation">
        </div>
    </div>

    <div class="outer-wraper">
        <div class="inner-wraper">
            <span class="patient-field-text">Birth Date </span>
            <input class="form-control" name="birth_date" type="date" id="birth_date">
        </div>

        <div class="inner-wraper">
            <span class="patient-field-text">CNP </span>
            <input class="form-control" name="cnp" type="text" id="cnp">
        </div>
    </div>

    <button class="button-blue save-button">Save</button>
</form>

<script type="module" src="/ecabcardio/public/javascript/patients_add.js"></script>