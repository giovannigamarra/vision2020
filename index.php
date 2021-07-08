<?php include_once 'includes/templates/header.php'; ?>

        <section class="seccion contenedor">
            <div>
            <h2>Congreso Internacional de Ingenieria, Ciencias Aereonauticas y Arquiforo </h2>
            <p>
            El XXV Congreso Internacional de Ingeniería, Ciencias Aeronáuticas y Arquiforo “Visión 2020”, es el evento anual que realiza la Facultad de Ingeniería y Arquitectura de la Universidad de San Martín de Porres, para poner al alcance de alumnos, egresados y profesionales las innovaciones tecnológicas y metodológicas de última generación para complementar la capacitación, desarrollo e integración de los mismos. 
            </p>
            <p>
            Organizado por la Oficina de Extensión y Proyección Universitaria en coordinación con las escuelas profesionales de Ingeniería de Computación y Sistemas, Ingeniería Industrial, Ingeniería Civil, Arquitectura y Ciencias Aeronáuticas de la USMP. 
            </p>
            </div>
            
        
            <div>
            <h2>OBJETIVOS </h2>
            <p>
            <li  type="square">
                Actualizar los conocimientos de los participantes en el rol que desempeña la transformación digital,
                complementado por el desarrollo tecnológico, a fin de dotarlos con las capacidades necesarias para desarrollar sus propios proyectos.
            </li>
            </p>
            <p>
            <li  type="square">
                Renovar los conocimientos con el manejo de tecnologías emergentes, herramientas y metodologías, 
                a través de la aplicación, la experiencia y el aporte de los especialistas.
            </li>
            </p>
            <p>
            <li  type="square">
                Fomentar la elaboración de trabajos creativos e innovadores, aplicando competencias tecnológicas para una mejor
                 gestión del conocimiento, poniendo énfasis en proyectos que contribuyan al despegue nacional.
            </li>
            </p>
            </div>
        </section> <!--seccion-->

        <section class="programa">
            <div class="contenedor-video">
                <video autoplay loop muted poster="img/bg-talleres.jpg">
                    <source src="video/video.mp4" type="video/mp4">
                    <source src="video/video.webm" type="video/webm">
                    <source src="video/video.ogv" type="video/ogg">
                </video>
            </div> <!--.contenedor-video-->
            <div class="contenido-programa">
                <div class="contenedor">
                    <div class="programa-evento">
                        <h2>Programa del Evento</h2>

                        <?php
                            try {
                              require_once('includes/funciones/bd_conexion.php');
                              $sql = "SELECT * FROM `categoria_evento` ";
                              $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                              $error = $e->getMessage();
                            }
                         ?>
                        <nav class="menu-programa">
                          <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <?php $categoria = $cat['cat_evento']; ?>
                                <a href="#<?php echo strtolower($categoria) ?>">
                                      <i class="fa <?php echo $cat['icono'] ?>" aria-hidden="true"></i> <?php echo $categoria ?>
                                </a>
                          <?php } ?>
                        </nav>

                        <?php
                            try {
                              require_once('includes/funciones/bd_conexion.php');
                              $sql = "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                              $sql .= "FROM `eventos` ";
                              $sql .= "INNER JOIN `categoria_evento` ";
                              $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                              $sql .= "INNER JOIN `invitados` ";
                              $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                              $sql .= "AND eventos.id_cat_evento = 1 ";
                              $sql .= "ORDER BY `evento_id` LIMIT 2;";
                              $sql .= "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                              $sql .= "FROM `eventos` ";
                              $sql .= "INNER JOIN `categoria_evento` ";
                              $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                              $sql .= "INNER JOIN `invitados` ";
                              $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                              $sql .= "AND eventos.id_cat_evento = 2 ";
                              $sql .= "ORDER BY `evento_id` LIMIT 2;";
                              $sql .= "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                              $sql .= "FROM `eventos` ";
                              $sql .= "INNER JOIN `categoria_evento` ";
                              $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                              $sql .= "INNER JOIN `invitados` ";
                              $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                              $sql .= "AND eventos.id_cat_evento = 3 ";
                              $sql .= "ORDER BY `evento_id` LIMIT 2;";
                            } catch (Exception $e) {
                              $error = $e->getMessage();
                            }
                         ?>

                        <?php $conn->multi_query($sql); ?>

                        <?php
                            do {
                                $resultado = $conn->store_result();
                                $row = $resultado->fetch_all(MYSQLI_ASSOC);    ?>

                                <?php $i = 0; ?>
                                <?php foreach($row as $evento): ?>
                                  <?php if($i % 2 == 0) { ?>
                                    <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
                                  <?php } ?>
                                          <div class="detalle-evento">
                                              <h3><?php echo html_entity_decode($evento['nombre_evento']) ?></h3>
                                              <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $evento['hora_evento']; ?></p>
                                              <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $evento['fecha_evento']; ?></p>
                                              <p><i class="fa fa-user" aria-hidden="true"></i> <?php echo $evento['nombre_invitado'] . " " .  $evento['apellido_invitado']; ?></p>
                                          </div>
                                  <?php if($i % 2 == 1): ?>
                                        <a href="calendario.php" class="button float-right">Ver todos</a>
                                    </div> <!--#talleres-->
                                  <?php endif; ?>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                                <?php $resultado->free(); ?>
                          <?php  } while ($conn->more_results() && $conn->next_result());?>



                    </div> <!--.programa-evento-->
                </div> <!--.contenedor-->
            </div><!--.contenido-programa-->
        </section> <!--.programa-->


          <?php include_once 'includes/templates/invitados.php'; ?>

<!--
        <div class="contador parallax">
            <div class="contenedor">
                <ul class="resumen-evento clearfix">
                    <li><p class="numero">0</p> Invitados</li>
                    <li><p class="numero">0</p> Talleres</li>
                    <li><p class="numero">0</p> Días</li>
                    <li><p class="numero">0</p> Conferencias</li>

                </ul>
            </div>
        </div>
-->
        <section class="precios seccion">
            <h2>Precios</h2>
            <div class="contenedor">
                  <ul class="lista-precios clearfix">
                      <li>
                            <div class="tabla-precio">
                                <h3>Alumnos USMP</h3>
                                <p class="numero">S/.30</p>
                                <ul>
                                  <li>Certificados</li>
                                  <li>Conferencias</li>
                                  <li>Talleres</li>
                                </ul>
                                <a href="#" class="button hollow">Comprar</a>
                            </div>
                      </li>
                      <li>
                            <div class="tabla-precio">
                                <h3>Externos</h3>
                                <p class="numero">S/.50</p>
                                <ul>
                                  <li>Certificados</li>
                                  <li>Conferencias</li>
                                  <li>Talleres</li>
                                </ul>
                                <a href="#" class="button">Comprar</a>
                            </div>
                      </li>

                      <li>
                            <div class="tabla-precio">
                                <h3>Ex-Alumnos(USMP)</h3>
                                <p class="numero">S/.45</p>
                                <ul>
                                  <li>Certificados</li>
                                  <li>Conferencias</li>
                                  <li>Talleres</li>
                                </ul>
                                <a href="#" class="button hollow">Comprar</a>
                            </div>
                      </li>
                  </ul>
            </div>
        </section>

        <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15606.341486767209!2d-76.9421609!3d-12.0720238!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x393610bdc506718b!2sFacultad%20de%20Ingenier%C3%ADa%20y%20Arquitectura%20-%20USMP!5e0!3m2!1ses!2spe!4v1608655866956!5m2!1ses!2spe" 
        width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>

        <section class="seccion">
            <h2>Testimoniales</h2>
            <div class="testimoniales contenedor clearfix">
                <div class="testimonial">
                    <blockquote>
                      <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam blandit neque eu semper ullamcorper. Duis commodo quam in orci condimentum ultricies.<p>
                      <footer class="info-testimonial clearfix">
                          <img src="img/testimonial.jpg" alt="imagen testimonial">
                          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                      </footer>
                    </blockquote>
                </div><!--.testimonial-->
                <div class="testimonial">
                    <blockquote>
                      <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam blandit neque eu semper ullamcorper. Duis commodo quam in orci condimentum ultricies.<p>
                      <footer class="info-testimonial clearfix">
                          <img src="img/testimonial.jpg" alt="imagen testimonial">
                          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                      </footer>
                    </blockquote>
                </div><!--.testimonial-->
                <div class="testimonial">
                    <blockquote>
                      <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam blandit neque eu semper ullamcorper. Duis commodo quam in orci condimentum ultricies.<p>
                      <footer class="info-testimonial clearfix">
                          <img src="img/testimonial.jpg" alt="imagen testimonial">
                          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                      </footer>
                    </blockquote>
                </div><!--.testimonial-->
            </div>
        </section>

        <div class="newsletter parallax">
            <div class="contenido contenedor">
                <h3>Vision2020</h3>
                <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>
            </div> <!--.contenido-->
        </div><!--.newsletter-->

  <?php include_once 'includes/templates/footer.php'; ?>
