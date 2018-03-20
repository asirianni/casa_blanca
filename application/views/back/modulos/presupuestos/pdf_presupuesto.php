<style>
    table{
        width: 100%;
        font-size: 9px;
    }
</style>

<table cellpadding="1" cellspacing="2">
    <tr>
        <td width="250" >
            <img  height="100" src="<?php echo base_url()?>recursos/images/logo-completo.png">
        </td>
        <td width="500" align="center">
            <p><strong>PRESUPUESTO N° 1</strong></p>
            <p><strong>FECHA 10-02-2018</strong></p>
        </td>
    </tr>
</table>


<h6>Institucion: Escuela Norma Superior Mariano Moreno</h6>

<br/>
<br/>

<table>
    <tr style="background-color: #ccc;margin-bottom: 10px;">
        <td width="170">
             <b>CANTIDAD</b>
        </td>
        <td width="170">
             <b>DESCRIPCIÓN </b>
        </td>
        <td width="170">
             <b>UNITARIO</b>
        </td>
        <td width="170">
             <b>TOTAL</b>
        </td>
    </tr>

    <!-- DETALLE -->
    <?php
    /*

        $suma_totales = 0;

        foreach ($detalle_pedido as $value)
        {
            $cantidad = (float)$value["cantidad"];
            $unitario = (float)$value["precio"];


            $subtotal =$unitario;
            $total=$subtotal*$cantidad;

            echo 
            "<tr>
                <td width='170' align='center'>".$cantidad."</td>
                <td width='170' align='center'>".$value["desc_producto"]."</td>
                <td width='170' align='center'>$".number_format($unitario,2,",",".")."</td>
                <td width='170' align='center'>$".number_format($total,2,",",".")."</td>
            </tr>";

            $suma_totales+=$total;
        }*/
    ?>
</table>
<br>
<br>
<table>
    <tr >
        <td width="510">
            &nbsp;
        </td>
        <td width="170">
             <b>TOTAL</b> $<?php //echo number_format($suma_totales,2,".",",");?>
        </td>
    </tr>
</table>

<br><br/>


