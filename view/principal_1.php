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
            <div class="col">
            
                <h2><a href="index.php?view=detalle&id=<?php echo $obra->get_id();?>"><?php echo $obra->get_titulo();?></a></h2>
                
                <p><a href="index.php?view=detalle&id=<?php echo $obra->get_id();?>"><img src="../images/<?php echo $obra->get_afiche();?>" class="block" alt="" /></a></p>

                <p class="smaller"><strong>Rese&ntilde;a</strong>
                <?php echo $obra->get_resena();?></p>

                <ul>
                    
                    <li><a href="#">Ver Horarios</a></li>
                    <li><a href="#">Ver Comentarios</a></li>
                    <li>S./ <?php echo $obra->get_precio();?></li>
                    <li><?php echo $obra->get_puntaje();?> Puntos </li>
                    <li><a href="#">+ Me gusta</a> || <a href="#">- No me gusta</a></li>
                </ul>
            
            </div> <!-- /col -->
            
            <?php }?>
            <!-- Column -->
            <div class="col">
            
                <h2><a href="#">Obra 1</a></h2>
                
                <p><a href="#"><img src="../images/obra1.png" class="block" alt="" /></a></p>

                <p class="smaller"><strong>Rese&ntilde;a</strong>
                Vestibulum at dolor vel risus scelerisque lobortis vitae
                hendrerit dui. Culi sociis natoque penatibus et magnis.</p>

                <ul>
                    
                    <li><a href="#">Ver Horarios</a></li>
                    <li><a href="#">Ver Comentarios</a></li>
                    <li>S./ 34</li>
                    <li>76 Puntos </li>
                    <li><a href="#">+ Me gusta</a> || <a href="#">- No me gusta</a></li>
                </ul>
            
            </div> <!-- /col -->
            <!-- Column -->
            <div class="col">
            
                <h2><a href="index.php?view=detalle&id=">Obra 1</a></h2>
                
                <p><a href="#"><img src="../images/obra1.png" class="block" alt="" /></a></p>

                <p class="smaller"><strong>Rese&ntilde;a</strong>
                Vestibulum at dolor vel risus scelerisque lobortis vitae
                hendrerit dui. Culi sociis natoque penatibus et magnis.</p>

                <ul>
                    
                    <li><a href="#">Ver Horarios</a></li>
                    <li><a href="#">Ver Comentarios</a></li>
                    <li>S./ 34</li>
                    <li>76 Puntos </li>
                    <li><a href="#">+ Me gusta</a> || <a href="#">- No me gusta</a></li>
                </ul>
            
            </div> <!-- /col -->
            <!-- Column -->
            <div class="col">
            
                <h2><a href="#">Obra 1</a></h2>
                
                <p><a href="#"><img src="../images/obra1.png" class="block" alt="" /></a></p>

                <p class="smaller"><strong>Rese&ntilde;a</strong>
                Vestibulum at dolor vel risus scelerisque lobortis vitae
                hendrerit dui. Culi sociis natoque penatibus et magnis.</p>

                <ul>
                    
                    <li><a href="#">Ver Horarios</a></li>
                    <li><a href="#">Ver Comentarios</a></li>
                    <li>S./ 34</li>
                    <li>76 Puntos </li>
                    <li><a href="#">+ Me gusta</a> || <a href="#">- No me gusta</a></li>
                </ul>
            
            </div> <!-- /col -->

        </div> <!-- /cols3-content -->
        
        <div class="cols3-bottom"></div>

    </div> <!-- /cols3 -->