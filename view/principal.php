<!-- Cuerpo-->
 <!-- Promo -->
    <div id="promo">

        <p id="slogan"><img src="../design/slogan.gif" alt="Slogan" /></p>
        
        <ul id="slider">
            <li><img src="../design/slider-01.jpg" alt="" /></li>
            <li><img src="../design/slider-02.jpg" alt="" /></li>
            <li><img src="../design/slider-03.jpg" alt="" /></li>
        </ul>
        
    </div> <!-- /promo -->

    <hr class="noscreen" />


<!-- Three columns -->
    <div class="cols3">
    
        <div class="cols3-content box">

           
            <?php foreach($obras as $obra){ // print_r($obra);  ?>
            
            
            <!-- Column -->
            <div class="col <?php echo $obra->getClaseDeObra();?>">
            
                <h2><a href="index.php?vista=detalle&id=<?php echo $obra->get_id();?>"><?php echo $obra->get_titulo();?></a></h2>
                
                <p><a href="index.php?vista=detalle&id=<?php echo $obra->get_id();?>"><img src="../images/<?php echo $obra->get_afiche();?>" class="block" alt="" /></a></p>

                <p class="smaller"><strong>Rese&ntilde;a</strong>
                <?php  $obra->get_resena();?></p>
				<p class="smaller"><strong># de sitios</strong>
                <?php echo $obra->get_numeroSitios();?></p>
				 <p class="smaller"><strong>Desde</strong>
                <?php echo $obra->get_fechaDesde();?></p>
				<p class="smaller"><strong>Hasta</strong>
                <?php echo $obra->get_fechaHasta();?></p>
				

                <ul>
                    
                    <li><a href="index.php?vista=detalle&id=<?php echo $obra->get_id();?>#horarios">Ver Horarios</a></li>
                    <li><a href="index.php?vista=detalle&id=<?php echo $obra->get_id();?>#comentarios">Ver Comentarios</a></li>
                    <li>S./ <?php echo $obra->get_precio();?></li>
                    <li class="puntaje"><?php echo $obra->get_puntaje();?> Puntos </li>
					<?php if ( $obra->get_mostrar())  { ?>
                    <li><a href="index.php?vista=detalle&id=<?php echo $obra->get_id();?>#votos">Votar</a></li>
					<?php }?>
                </ul>
            
            </div> <!-- /col -->
            
            <?php }?>
           

        </div> <!-- /cols3-content -->
        
        <div class="cols3-bottom"></div>

    </div> <!-- /cols3 -->