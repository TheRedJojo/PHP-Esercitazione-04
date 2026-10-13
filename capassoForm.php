<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capasso Esercizio 3</title>
    <style>
        body{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        table {
            border: 3px solid black;
        }

        th {
            border: 3px solid black;
            background-color: lightblue;
            text-align: left;
            width: 300px;
            height: 35px;
        }

        td {
            border: 3px solid black;
            font-weight: normal; 
            text-align: left;
            width: auto;
            height: auto;
            
        }
    </style>
</head>
<body>

    <h4 align = "center">-------------Dettagli Macchina-------------</h4>

    <?php
        $marca = $_POST["marca"];
        $modello = $_POST["modello"];

        //Controllo se almeno una opzione è stata scelta
        if (isset($_POST['stato'])) { //isset verifica se una variabile ha un valore diverso da null
            $stato = $_POST['stato'];    //se appunto stato non è nul, assegnamo la variabile
        } else {
            $stato = "Non specificato"; //altrimenti appunti diremo che non sarà specificata
        }

        $anno = $_POST["anno"];
        $cilindrata = $_POST["cilindrata"];
        $cavalli = $_POST["cavalli"];
        $prezzo = $_POST["prezzo"];
        $targa = $_POST["targa"];

        if (isset($_POST['accessori'])) { //isset verifica se una variabile ha un valore diverso da null
            $accessori = implode(',', $_POST['accessori']);    //unisco i valori (con implode) separandoli con la virgla
        } else {
            $accessori = "Nessuno"; //altrimenti diremo che non ci sono
        }

        $descrizione = $_POST["descrizione"];

        // Creo una stringa deoi dati da scrivere nel file
        $riga_dati = "$marca,$modello,$stato,$anno,$cilindrata,$cavalli,$prezzo,$targa,$accessori,$descrizione\n";

        // Scrivo nel file F_AUTO.DAT
        $file = fopen("F_AUTO.DAT.txt", "a"); //Crea il file
        if ($file) {
            fwrite($file, $riga_dati); //Scrivo nel file tutta la riga dati che avevo già creato
            fclose($file);
            $msg_salvataggio = "Dati memorizzati con successo nel file F_AUTO.DAT!";
        } else {
            $msg_salvataggio = "Errore durante la scrittura nel file F_AUTO.DAT.";
        }
    ?>

    <table>
        <tr>
            <th class="etichetta">Marca</th>
            <td><?php echo $marca; ?></td>
        </tr>
        <tr>
            <th class="etichetta">Modello</th>
            <td><?php echo $modello; ?></td>
        </tr>
        <tr>
            <th class="etichetta">Stato</th>
            <td><?php echo $stato; ?></td>
        </tr>
        <tr>
            <th class="etichetta">Anno Costruzione</th>
            <td><?php echo $anno; ?></td>
        </tr>
        <tr>
            <th class="etichetta">Cilindrata</th>
            <td><?php echo $cilindrata; ?></td>
        </tr>
        <tr>
            <th class="etichetta">Cavalli</th>
            <td><?php echo $cavalli; ?></td>
        </tr>
        <tr>
            <th class="etichetta">Prezzo</th>
            <td><?php echo $prezzo . " €"; ?></td>
        </tr>
        <tr>
            <th class="etichetta">Targa</th>
            <td><?php echo $targa; ?></td>
        </tr>
        <tr>
            <th class="etichetta">Accessori</th>
            <td><?php echo $accessori; ?></td>
        </tr>
        <tr>
            <th class="etichetta">Descrizione aggiuntiva</th>
            <td><?php echo $descrizione; ?></td>
        </tr>
    </table>
</body>
</html>