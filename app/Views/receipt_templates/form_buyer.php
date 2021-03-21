<div class="receipt-field buyer-type">
    <h1>Buyer</h1>

    <div class="type-wrapper">
        <p>Buyer type</p>
        <div class="radio-buttons-wrapper">
            <div>
                <input type="radio" name="buyer_type" value="person" checked><span>Person</span>
            </div>
            <div>
                <input type="radio" name="buyer_type" value="company"><span>Company</span>
            </div>
        </div>
    </div>

    <hr>

    <!-- PERSON FIELD -->
    <div id="person-field">
        <div class="outer-wrapper">
            <div class="inner-wrapper">
                <p>Patient name</p>
                <input disabled type="text" class="form-control" value="<?php echo $receipt->patient->name . ' ' . $receipt->patient->surname ?>">
            </div>
            <div class="inner-wrapper">
                <p>CNP</p>
                <input disabled type="text" class="form-control" value="<?php echo $receipt->patient->cnp ?>">
            </div>
        </div>

        <div class="outer-wrapper">
            <div class="inner-wrapper">
                <p>City</p>
                <input disabled type="text" class="form-control" value="<?php echo $receipt->patient->city ?>">
            </div>
            <div class="inner-wrapper">
                <p>Address</p>
                <input disabled type="text" class="form-control" value="<?php echo $receipt->patient->address ?>">
            </div>
        </div>
    </div>

    <!-- COMPANY FIELD -->
    <div class="company-wrapper">
        <div id="company-field" class="hidden">
            <!-- SELECT COMPANY INPUT -->
            <select name="company_id" class="form-control company-select" id="selected-company">
                <option value="0">Select a company</option>
                <?php foreach ($receipt->companies as $comp) : ?>
                    <option value="<?php echo $comp->id ?>"><?php echo $comp->name ?></option>
                <?php endforeach; ?>
            </select>
            <!-- ADD COMPANY BUTTON -->
            <button type="button" class="button-blue add-company"><i class="fas fa-plus"></i>New company</button>
        </div>

        <!-- SELECTED COMPANY DATA -->
        <div class="selected-company-container"></div>

        <!-- ADD NEW COMPANY FORM -->
        <div class="add-company-form hidden">
            <div class="outer-wrapper">
                <div class="inner-wrapper">
                    <p>Company name</p>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="inner-wrapper">
                    <p>Fiscal number</p>
                    <input type="text" class="form-control" id="fiscal-number">
                </div>
            </div>
            <div class="outer-wrapper">
                <div class="inner-wrapper">
                    <p>ORC number</p>
                    <input type="text" class="form-control" id="orc-number">
                </div>
                <div class="inner-wrapper">
                    <p>Address</p>
                    <input type="text" class="form-control" id="address">
                </div>
            </div>
            <div class="outer-wrapper">
                <div class="inner-wrapper">
                    <p>Bank account</p>
                    <input type="text" class="form-control" id="bank-account">
                </div>
                <div class="inner-wrapper">
                    <p>Bank</p>
                    <input type="text" class="form-control" id="bank">
                </div>
            </div>
            <div class="outer-wrapper">
                <select name="counties" class="form-control" id="county">
                    <option value="0">Select a county</option>
                    <?php foreach ($receipt->counties as $county) : ?>
                        <option value="<?php echo $county['id'] ?>"><?php echo $county['county'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
</div>