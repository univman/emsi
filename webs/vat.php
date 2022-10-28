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
            $result = $conn->query("SELECT * FROM vat");

            if($result->num_rows > 0) {

                echo "<table>";
                echo "<tr>";
                echo "<th>Lp.</th>";
                echo "<th>Opis</th>";
                echo "<th>MPK</th>";
                echo "<th>Kwota Netto</th>";
                echo "<th>Ilość</th>";
                echo "<th>VAT</th>";
                echo "<th>Kwota Brutto</th>";
                echo "<th>Wartość Netto</th>";
                echo "<th>Wartość Brutto</th>";
                echo "</tr>";

                while($row = $result->fetch_assoc()) {
                    $options = array('0', '8', '23');
                    $row_id = intval($row["ID"]);
                    $selected = $row["VAT"];
                    
                    // print_r($explo);
                    
                    if(isset($_POST['vat_value'])) {
                        $explo = array_map('intval', explode(',', $_POST['vat_value']));
                        if($explo[1] == $row_id) {
                            $selected = $explo[0];
                        } else {
                            $selected = intval($row["VAT"]);
                        }

                        echo var_dump($selected);

                        // echo "Linijka" . $row_id . "</br>";
                        // echo "Wartość:" . $explo[0] . " ";
                        // echo "Row:" . $explo[1] . "</br> </br>";
                        $conn->query("UPDATE `vat` SET `VAT` = '$selected' WHERE `vat`.`ID` = '$explo[1]';");
                    }
                    $gross_amount = $row["NET_AMOUNT"] * $selected * 0.01 + $row["NET_AMOUNT"];
                    
                    
                    if(1000 < $row["NET_AMOUNT"] && isset($_POST['change_color'])) {
                        echo "<tr style='background-color:#00FF00'>";
                    } else {
                        echo "<tr>";
                    }
                    echo "<td>" . $row_id . "</td>";
                    echo "<td>" . $row["DESCRIPTION"] . "</td>";
                    echo "<td>" . $row["MPK"] . "</td>";
                    echo "<td>" . $row["NET_AMOUNT"] . " PLN</td>";
                    echo "<td>" . $row["AMOUNT"] . "</td>";

                    echo "<td>";
                    echo "<form action='' method='post' id='formularz'>";
                    echo "<select name='vat_value' onchange='document.getElementById(\"formularz\").submit()'>";
                    $temp = $row["ID"];
                    foreach($options as $option){
        
                        if($selected == $option){
                            echo "<option selected='selected' value='$option, $temp'>$option %</option>";
                        } 
                        else {
                            echo "<option value='$option, $temp'>$option %</option>";
                        }
                    }
                    echo "</select>";
                    echo "</form>";
                    echo "</td>";

                    echo "<td>" . $gross_amount . " PLN</td>";
                    echo "<td>" . $row["NET_AMOUNT"] * $row["AMOUNT"] . " PLN</td>";
                    echo "<td>" . $gross_amount * $row["AMOUNT"] . " PLN</td>";
                    echo "</tr>";
                }

                echo "</table>";

            } else {
                echo "Pusta baza danych";
            }
        ?>

        <form action="" method="post">
            <input type="submit" name="change_color" value="Powyżej 1000,00 zł Netto">
        </form>
    </p>
</body>
</html>