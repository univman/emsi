<p>
    <?php
        $selected_color1 = "#FFFFFF";
        $selected_color2 = "#b71f1f";

        $result = $conn->query("SELECT * FROM delegations");

        if($result->num_rows > 0) {

            echo "<table class=\"blueTable\">";

            echo "<thead>";
            echo "<th>Lp.</th>";
            echo "<th>Imię i Nazwisko</th>";
            echo "<th>Data od</th>";
            echo "<th>Data do</th>";
            echo "<th>Miejsce wyjazdu</th>";
            echo "<th>Miejsce przyjazdu</th>";
            echo "</thead>";

            while($row = $result->fetch_assoc()) {
                
                echo "<tr>";
                echo "<td>" . $row["ID"] . " </td>";
                echo "<td>" . $row["NAME_SURNAME"] . " </td>";
                echo "<td>" . $row["DATA_FROM"] . " </td>";
                echo "<td>" . $row["DATA_TO"] . " </td>";
                echo "<td>" . $row["DEPARTURE"] . " </td>";
                echo "<td>" . $row["ARRIVAL"] . " </td>";
                echo "</tr>";
            }

            echo "</table>";

        } else {

            echo "Pusta baza danych";

        }
    ?>
</p>