<style>
    table{
        width: 100%;
        font-size: 9px;
    }
</style>

<table cellpadding="1" cellspacing="2">
    <tr>
        <td width="250" >
            <img  height="100" src="<?php echo base_url()?>recursos/images/<?php echo $logo ?>">
        </td>
        <td width="500" align="center">
            <p><strong>PRESUPUESTO N° <?php echo $presupuesto["numero"] ?></strong></p>
            <p><strong>FECHA <?php echo $presupuesto["fecha"]?></strong></p>
            <?php
            if($presupuesto["fecha_llegada"] != "")
            {
                echo "<p><strong>FECHA LLEGADA ".$presupuesto["fecha_llegada"]."</strong></p>";
            }?>
        </td>
    </tr>
</table>


<h6><?php echo $presupuesto["establecimiento_nombre_organizacion"] ?></h6>

<br/>
<br/>

<table>
    <tr style="background-color: #ccc;margin-bottom: 10px;">
        <td width="102">
             <b>CANTIDAD</b>
        </td>
        <td width="170">
             <b>DESCRIPCIÓN </b>
        </td>
        <td width="102">
             <b>UNITARIO</b>
        </td>
        <td width="102">
             <b>DESCUENTO</b>
        </td>
        <td width="102">
             <b>SUBTOTAL</b>
        </td>
        <td width="102">
             <b>TOTAL</b>
        </td>
    </tr>

    <!-- DETALLE -->
    <?php

        $productos= $detalle_presupuesto["productos"];
        $rubros= $detalle_presupuesto["rubros"];
        $no_rubros_no_productos= $detalle_presupuesto["no_rubros_no_productos"];
    

        $suma_totales = 0;

        foreach ($productos as $value)
        {
            $cantidad = (float)$value["cantidad"];
            $unitario = (float)$value["precio"];


            $subtotal =$unitario*$cantidad;
            $total= $subtotal - ($subtotal * $value["descuento"] / 100);

            echo 
            "<tr>
                <td width='170' align='center'>".$cantidad."</td>
                <td width='170' align='center'>".$value["descripcion"]."</td>
                <td width='170' align='center'>$".number_format($unitario,2,",",".")."</td>
                <td width='170' align='center'>".number_format($value["descuento"],2,",",".")." %</td>
                <td width='170' align='center'>$".number_format($subtotal,2,",",".")."</td>
                <td width='170' align='center'>$".number_format($total,2,",",".")."</td>
            </tr>";
        }

        foreach ($rubros as $value)
        {
           $cantidad = (float)$value["cantidad"];
            $unitario = (float)$value["precio"];


            $subtotal =$unitario*$cantidad;
            $total=$subtotal - ($subtotal * $value["descuento"] / 100);

            echo 
            "<tr>
                <td width='170' align='center'>".$cantidad."</td>
                <td width='170' align='center'>".$value["descripcion"]."</td>
                <td width='170' align='center'>$".number_format($unitario,2,",",".")."</td>
                <td width='170' align='center'>".number_format($value["descuento"],2,",",".")." %</td>
                <td width='170' align='center'>$".number_format($subtotal,2,",",".")."</td>
                <td width='170' align='center'>$".number_format($total,2,",",".")."</td>
            </tr>";
        }

        foreach ($no_rubros_no_productos as $value)
        {
            $cantidad = (float)$value["cantidad"];
            $unitario = (float)$value["precio"];


            $subtotal =$unitario*$cantidad;
            $total=$subtotal - ($subtotal * $value["descuento"] / 100);

            echo 
            "<tr>
                <td width='170' align='center'>".$cantidad."</td>
                <td width='170' align='center'>".$value["descripcion"]."</td>
                <td width='170' align='center'>$".number_format($unitario,2,",",".")."</td>
                <td width='170' align='center'>".number_format($value["descuento"],2,",",".")." %</td>
                <td width='170' align='center'>$".number_format($subtotal,2,",",".")."</td>
                <td width='170' align='center'>$".number_format($total,2,",",".")."</td>
            </tr>";
        }
    ?>
</table>
<br>
<div>
    <p style="font-size: 10px !important;"><strong>Observaciones</strong></p>
    <p style="font-size: 10px !important;"><strong><?php echo $presupuesto["perfil"]?></strong></p>
</div>
<br>
<table>
    <tr >
        <td width="510">
            &nbsp;
        </td>
        <td width="170">
            <p><b>DESC. GRAL</b> <span class="pull-right"><?php echo number_format($presupuesto["descuento_general"],2,".",",");?> %</span></p>
            <p><b>TOTAL</b> <span class="pull-right">$ <?php echo number_format($presupuesto["total"],2,".",",");?></span></p>
        </td>
    </tr>
</table>

<br><br/>


