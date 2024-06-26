
<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacija</title>
    <link rel="stylesheet" href="rezervacija.css">
</head>
<body>
    <div class="container">
        <h2>Rezervacija</h2>
        <form id="rezervacijaForm" action="submit.php" method="POST">

            <label for="ime">Ime:</label>
            <input type="text" id="ime" name="ime" required>

            <label for="prezime">Prezime:</label>
            <input type="text" id="prezime" name="prezime" required>

            <label for="telefon">Broj telefona:</label>
            <input type="tel" id="telefon" name="telefon" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="check_in">Check-in:</label>
            <input type="date" id="check_in" name="check_in" required>

            <label for="check_out">Check-out:</label>
            <input type="date" id="check_out" name="check_out" required>

            <label for="odrasli">Broj odraslih:</label>
            <input type="number" id="odrasli" name="odrasli" required>

            <label for="djeca">Broj djece:</label>
            <input type="number" id="djeca" name="djeca" required>

            <label for="soba">Izaberi sobu:</label>
            <select id="soba" name="soba" required>
                <option value="PORODICNA SOBA">PORODICNA SOBA</option>
                <option value="DVOKREVETNA SOBA DELUXE">DVOKREVETNA SOBA DELUXE</option>
                <option value="DVOKREVETNA SOBA DELUXE s pogledom na grad">DVOKREVETNA SOBA DELUXE s pogledom na grad</option>
                <option value="JUNIOR SUITE">JUNIOR SUITE</option>
                <option value="EKONOMI DVOKREVETNA">EKONOMI DVOKREVETNA</option>
                <option value="SUPERIOR DVOKREVETNA">SUPERIOR DVOKREVETNA</option>
                <option value="KLASIK JEDNOKREVETNA">KLASIK JEDNOKREVETNA</option>
                <option value="KLASIK DVOKREVETNA">KLASIK DVOKREVETNA</option>
            </select>

            <input type="submit" value="Rezerviši sada">
        </form>
        <div id="popup" class="popup">
            <p>Hvala vam, uspješno ste se rezervisali! Kontaktirat ćemo vas uskoro.</p>
        </div>
    </div>
    <?php
include 'footer.php';
?>
    <script>
document.getElementById('rezervacijaForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

   
    var formData = new FormData(document.getElementById('rezervacijaForm'));

   
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.status === 'success') {
               
                document.getElementById('popup').style.display = 'block';
                document.getElementById('popup').innerText = response.message;

              
                setTimeout(function() {
                    document.getElementById('popup').style.display = 'none';
                }, 10000); 

                
                document.getElementById('rezervacijaForm').reset();
            } else {
                alert('Došlo je do greške: ' + response.message);
            }
        } else {
            alert('Došlo je do greške prilikom slanja podataka. Pokušajte ponovo.');
        }
    };
    xhr.send(formData);
});
</script>
</body>
</html>
