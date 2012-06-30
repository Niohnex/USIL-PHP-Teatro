<!-- Cuerpo-->
    <!-- Three columns -->
    <div class="cols3">
    
        <div class="">
            <!-- header --><header>
		<h1><a href="#"><?php echo $obra->get_titulo();?></a></h1>
		<h2>Del autor: <?php echo $obra->get_autor();?></h2>
                </header>
	<!-- #main content and sidebar area -->
			<section id="content"><!-- #content -->
			
                            <article class="<?php echo $obra->getClaseDeObra();?>">
                            <h2><a href="#">Rese&ntilde;a</a></h2>
							<img src="../images/<?php echo $obra->get_afiche();?>" alt="" class="alignleft"> 
							<p><?php echo $obra->get_resena();?></p>
                                                        <ul>
                                                            <li>Autor: <?php echo $obra->get_autor();?></li>
                                                            <li>Director: <?php echo $director->get_nombre()." ".$director->get_apellido();?></li>
                                                            <li>Autor: <?php echo $obra->get_autor();?></li>
                                                             <li>Precio: S./ <?php echo $obra->get_precio();?></li>
                                                            <li>Temporada: <?php echo $obra->getTemporada($obra->get_id());?></li>
                                                            <li class="puntaje">Puntaje: <?php echo $obra->get_puntaje();?></li>
                                                            </ul>
                                                        <p>Reparto
                                                        <ul>
                                                            <?php foreach ($actores as $actor) {?>
                                                            
                                                            <li><?php echo "Actor: ".$actor->get_nombre()." ".$actor->get_apellido()." como ".$actor->get_personaje($actor->get_idParticipantes()); ?></li>
                                                            <?php }?>
                                                        </ul>
                                                        <p>Horarios y fechas</p>
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                <th>Hora Inicio</th>
                                                                <th>Hora Fin</th>
                                                                <th>Sala</th>
                                                                <th>Fecha</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($horarios as $horario) {?>
                                                                <tr>
                                                                    <td><?php echo $horario['horaInicio']?></td>
                                                                
                                                                    <td><?php echo $horario['horaFin']?></td>
                                                                    <td><?php echo $horario['sala']?></td>
                                                                    <td><?php echo $horario['dia']?></td>
                                                                    
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                            
                                                        </table>
                                                        
                                                        

						</article>
                            
                            <h3>Comentarios</h3>
                            <?php foreach($votos as $voto) { ?>
                            
                            <article>
                          
							<h2>Comentado en: <?php echo $voto->get_fecha();?></h2>
                                                        <h3>Por: <?php echo $voto->get_userName();?></h3>
							<p>Comentario: <?php echo $voto->get_comentario();?></p>
						</article>
                            <?php } ?>
						
			</section><!-- end of #content -->
                        
                            <section>
                                
                                <?php if (!isset($_SESSION['usuario'])) { ?>
                                <h2><a class="i-auth" title="Registrarse con Manual" href="index.php?vista=login2">Para comentar debe ingresar al sitio</a></h2>
                                <?php }?>
                            <?php 
                        
                        if($mostrarFormularioVotos==true) { 
                            
                            ?>
                        
                            <form method="post" action="index.php?vista=comentar">
                                   
                            <h2><a href="#">Comentar</a></h2>
                            <textarea name="comentario" placeholder="Ingrese su comentario..."></textarea>
                            <input type="hidden" name="obraId" value="<?php echo $obra->get_id();?>" ></input>
                            <input type="submit" title="Votar" value="Me gusta" name="votoPositivo"  ></input>   
                              <input type="submit" title="Votar" value="No me gusta" name ="votoNegativo" ></input>  
                            </form>
                        </section>
                        <?php }
                        ?>

		<aside id="sidebar"><!-- sidebar -->
					<h3>Things To Do</h3>
					<ul>
						<li><a href="#">Votar a favor</a></li>
						<li><a href="#">Votar contra</a></li>
						<li><a href="#">Swap Stories</a></li>
						<li><a href="#">Sell Stuff</a></li>
						<li><a href="#">Buy Stuff</a></li>
						<li><a href="#">Trade Stuff</a></li>
					</ul>
					
				<h3>Sponsors</h3>
					<img src="images/ad125.jpg" alt=""><br><img src="images/ad125.jpg" alt=""><br><br>

				<h3>Connect With Us</h3>
					<ul>
						<li><a href="#">Twitter</a></li>
						<li><a href="#">Facebook</a></li>
					</ul>

		</aside><!-- end of sidebar -->

	

            

        </div> <!-- /cols3-content -->
        
        <div class="cols3-bottom"></div>

    </div> <!-- /cols3 -->
    
    <link rel="stylesheet" href="../css/stylesdetalle.css" type="text/css" media="screen" />
	