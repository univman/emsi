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
            $selected_color1 = "#EEEEEE";
            $selected_color2 = "#D0E4F5";

            $result = $conn->query("SELECT * FROM employees");
            
            if(isset($_POST['clr1']) || isset($_POST['clr2'])){
                $selected_color1 = $_POST['clr1'];
                $selected_color2 = $_POST['clr2'];
            }

            if($result->num_rows > 0) {

                echo "<table class=\"blueTable\">";

                echo "<thead>";

                echo "<tr>";
                echo "<th>Lp.</th>";
                echo "<th>Imię</th>";
                echo "<th>Nazwisko</th>";
                echo "<th>Stanowisko</th>";
                echo "<th>Data zatrudnienia</th>";
                echo "<th>Ilości dni urlopowych</th>";
                echo "</tr>";

                echo "</thead>";

                while($row = $result->fetch_assoc()) {
                    if($row["ID"] % 2 == 0) {
                        echo "<tr style='background-color:" . $selected_color2 . "'>";
                    } else {
                        echo "<tr style='background-color:" . $selected_color1 . "'>";
                    }
                    echo "<td>" . $row["ID"] . " </td>";
                    echo "<td>" . $row["NAME"] . " </td>";
                    echo "<td>" . $row["SURNAME"] . " </td>";
                    echo "<td>" . $row["POSITION"] . " </td>";
                    echo "<td>" . $row["EMPLOYMENT_DATE"] . " </td>";
                    echo "<td>" . $row["AMOUNT_OF_VACATION_DAY"] . " </td>";
                    echo "</tr>";
                }

                echo "</table>";

            } else {

                echo "Pusta baza danych";

            }
        ?>

        </br>
        <form action="" method="post">
            <label for="favcolor">Wybierz kolor tła nieparzystych wierszy:</label>
            <input type="color" name="clr1" value="<?= $selected_color1 ?>"><br><br>
            <label for="favcolor">Wybierz kolor tła parzystych wierszy:</label>
            <input type="color" name="clr2" value="<?= $selected_color2 ?>"><br><br>
            <input type="submit" value="Zmień kolor">
        </form>
    </p>
</body>
</html>