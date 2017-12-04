<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('locale-all') ?>


<script type="text/javascript">
 $(document).ready(function() {

    // page is now ready, initialize the calendar...

   

    $('#calendar').fullCalendar({
            
            

            locale: 'es',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'

            },
            defaultDate: '2017-09-12',
           navLinks: true, // can click day/week names to navigate views

            
            //editable: true,
            //eventLimit: true, // allow "more" link when too many 

            events: [
                <?php foreach ($calendarios as $row): ?>
                {
                    start: '<?php echo $row['date_time'] ?>',
                    title: '<?php echo $row['titulo'] ?>' ,
                    id: '<?php echo $row['id'] ?>',

                    <?php 
                    if($row['active'] == 1)
                    {
                    ?>
                        color: 'green',  
                        textColor: 'white'
                    <?php
                    }elseif($row['active'] == 3)
                    {
                    ?>
                    color: 'yellow',  
                        textColor: 'black'
                    <?php
                    }elseif($row['active'] == 2)
                    { ?>
                        color: 'red',  
                        textColor: 'white'
                    <?php
                    }elseif($row['active'] == 4)
                    { ?>
                        color: '#04E1F7',  
                        textColor: 'black'
                    <?php
                    }elseif($row['active'] == 5)
                    { ?>
                        color: '#B4BBBC',  
                        textColor: 'black'
                    <?php
                    }elseif($row['active'] == 6)
                    { ?>
                        color: '#FD05C1',  
                        textColor: 'white'
                    <?php
                    } ?> 

                },
                
                <?php endforeach ?>                                           
            ] ,


            //dayClick: function() {
              // alert('a day has been clicked!');
            //},

            eventClick: function(id) {
               console.log(id.id);
               window.location = siteurl+'calendarios/view/'+id.id;
              
            },

            
     });
});   

 

   
</script>


<style>
    
    body {
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>
<?php
    
     if(is_numeric($parametro)){
                switch ($parametro) {
                    case '1': 
                        $titulo = "Calendario ventas travel Admin ";
                    break;
                    case '2': 
                        $titulo = "Calendario ventas propiedades Admin ";
                    break;
                    case '3': 
                        $titulo = "Calendario marketing travel Admin ";
                    break;
                    case '4': 
                        $titulo = "Calendario marketing propiedades Admin ";
                    break;
                    case '5': 
                        $titulo = "Calendario ventas travel ";
                    break;
                    case '6': 
                        $titulo = "Calendario marketing travel ";
                    break;
                    case '7': 
                        $titulo = "Calendario ventas propiedades ";
                    break;
                    case '8': 
                        $titulo = "Calendario marketing propiedades ";
                    break;
                     }
                 }
?>
<h3 style="text-align: center;"><?= __($titulo) ?></h3>
<hr>
<?php $permisos = $permisos[0]->permiso_id?>
<!--<?php if($permisos == 93 || $permisos == 109 || $permisos == 111 || $permisos == 106) {  ?>
    <div class="col-md-1">

            <a class="btn btn-primary" href="<?php echo APP_URI; ?>calendarios/view2/<?php echo $parametro ?>/<?php echo $permisos?>">Ver reuniones</a>
    </div>
    

<?php }else{ ?>

    <div class="col-md-1">
            <a class="btn btn-primary" href="<?php echo APP_URI; ?>calendarios/view2/<?php echo $parametro ?>/<?php echo $permisos ?>">Ver reuniones</a>
    </div>
<?php } ?> -->

<div>



<div style="text-align: center;">
    <span class="label label-success">Agendada</span>
    <span class="label label-danger">Cancelada</span>
    <span class="label label-default">Concretada</span>
    <span class="label label-info">Editada</span>
    <span class="label" style="background-color: #FD05C1">Pre Agendada</span>
    <span class="label label-warning">Reasignada</span>    
        
</div>
<br><br><br>
<div>
   
    <div id='calendar' class="calendar"> </div>

</div>
    