<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Home </title>
        <meta name="viewport" content="width=device-width, initial-scale:1.0">
        <link href='https://fonts.googleapis.com/css?family=Nunito' rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Catamaran' rel='stylesheet'>
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="products.css">
    </head>    
    <body>
        <header>
            <a href="home.html"> <img src="images/logo.jpg" alt="Unilab" class="logo"> </a>
            <nav>
                <ul>
                    <li><img src="images/home.png" alt="Home" class="icon"><a href="home.html">Home</a></li>
                    <li>
                        <img src="images/products.png" alt="Products" class="icon">
                        <a class="sub">Products
                            <ul class="submenu">
                                <li><a href="searchchem.php">Chemicals</a></li>
                                <li><a href="searchlab.php">Lab Equipment</a></li>
                                <li><a href="searchglass.php">Glassware</a></li>
                                <li><a href="products.php">Plasticware</a></li>
                            </ul>
                        </a>
                    </li>
                    <li><img src="images/contact.png" alt="Contact" class="icon"> <a href="contact.html">Contact Us</a></li>
                    <li class="searching">
                        <form name="search" method="get" id="search" action="search.php">
                            <input type="text" placeholder="Search.." name="search" class="search-bar" id="searchtext">
                            <button type="submit" class="searchbtn" onclick="location.href='search.php'">Search</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <br>
            <h3 class="many"> === Many More Lab Equipment Items in Stock === </h3>
            <section class="prod">
                <h1>Lab Equipment</h1>
                <br>
            </section>
            <section class="items">
                <?php
                include 'connect.php';
                //Step2
                $query = "SELECT * FROM Items Where Type like \"%Lab Equipment%\" Group By Name Order by Name asc";
                mysqli_query($db, $query) or die('Error querying database.');
                //Step3
                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_array($result);
                $num = mysqli_num_rows($result);
                echo "<br>";
                if ($num > 0) {
                    $name = $row['Name'];
                    echo "<div class=\"item-cont\">";
                    echo "<img src='images/logo1.png' class=\"photo\" >";
                    echo "<div class=\"text\">". $name ."</div> ";
                    echo "</div>";
                    //echo $num." results returned";
                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row['Name'];
                        echo "<div class=\"item-cont\">";
                        echo "<img src='images/logo1.png' class=\"photo\" >";
                        echo "<div class=\"text\">". $name ."</div> ";
                        echo "</div>";
                        $i++;
                    }
                }
                echo "<br>";
                //Step 4
                mysqli_close($db);
                ?>
            </section>
            <script src="product.js"></script>
        </main>
        <footer class="footer">
            <ul>
                <li class="copy"><a>&copy; Dylan Shah </a></li>
                
            </ul>
        </footer>
    </body>
</html>