<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>

    <div class="seccionLogin">
        <h2>Iniciar sesion</h2>
       <form method="POST" action="app/test.php">
           <input type="text" name="numero1" placeholder="Numero 1:">
           <input type="text" name="numero2" placeholder="Numero 2"> <br>        
            <button type="submit">Realizar operacion</button>
            <select name="select">
            <option value="1">Suma</option> 
            <option value="2">Resta</option>
            <option value="3" selected>Multiplicacion</option>
            <option value="4">Division</option>
            </select>

       </form>
    </div>
    
</body>
</html>