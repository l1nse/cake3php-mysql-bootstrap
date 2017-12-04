<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('cotizaciones') ?>

<div  id="flashMessage"></div>

<div class="cotizaciones form large-9 medium-8 columns content">
    <div class="content">
        <div class="row">
            <section>
            <div class="wizard">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Buscar cliente">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-folder-open"></i>
                                </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-picture"></i>
                                </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--<form role="form">-->
                    <div class="tab-content">
                        <div class="tab-pane active " role="tabpanel" id="step1">
                        <?= $this->Form->create($cotizacione, ['class' => 'form-horizontal', 'id' => 'form_add']) ?>
                        <input type="hidden" name="cod_aux" id="cod_aux" value="<?php echo $CodAux; ?>">
                        <input type="hidden" name="rut_aux" id="rut_aux" value="<?php echo $RutAux; ?>">
                        <input type="hidden" name="nom_aux" id="nom_aux" value="<?php echo $NomAux; ?>">
                            <h3>Buscar cliente</h3>
                            <div class="col-md-9 col-md-offset-3">
                                <label class="col-md-2 control-label" for="nombre">RUT / Nombre / Razón Social (*)</label>
                                <div class="col-md-3">
                                    <input type="text" name="nombre" id="nombre" class="form-control" maxlength="12">
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-primary" type="button" id="btn_buscar_entidade" name="btn_buscar_entidade"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row col-md-12" id="divResultado"></div>
                            <?php
                            if($CodAux){

                            ?>
                            <div class="col-md-9 col-md-offset-3">
                                <div class="table-responsive col-md-6">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><?php echo $RutAux; ?></th>
                                                <th colspan="2"><?php echo $NomAux; ?></th>
                                            </tr>
                                            <tr>
                                                <th>Descripción</th>
                                                <th>Valor</th>
                                                <th>N° Documentos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Morosidad</td>
                                                <td style="text-align: right;">$ <?php echo number_format($rs_morosidad[0]['Valor'], 0,',', '.');  ?></td>
                                                <td style="text-align: center;"><?php echo $rs_morosidad[0]['Total'];  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Ventas <?php echo (date('m')).'-'.(date('Y')-1); ?></td>
                                                <td style="text-align: right;">$ <?php echo number_format($rs_ventas_old[0]['Valor'], 0,',', '.');  ?></td>
                                                <td style="text-align: center;"><?php echo $rs_ventas_old[0]['Total'];  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Ventas del año <?php echo date('Y'); ?></td>
                                                <td style="text-align: right;">$ <?php echo number_format($rs_ventas_year[0]['Valor'], 0,',', '.');  ?></td>
                                                <td style="text-align: center;"><?php echo $rs_ventas_year[0]['Total'];  ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <p>Paso 1 de 4</p>

                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-primary next-step" id="btn_step_1">Guardar y continuar</button></li>
                            </ul>
                        <?= $this->Form->end() ?>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2">
                            <h3>Step 2</h3>
                            <p>This is step 2</p>
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step3">
                            <h3>Step 3</h3>
                            <p>This is step 3</p>
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
                            <h3>Complete</h3>
                            <p>You have successfully completed all steps.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <!--</form>-->
            </div>
        </section>
       </div>
    </div>
</div>