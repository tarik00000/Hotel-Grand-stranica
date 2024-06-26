
<?php
include 'header.php';
?>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
<img class='img-hotel' src="hotel_grand1.jpg" alt="">

<main>
<h2 style='font-family:Roboto Slab;'>
    Dobrodosli u Hotel Grand
</h2>
<p style='font-family: Source Sans Pro;'>
    Pretrazitie i rezervisite sobe u nasem hotelu jednostavno i brzo.
</p>
<div class="hotels">
        <?php
       
        echo "<div class='hotel'>";
        echo "<h2 style='font-family:Roboto Slab;'>PORODICNA SOBA </h2>";
        echo "<p style='font-family: Source Sans Pro;'>Porodicna soba se sastoji od dvije sobe sa 2 kupatila</p>";
        echo "<p style='font-family: Source Sans Pro;'>Cijena: 100 KM po noćenju</p>";
        echo "<img width = '400' style = 'border-radius: 5px;' src='sobe\Porodicna soba.jpg' alt=''>";
        echo "</div>";

        echo "<div class='hotel'>";
        echo "<h2 style='font-family:Roboto Slab;'>DVOKREVETNA SOBA DELUXE </h2>";
        echo "<p style='font-family: Source Sans Pro;'>Dvokrevetna soba s bračnim krevetom ili s 2 odvojena kreveta. Ova <br>
        dvokrevetna soba uključuje prostor za sjedenje, TV ravnog ekrana te kupaonicu s turskim kupatilom.</p>";
        echo "<p style='font-family: Source Sans Pro;'>Cijena: 250 KM po noćenju</p>";
        echo "<img width = '400' style = 'border-radius: 5px;' src='sobe\dvokrevetna soba.jpg' alt=''>";
        echo "</div>";

        echo "<div class='hotel'>";
        echo "<h2 style='font-family:Roboto Slab;'>Dvokrevetna soba Deluxe s pogledom na grad </h2>";
        echo "<p style='font-family: Source Sans Pro;'>Dvokrevetna soba s bračnim krevetom ili s 2 odvojena kreveta. Ova dvokrevetna soba uključuje prostor za sjedenje, TV ravnog ekrana te kupaonicu s turskim kupatilom.</p>";
        echo "<p style='font-family: Source Sans Pro;'>Cijena: 300 KM po noćenju</p>";
        echo "<img width = '400' style = 'border-radius: 5px;' src='sobe\pogled.jpg' alt=''>";
        echo "</div>";

        echo "<div class='hotel'>";
        echo "<h2 style='font-family:Roboto Slab;'>JUNIOR SUITE </h2>";
        echo "<p style='font-family: Source Sans Pro;'>Ovaj suite uključuje prostor za sjedenje s radnim stolom, TV ravnog ekrana te kupaonicu s hidromasažnom kadom i tušem.</p>";
        echo "<p style='font-family: Source Sans Pro;'>Cijena: 70 KM po noćenju</p>";
        echo "<img width = '400' style = 'border-radius: 5px;' src='sobe\junior.jpg' alt=''>";
        echo "</div>";

        echo "<div class='hotel'>";
        echo "<h2 style='font-family:Roboto Slab;'>EKONOMI DVOKREVETNA </h2>";
        echo "<p style='font-family: Source Sans Pro;'>Soba Economy sa 2 odvoijena kreveta</p>";
        echo "<p style='font-family: Source Sans Pro;'>Cijena: 70 KM po noćenju</p>";
        echo "<img width = '400' style = 'border-radius: 5px;' src='sobe\\ekonomi.jpg' alt=''>";
        echo "</div>";

        echo "<div class='hotel'>";
        echo "<h2 style='font-family:Roboto Slab;'>SUPERIOR DVOKREVETNA </h2>";
        echo "<p style='font-family: Source Sans Pro;'>Dvokrevetna soba sa bracnim krevetom ili sa 2 odvojena kreveta</p>";
        echo "<p style='font-family: Source Sans Pro;'>Cijena: 80 KM po noćenju</p>";
        echo "<img width = '400' style = 'border-radius: 5px;' src='sobe\dvokrevetna bracna.jpg' alt=''>";
        echo "</div>";

        echo "<div class='hotel'>";
        echo "<h2 style='font-family:Roboto Slab;'>KLASIK JEDNOKREVETNA </h2>";
        echo "<p style='font-family: Source Sans Pro;'>Jednokrevetna soba sa jednim krevetom.</p>";
        echo "<p style='font-family: Source Sans Pro;'>Cijena: 50 KM po noćenju</p>";
        echo "<img width = '400' style = 'border-radius: 5px;' src='sobe\klasik.jpg' alt=''>";
        echo "</div>";

        echo "<div class='hotel'>";
        echo "<h2 style='font-family:Roboto Slab;'>KLASIK DVOKREVETNA</h2>";
        echo "<p style='font-family: Source Sans Pro;'>Dvokrevetna soba sa bracnim krevetom ili sa 2 odvojena kreveta.</p>";
        echo "<p style='font-family: Source Sans Pro;'>Cijena: 70 KM po noćenju</p>";
        echo "<img width = '400' style = 'border-radius: 5px;' src='sobe\klasik dvokrevetna.jpg' alt=''>";
        echo "</div>";
        ?>
    </div>
</main>
<button id="scrollToTopBtn" onclick="scrollToTop()"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

<script>
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        var btn = document.getElementById("scrollToTopBtn");

        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            btn.style.display = "block";
        } else {
            btn.style.display = "none";
        }
    }

    function scrollToTop() {
        
        document.body.scrollIntoView({ behavior: 'smooth', block: 'start' });
        document.documentElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
</script>
<?php
include 'footer.php';
?>