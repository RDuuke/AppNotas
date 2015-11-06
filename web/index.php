<?php
        if(isset($_POST['item'])){
            $sumN = 0;
            $sumP = 0;
            $P = 100;
            //print_r($_POST['item']);
            //echo count($_POST['item']);
            foreach($_POST['item'] as $a){
                $sumN = $a['nota']*($a['promedio']/100) + $sumN;
                $sumP = $a['promedio'] + $sumP;
            }

            echo 'Nota:' . $sumN .' - Promedio Evaluado ' .$sumP. ' - Promedio restante ' . ($P-$sumP) .'<br>';
            echo 'Nota minima que debe sacar en el tiempo restante es:' .(3-$sumN)/(($P-$sumP)/100);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Algoritmo</title>
</head>
<body>
<form action="" method="POST" id="form">
    <div class="contenedor">
    <input type="number" placeholder="0.0" name="item[0][nota]" step="any" min="0" max="5" required>
    <input type="number" placeholder="00"name="item[0][promedio]" min="0" max="100" required><br>
    </div>
    <button>Enviar</button>
</form>
<button id="add">agregar</button>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $("#add").on('click', function () {
       var $i = $('#form input').length/2;
        $('.contenedor').append('<input type="number" placeholder="0.0" name="item['+$i+'][nota]" step="any" min="0" max="5" required>' +
            '<input type="number" placeholder="00"name="item['+$i+'][promedio]" min="0" max="100" required><br>');
    })
</script>
</body>
</html>