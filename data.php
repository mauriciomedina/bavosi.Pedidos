<?php
/**
 * Created by PhpStorm.
 * User: gmartin
 * Date: 29/01/2016
 * Time: 07:46 PM
 */
$dataJSON = json_encode("");

mssql_connect('192.168.1.16','sa','savote');
$res = mssql_query("use sav; select la.articulo_id codigo, a.DESCRIPCIO descripcion, la.precioSinIVA precio
                    from ListaDePrecio l
                    inner join ListaDePrecioArticulo la on l.id = la.listaDePrecio_id
                    inner join webArticulos a on la.articulo_id = a.COD_ARTICU
                    where l.activo = '1'
                    and la.articulo_id = '".$_POST["codigo"]."'");

$array = array();

while($row = mssql_fetch_assoc($res)){
    $array[] = $row;
}
$dataJSON = json_encode($array);

echo $dataJSON;