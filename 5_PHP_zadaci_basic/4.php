<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    
        /*  1) Da bi gosti kafića mogli na distanci da sede tokom pandemije, ministarstvo je uvelo meru da za svakog 
        čoveka mora biti obezbeđeno 3m² površine lokala. Za posmatrani kafić su dati podaci da ima vm² i da je u 
        njemu trenutno n gostiju. Brojeve n i v određujete sami. 
        Vaš zadatak je da ispišete DA zelenom bojom ukoliko se kafić prema unetim podacima pridržava propisane
        mere ili NE crvenom bojom ukoliko se kafić ne pridržava propisane mere. 
        Ukoliko je ispis NE, crvenom bojom ispisati i koliko ljudi je potrebno da napusti lokal da bi mera bila
        zadovoljena.  */

        $v = 40;
        $n = 10;
        $vis = $n*3 - $v;
        
        if ($v > $n * 3){
            echo "<p style='color:green;'>DA</p>";
        }   
        else {
            echo "<p style='color:red;'>NE, $vis da napusti objekat</p>";
        }

    ?>
    
</body>
</html>