<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/styles.css">
    <title>Zadanie zdalne e-MSI</title>
</head>
<body>
    <div id="container">

    <div id = 'title'>Zadanie zdalne e-MSI</div>
        <?php
            $conn = new mysqli("localhost", "root", "", "db_emsi") or die("Błąd połączenia");

            $config['path']['webs'] = './webs/';
            $config['file']['ext'] = '.php';
            
            $menu['other'] = 'Różne kontrolki HTML';
            $menu['employees'] = 'Tabela Pracowników';
            $menu['vat'] = 'Tabela Faktur VAT';
            $menu['delegations'] = ' Tabela Delegacji BD';
            $menu['contractor_form'] = 'Dane Kontrahentów';

            echo "<div id = 'Lewy'>";
                echo '<ul>';

                foreach($menu as $key => $item)
                {
                    echo '<li><a href="index.php?page='.$key.'">'.$item.'</a></li>';
                }

                echo '</ul>';
            echo "</div>";

            echo "<div id = 'Prawy'>";
                if(!isset($_GET['page']) || $_GET['page'] == 'other'){
                    include($config['path']['webs'].'other'.$config['file']['ext']);
                } else if(array_key_exists($_GET['page'], $menu)) {
                    include($config['path']['webs'].$_GET['page'].$config['file']['ext']);
                } else {
                    include($config['path']['webs'].'404'.$config['file']['ext']);
                }
            echo "</div>";

            $conn->close();
        ?>
    </div>
</body>
</html>