<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        table, tr, td{
            border: 1px solid #000000;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
</head>
<body>

<main>


    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <div style="font-size: 25px;"><center><h1 class="text-center">Multiservios<strong><span style="color:#1DD14A">MRservice</span></strong> </h1>
                        <small class="-align-center"> Multiservicios MRservice C.A </small> <br>
                        <small class="-align-center"> Ave Don Julio Centeno calle 190 tarapio </small><br>
                        <small class="-align-center"> Multiservicios MRservice TLF:0414-340-3559 </small><br>
                        <small class="-align-center"> Municipio San Diego Edo Carabobo </small></center><br>
                </div>


                    <small class="-align-center" style="font-size: 20px;"> Informacion de la Factura </small>
                <table id="factura" style="border: 1px solid;" >


                    <tr>
                        <td >Nro Identificador</td>
                        <td >origen</td>
                        <td >destino</td>
                        <td >Chofer</td>
                        <td >monto</td>
                        <td >tipo de servicio</td>
                        <td>Placa del vehiculo </td>

                    </tr>

                    @foreach($data as $d)



                        <tr>
                            <td >{{ $d->id}}</td>
                            <td >{{ $d->origen }}</td>
                            <td >{{ $d->destino}}</td>
                            <td >{{ $d->chofer_id }}</td>
                            <td >{{ $d->monto}}</td>
                            <td >{{ $d->tipo_servicio }}</td>
                            <td >{{ $d->placa }}</td>

                        </tr>

                                @endforeach

                    <small class="-align-center" > Total a Cancelar </small><br>

                    <small class="-align-center" > Sub-total a Cancelar </small>



                </table>
        </div>
    </div>
        </div>



    </main>
</body>
</html>