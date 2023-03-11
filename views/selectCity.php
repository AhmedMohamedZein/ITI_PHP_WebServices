<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SelectCity</title>
    <link rel="stylesheet" href="styles/selectCity.css">
</head>
<body>

    <main class="container">
        <?php 
            if ( isset ($data) ) {
                echo '
                <section style="color: #F6EEC9;">
                    <div style="padding-left : 20px ;">
                        <h1> Weather Status for '.$weather_name.' </h1>
                        <h4>'.date("l jS \of F").'</h4>
                        <h4>'.$temp_min - 273.15.' C'.'</h4>     
                        <h4>'.$temp_max - 273.15.' C'.'</h4>
                        <h4>'.$humidity.'%'.' </h4>
                        <h4>'.$wind.' Km/h'.' </h4>
                    </div>
                </section>
                ';
            }
        ?>
        <form action="" method="POST">
            <select name="cities" id="selected" required>
                <option value="" selected>-- City --</option>
                <?php 
                    //Here we will generate the egyption cities as an opetion <option value=".city.">.city.</option>
                    foreach ($cities as $city) {
                        echo '<option value="'.$city["name"].'">'.$city["name"].'</option>';
                    }
                ?>
            </select>
            <button type="submit" id="Add" value="">GET Weather</button>
        </form>
    </main>
    <script src="scripts/selectCity.js" defer></script>
</body>
</html>