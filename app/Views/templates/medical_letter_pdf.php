<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>medical letter</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito+Sans");
        body{
            font-family: "Nunito Sans", sans-serif;

        }
        h1,
        h4 {
            border-bottom: solid;
            border-width: thin;
        }

        h1 {
            border-top: 0px;
        }

        .wrapper {
            border-style: solid;
            border-width: thin;
            padding: 0rem 1rem 0rem 1rem;
            margin-bottom: 1rem;
            border-radius: 0.3rem;
        }

        .wrapper .examinations {
            width: 50%;
        }

        .footer {
            display: flex;
        }

        #date {
            margin-left: 82%;
        }
    </style>
</head>

<body>
    <div class="medical-letter-pdf">
        <img src="/wamp64/www/ecabcardio/public/assets/logo.png" alt="">
        <h1>Medical letter</h1>

        <p><?php echo $medical_letter->letter_info ?></p>
        <p><?php echo $medical_letter->patient_info ?></p>

        <div class="wrapper">
            <h4>Consult reason</h4>
            <p><?php echo $medical_letter->consult_reason ?></p>
        </div>
        <div class="wrapper">
            <h4>Observations</h4>
            <p><?php echo $medical_letter->observations ?></p>
        </div>
        <div class="wrapper">
            <h4>Recommendations</h4>
            <p><?php echo $medical_letter->recommendations ?></p>
        </div>
        <div class="wrapper examinations">
            <h4>Examinations</h4>
            <ul>
                <?php foreach ($medical_letter->examinations as $examination) : ?>
                    <li><?php echo $examination['name'] ?> .... <?php echo $examination['price'] ?> lei</li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="wrapper analysis">
            <h4>Analysis</h4>
            <ul>
                <?php foreach ($medical_letter->analysis as $analysis) : ?>
                    <li><?php echo $analysis['name'] ?> .... <?php echo $analysis['price'] ?> lei</li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="footer">
            <p>Signature</p>
            <p id="date">Date <?php echo $medical_letter->date ?></p>
        </div>
    </div>
</body>

</html>