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
        <form action="">
            <select name="Cities" id="">
                <option value="" selected>-- City --</option>
                <?php 
                    //Here we will generate the egyption cities as an opetion <option value=".city.">.city.</option>
                    foreach ($cities as $city) {
                        
                    }
                ?>
            </select>
            <button type="button" id="Add" value="">GET Weather</button>
        </form>
    </main>
    <script src="scripts/selectCity.js" defer></script>
</body>
</html>