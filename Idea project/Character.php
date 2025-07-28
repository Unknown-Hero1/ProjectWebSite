<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projekt";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Name, Rarity, IMG_name, Path, Element FROM hsr_heroes ORDER BY ID ASC";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=1">
    <title>HOYO helper</title>
</head>
<body>
    <header>
        <div id="HeaderWebSiteNameDiv">
            <img src="CharactersPhoto/Profile_Picture_Stelle_-_Welcome.webp" alt="icon" id="HeaderIconPicture">
        </div>
        
        <nav>
            <div class="NavButtons">
                <p>Main</p>
            </div>
            <div class="NavButtons">
                <p>Character</p>
            </div>
            <div class="NavButtons">
                <p>Ratings</p>
            </div>
            <div class="NavButtons">
                <p>Calculator</p>
            </div>
            <div class="NavButtons">
                <p>Guides</p>
            </div>
            <div id="Searchplace">
                <input type="text" id="search" placeholder="character search ..." />
                <button id="searchBtn"><img src="CharactersPhoto/loupe.png" alt="loupe" id="SearchBtnImg"></button>
                <div id="results"></div>
            </div>
        </nav>
    </header>
    <main> 
        <section>
            <div id="Placeholder">
                <h1 id="Titel">Characters</h1>
            </div>

            <?php if ($result && $result->num_rows > 0) { ?>
                  <div id="Charackters">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <div class="Personage">
                                <img src="CharaktersPhoto/<?php echo $row['IMG_name']; ?>" alt="<?php echo $row['Name']; ?>" class="Charackter_IMG">
                                <p><?php echo $row['Name']; ?></p>
                        
                                <?php if($row['Rarity'] == 5) { ?>
                                    <img src="5Star.webp">
                                <?php } elseif($row['Rarity'] == 4){ ?>
                                    <img src="4Star.webp">
                                <?php } else { ?>
                                    <p> None </p>
                                <?php } ?>
                            </div>
                    <?php } ?>
                  </div>
            <?php } else { ?>
                <p>Нет данных</p>;
            <?php } ?>
        </section>
    </main>

</body>
</html>
<?php
    $conn->close();
?>
