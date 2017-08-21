<?php
/**
  * @var \App\View\AppView $this
  */
?>
<style type="text/css">
    .data-table{
        font-size: 11px;
    }
</style>

<div class="bsps index large-9 medium-8 columns content">
    <h3><?= __('Listado Bsp') ?></h3>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>bsps/add/"><i class="glyphicon glyphicon-plus-sign"></i> Cargar BSP</a>
            <a class="btn btn-success btn-xs" href="<#"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a>
        </div>
    </div>
    <hr>
    <div class="tickets form large-9 medium-8 columns content">
        <?= $this->Form->create('', array('class' => 'formulario','enctype' => "multipart/form-data", 'id' => 'frm_add')) ?>
        <div class="row">
            <div class="form-group">
                <div class="col-md-1 col-xs-12">
                    <?php
                        echo $this->Form->control('Año', ["class" => "form-control", "id" => "year", "name" => "year", "options" => ["" => "", "2016" => "2016", "2017" => "2017"], 'required' => true]);

                    ?>
                </div>
                <div class="col-md-1 col-xs-12">
                    <?php
                        echo $this->Form->control('Mes', ["class" => "form-control", "id" => "month", "name" => "month", "options" => ["" => "", "1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre"], 'required' => true]); 
                    ?>
                </div>
                <div class="col-md-1 col-xs-12">
                    <div class="input select required">
                        
                        <br>
                        <?= $this->Form->button('Buscar',  array("class" => 'btn btn-success', 'id' => 'btn_buscar', 'name' => 'btn_buscar')) ?>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped tabled-bordered data-table">
            <thead>
                <tr>
                    <th>N° ticket</th>
                    <th>Fecha emisión BSP</th>
                    <th>Dif. BSP/Abril</th>
                    <th>Costo Ticket</th>
                    <th>N° ficha</th>
                    <th>Fecha emisión Abril</th>
                    <th>Dif. Abril/Softland</th>
                    <th>N° factura</th>
                    <th>Fecha emisión Softland</th>
                    <th>Valor facturar</th>
                    <!--<th>Utilidad</th>-->
                    <th>Fecha pago Softland</th>
                    <th>Dif. emisión/pago</th>
                    <!--<th scope="col">Tipo ticket</th>-->
                    <th>Valor pagado</th>
                    <th>Total días</th>
                    <th>Delta utilidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $buscador = array();
                $contador = 0;
                $ValorFactura_s     = '0';
                $ValorPagado_s      = '0';
                $delta_utilidad     = '0';
                foreach ($bsps as $bsp): 
                    $buscador[$contador] = $bsp['factura_cliente_a'];
                    if($contador>0){
                        if($buscador[($contador-1)] == $bsp['factura_cliente_a']){
                            $ValorFactura_s     = '0';
                            $ValorPagado_s      = '0';
                            $delta_utilidad     = '0';
                        }else{
                            if($bsp['factura_cliente_a']!=''){
                                $ValorFactura_s     = $bsp['ValorFactura_s']!='' ? $bsp['ValorFactura_s'] : '0';
                                $ValorPagado_s      = $bsp['ValorPagado_s']!='' ? $bsp['ValorPagado_s'] : '0';
                                $delta_utilidad     = isset($bsp['delta_utilidad']) && $bsp['delta_utilidad']!='' ? number_format($bsp['delta_utilidad'], 0, ',', '.') : '';
                            }
                        }
                    }
                $a                  = array("NULL", "FN", " ");
                $b                  = array("", "", "");
                //$notas_a            = str_replace($a, $b, $bsp['notas_a']);
                $notas_a            = $bsp['notas_a'];
                $fecha_ingreso_a    = substr($bsp['fecha_ingreso_a'], 0,10);
                
                
                $utilidad           = $bsp['utilidad']!='' ? ($bsp['utilidad']*-1) : '0';
                //fecha bsp
                $dif_b              = strtotime($bsp['issue_date']);
                //fecha abril
                $dif_a              = strtotime($fecha_ingreso_a);
                //fecha softland
                $dif_s              = strtotime($bsp['Fecha_s']);
                //fecha pago softland
                $dif_p              = strtotime($bsp['FecPag_s']);
                //diferencia bsp-abril
                $dif_b_a            = $dif_a-$dif_b;
                $dif_b_a            = $dif_a!='' && $dif_b!='' ? round($dif_b_a / 86400) : ''; 
                //diferencia abril-softland
                $dif_a_s            = $dif_a - $dif_s;
                $dif_a_s            = $dif_a!='' && $dif_s!='' ? round($dif_a_s / 86400) : ''; 
                //diferencia softland-pago
                $dif_s_p            = $dif_p - $dif_s;
                $dif_s_p            = $dif_p!='' &&  $dif_s!='' ? round($dif_s_p / 86400) : ''; 
                //suma total de dias
                $total_dias = $dif_s_p+$dif_a_s+$dif_b_a;

                if($bsp['Fecha_s']==''){
                    $td_class = 'danger';
                }elseif($bsp['fecha_ingreso_a']==''){
                    $td_class = 'danger';
                }else{
                    $td_class = '';
                }

                if($total_dias>60){
                    $td_class = 'danger';
                }elseif($total_dias>=30 && $total_dias<=60){
                    $td_class = 'warning';
                }else{
                    $td_class = '';
                }


                ?> 
                <tr class="<?php echo $td_class; ?>">
                    <!-- numero de ticket -->
                    <td style="text-align: center;"><?= $bsp['document']; ?></td>
                    <td style="text-align: center;"><?= $bsp['issue_date']; ?></td>
                    <td style="text-align: center;"><?= $dif_b_a; ?></td>
                    <td style="text-align: right;"><?= number_format($bsp['net_to_be_paid'], 0, ',', '.'); ?> </td>
                    <td style="text-align: center;"><?= $notas_a; ?></td>
                    <td style="text-align: center;"><?= $fecha_ingreso_a; ?></td>
                    <td style="text-align: center;"><?= $dif_a_s; ?></td>
                    <td style="text-align: center;"><?= $bsp['factura_cliente_a']; ?></td>
                    <td style="text-align: center;"><?= $bsp['Fecha_s']; ?></td>
                    <td style="text-align: right;"><?= number_format($ValorFactura_s, 0, ',', '.') ?></td>
                    <td style="text-align: center;"><?= $bsp['FecPag_s'] ?></td>
                    <td style="text-align: center;"><?= $dif_s_p; ?></td>
                    <td style="text-align: right;"><?= number_format($ValorPagado_s, 0, ',', '.') ?></td>
                    <td style="text-align: center;"><?= $total_dias; ?></td>
                    <td style="text-align: right;"><?= $delta_utilidad ?></td>
                    <td style="text-align: center;"><a class="btn btn-primary" href="javascript:verDetalle(<?= $bsp['factura_cliente_a']; ?>, <?= $bsp['codaux']; ?>);"><i class="glyphicon glyphicon-search"></i></a></td>
                </tr>
                <?php
                    $contador++;

                    endforeach; 
                ?>
            </tbody>
        </table>
    </div>
</div>
