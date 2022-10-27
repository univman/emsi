<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Zadanie zdalne e-MSI</title>
</head>
<body>
    <p>
        <?php
            $result = $conn->query("SELECT * FROM vat");

            if(isset($_POST['vat_value'])) {
                $vat_value = $_POST['vat_value'];
                print_r($vat_value);
                $odp = $conn->query("UPDATE `vat` SET `VAT` = '$vat_value' WHERE `vat`.`ID` = 1;");
            }

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
                    $gross_amount = $row["NET_AMOUNT"] * $row["VAT"] * 0.01 + $row["NET_AMOUNT"];
                    $selected = $row["VAT"];
                    // if(isset($_GET)){
                    //     $selected = $row["VAT"];
                    // }
                    $options = array('0', '8', '23');

                    if(isset($_POST['vat_value'])) {
                        
                    }

                    echo "<tr>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["DESCRIPTION"] . "</td>";
                    echo "<td>" . $row["MPK"] . "</td>";
                    echo "<td>" . $row["NET_AMOUNT"] . " PLN</td>";
                    echo "<td>" . $row["AMOUNT"] . "</td>";
                    echo "<td>";
                    echo "<form action='' method='post' id='formularz'>";
                    echo "<select name='vat_value' onchange='document.getElementById(\"formularz\").submit();'>";
                    // if(isset($_POST['vat_value'])) {
                    //     $selected = $option;
                    // }
                    foreach($options as $option){
                        
                        if($selected == $option){
                            echo "<option selected='selected' value='$option'>$option %</option>";
                        } 
                        else {
                            echo "<option value='$option'>$option %</option>";
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
    </p>
</body>
</html>