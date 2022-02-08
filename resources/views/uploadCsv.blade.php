<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/padron.css')}}">
    <title>Subir Padron elecciones</title>
</head>

<body>
    
        <form action="{{route('subir_archivo')}}" class="form-register" method="POST" enctype="multipart/form-data">
            <h1 class="form__title">INTRODUCIR PADRON ELECTORAL</h1>
            <!--
            <div class="container--flex">
                <label for="" class="form__label">Nombre de la Eleccion</label>
                <input type="text" class="form__input" name="Nombre" required>

            </div>
            <div class="container--flex">
                <label for="" class="form__label"> Nombre del Padron </label>
                <input type="text" class="form__input" name="Npadron" required>
            </div>
            <div class="container--flex">
                <label for="" class="form__label">Fecha</label>
                <input type="date" class="form__input" required>
            </div>
        -->
            {{csrf_field()}}
                    <table>
                        <tr>
                            <td class="letra" width="250"><strong>Subir Archivo CSV:</strong></td>
                            <td><input type="file" name="foto" id="foto"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="enviar" value="SUBIR" class="boton"></td>
                            <td colspan="2" align="center"><a href="/" class="btn btn-primary">Volver</a></td>
                        </tr>
                    </table>

        </form>

</body>
</html>

<!--
<html>
    <head>
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
<body>

    <center><strong><label class="titulo">IMPORTAR REGISTROS DESDE ARCHIVO .CSV</label></strong></center>
        <p>
            <form action="{{route('subir_archivo')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <center>
                    <table>
                        <tr>
                            <td class="letra" width="250"><strong>Subir Archivo CSV:</strong></td>
                            <td><input type="file" name="foto" id="foto"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="enviar" value="SUBIR" class="boton"></td>
                            <td colspan="2" align="center"><a href="/" class="btn btn-primary">Volver</a></td>
                        </tr>
                    </table>
                </center>
            </form>
        </p>
    </center>
    </body>

</html>
-->
