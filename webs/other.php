<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie zdalne e-MSI</title>
</head>
<body>
    <p>
        <?php
            $result = $conn->query("SELECT * FROM contractors");

            if($result->num_rows > 0) {

                echo "<table>";

                echo "<tr>";
                echo "<th>Numer NIP</th>";
                echo "<th>Numer REGON</th>";
                echo "<th>Nazwa</th>";
                echo "<th>Data utworzenia</th>";
                echo "<th>Ulica</th>";
                echo "<th>Numer budynku</th>";
                echo "<th>Numer lokalu</th>";
                echo "<th>Uwagi</th>";
                echo "</tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["NIP"] . " </td>";
                    echo "<td>" . $row["REGON"] . " </td>";
                    echo "<td>" . $row["NAME"] . " </td>";
                    echo "<td>" . $row["CREATION_DATE"] . " </td>";
                    echo "<td>" . $row["STREET"] . " </td>";
                    echo "<td>" . $row["STREET_NUMBER"] . " </td>";
                    echo "<td>" . $row["APARTMENT_NUMBER"] . " </td>";
                    echo "<td>" . $row["NOTES"] . " </td>";
                    echo "</tr>";
                }

                echo "</table>";

            } else {

                echo "Pusta baza danych";

            }
        ?>
    </p>
</body>
</html>