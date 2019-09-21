<div class="mail">
		<!-- container -->
		<div class="container">
			
			<div class="mail-grids">
				<div class="col-md-6 mail-grid-left wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h3>Contacto</h3>
					<h5><span>Nuestras Sucursales </span></h5>
					<h4>Buenos Aires</h4>
					<p>
                                            <?php echo $bad["valor"];?><br>
                                            <?php echo $bac["valor"];?><br>
                                            <?php echo $bat["valor"];?><br>
					</p>
					<h4>Cordoba</h4>
					<p> 
                                            <?php echo $cd["valor"];?><br>
                                            <?php echo $ct["valor"];?><br>
                                            <?php echo $ct["valor"];?><br>
					</p>
				</div>
				<div class="col-md-6 contact-form wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<form>
						<input type="text" placeholder="Nombre" required="true">
						<input type="text" placeholder="Correo" required="true">
						<input type="text" placeholder="Telefono" required="true">
						<textarea placeholder="Mensaje" required="true"></textarea>
						<input type="submit" value="Enviar">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- //container -->
	</div>