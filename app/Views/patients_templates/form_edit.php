<form class="patient-form edit-form hidden" action="/ecabcardio/public/patients" method="POST">

    <div class="outer-wraper">
        <div class="inner-wraper">
            <span class="patient-field-text">Name </span>
            <input class="form-control" type="text" id="name">
        </div>
        <div class="inner-wraper">
            <span class="patient-field-text">Surname </span>
            <input class="form-control" type="text" id="surname">
        </div>
    </div>

    <div class="outer-wraper">
        <div class="inner-wraper">
            <span class="patient-field-text">Phone </span>
            <input class="form-control" type="text" id="phone">
        </div>

        <div class="inner-wraper">
            <span class="patient-field-text">Email </span>
            <input class="form-control" type="email" id="email">
        </div>

    </div>

    <div class="outer-wraper">
        <div class="inner-wraper" style="width: 50%;">
            <span class="patient-field-text">City </span>
            <select class="form-control" id="city"></select>
        </div>

        <div class="inner-wraper">
            <span class="patient-field-text">County </span>
            <input type="text" class="form-control" id="county" conty_id disabled></select>
        </div>

    </div>

    <div class="outer-wraper">
        <div class="inner-wraper">
            <span class="patient-field-text">Address </span>
            <input class="form-control" type="text" id="address">
        </div>

        <div class="inner-wraper">
            <span class="patient-field-text">Work Place </span>
            <input class="form-control" type="text" id="work_place">
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
            <input class="form-control" type="text" id="occupation">
        </div>
    </div>

    <div class="outer-wraper">
        <div class="inner-wraper">
            <span class="patient-field-text">Birth Date </span>
            <input class="form-control" type="date" id="birth_date">
        </div>

        <div class="inner-wraper">
            <span class="patient-field-text">CNP </span>
            <input class="form-control" type="text" id="cnp">
        </div>
    </div>

    <button class="button-blue save-changes" type="submit">Save Changes</button>
    <button class="btn-secondary cancel-edit cancel" type="button">Cancel</button>
</form>

<script type="module" src="/ecabcardio/public/javascript/patients_edit.js"></script>