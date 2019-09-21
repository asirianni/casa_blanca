	<!-- //news -->
	<!-- footer -->
	<div class="footer">
		<!-- container -->
		<div class="container">
			<div class="col-md-4 footer-left  wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
				<ul>
					
					<li><a href="<?php echo base_url()?>index.php/welcome/nosotros">Nosotros</a></li>
					<li><a href="<?php echo base_url()?>index.php/welcome/productos">Productos</a></li>
					<li><a href="<?php echo base_url()?>index.php/welcome/marcas">Marcas</a></li>
					<li><a href="<?php echo base_url()?>index.php/welcome/contacto">Contacto</a></li>
				</ul>
				<form>
					<input type="text" placeholder="Ingrese su correo" required="true">
					<input type="submit" value="Suscribir">
				</form>
			</div>
                    <div class="col-md-2 footer-left  wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
                        <a href=""><img style="width: 100%" src="<?php echo base_url()?>recursos/images/QR-PV.jpg"/></a>
			</div>
			<div class="col-md-3 footer-middle wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
				<h3>Buenos Aires</h3>
				<div class="address">
					<p><?php echo $bad["valor"];?>
						
					</p>
				</div>
				<div class="phone">
					<p><?php echo $bat["valor"];?></p>
				</div>
			</div>
			<div class="col-md-3 footer-middle wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
				<h3>Cordoba</h3>
				<div class="address">
					<p><?php echo $cd["valor"];?>
					</p>
				</div>
				<div class="phone">
					<p><?php echo $ct["valor"];?></p>
				</div>
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //container -->
	</div>
	<!-- //footer -->
	<div class="copyright">
		<!-- container -->
		<div class="container">
			<div class="copyright-left wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
                            <p>Copyright © 2019 desarrollado por <a href="http://asprofactory.com"><i>asprofactory.com</i></a></p>
			</div>
			<div class="copyright-right wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
				<ul>
					<li><a href="<?php echo $tw["valor"];?>" class="twitter"> </a></li>
					<li><a href="<?php echo $fac["valor"];?>" class="twitter facebook"> </a></li>
					<li><a href="<?php echo $gmas["valor"];?>" class="twitter chrome"> </a></li>
					<li><a href="<?php echo $lk["valor"];?>" class="twitter linkedin"> </a></li>
					
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!-- //container -->
	</div>
</body>
</html>