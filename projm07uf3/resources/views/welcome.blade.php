<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
    </head>
    <body>
        <form action="opcion" method="GET">
            <button name="opcion" value="graella">Graella</button>
            <button name="opcion" value="canal">Canal</button>
            <button name="opcion" value="programa">Programa</button>
        </form>
    </body>
</html>
