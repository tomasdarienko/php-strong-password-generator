<!-- Ciao a tutti!
nome repo: php-strong-password-generator
Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1

Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file *index.php*

Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file *functions.php* che includeremo poi nella pagina principale

Milestone 3 (BONUS)
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
Milestone 4 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali. (modificato)  -->

<?php

if(isset($_GET["lunghezza"]))
$lung = $_GET["lunghezza"];



function generateRandomString($lung)
{
     $letteraMaius = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "Z");
     $lettera = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u");
     $num = array("1", "2", "3", "4", "5", "7", "8", "9", "0");
     $simb = array("?", ">", ".", ":", "=", "+", "µ", "≈", "∂");
     $passw = '';

     while (strlen($passw) < $lung){
          $rand = array_rand($lettera);
          $passw .= $lettera[$rand];
          $rand = array_rand($letteraMaius);
          $passw .= $letteraMaius[$rand];
          $rand = array_rand($num);
          $passw .= $num[$rand];
          $rand = array_rand($simb);
          $passw .= $simb[$rand];
     }
     if(strlen($passw) !== $lung){
        return $rest = substr($passw, 0,-(strlen($passw) - $lung ));
     }
     else{
          return  $passw;
     }
     
};



?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>psswrdgnrtr</title>
</head>

<body>

     <div>
          <form action="">
               <input type="text" name="lunghezza" placeholder="inserisci la lunghezza della password" >
               <button type="submit">genera</button>
          </form>

     </div>
     <p>
          <?php if(isset($_GET["lunghezza"])){?>
          <?php echo generateRandomString($lung) ?>
          <?php }?>
     </p>
</body>

</html>