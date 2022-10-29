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
        <table class="blueTable">
            <thead>
                <th>Lp.</th>
                <th>Opis</th>
                <th>MPK</th>
                <th>Kwota Netto</th>
                <th>Ilość</th>
                <th>VAT</th>
                <th>Kwota Brutto</th>
                <th>Wartość Netto</th>
                <th>Wartość Brutto</th>
            </thead>
        <?php
            $result = $conn->query("SELECT * FROM vat");

            if($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                    $options = array('0', '3', '8', '23');
                    $row_id = intval($row["ID"]);
                    $selected = $row["VAT"];
                    

                    if(isset($_POST['vat_value']) && $row_id == $_POST['vat_value'][0]) {

                        $explo = array_map('intval', explode(',', $_POST['vat_value']));
                        if($explo[0] == $row_id) {
                            $selected = $explo[1];
                            $conn->query("update `vat` set vat = '$selected' WHERE id = '$explo[0]';");
                        } else {
                            $selected = intval($row["VAT"]);
                        }

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
                    echo "<form action='' method='post' id='formularz$row_id'>";
                    echo "<select name='vat_value' onchange='document.getElementById(\"formularz$row_id\").submit()'>";
                    
                    foreach($options as $option){
        
                        if($selected == $option){
                            echo "<option selected='selected' value='$row_id,$option'>$option %</option>";
                        } 
                        else {
                            echo "<option value='$row_id,$option'>$option %</option>";
                        }
                    }

                    echo "</select>";
                    echo "</form>";
                    echo "</td>";

                    echo "<td>" . $gross_amount . " PLN</td>";
                    echo "<td>" . round($row["NET_AMOUNT"] * $row["AMOUNT"], 2) . " PLN</td>";
                    echo "<td>" . round($gross_amount * $row["AMOUNT"], 2) . " PLN</td>";
                    echo "</tr>";
                }

                echo "</table>";

            } else {
                echo "Pusta baza danych";
            }
        ?>
        </br>
        <form action="" method="post">
            <input type="submit" name="change_color" value="Powyżej 1000,00 zł Netto">
        </form>
    </p>
</body>
</html>