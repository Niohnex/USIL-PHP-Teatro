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
                <?php echo $obra->get_resena();?></p>

                <ul>
                    
                    <li><a href="#">Ver Horarios</a></li>
                    <li><a href="#">Ver Comentarios</a></li>
                    <li>S./ <?php echo $obra->get_precio();?></li>
                    <li class="puntaje"><?php echo $obra->get_puntaje();?> Puntos </li>
                    <li><a href="#">+ Me gusta</a> || <a href="#">- No me gusta</a></li>
                </ul>
            
            </div> <!-- /col -->
            
            <?php }?>
           

        </div> <!-- /cols3-content -->
        
        <div class="cols3-bottom"></div>

    </div> <!-- /cols3 -->