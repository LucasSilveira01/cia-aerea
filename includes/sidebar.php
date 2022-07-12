
<div class="sidebar">
	<div class="logo_content">
		<div class="logo">
			<div class="logoname">
				<span>CIA-AEREA</span>
			</div>
		</div>
		<i class="fa-solid fa-bars" id="menu"></i>
	</div>
	<ul class="nav_list">

		<li>
			<a href="?pagina=main">
				<i class="fa-solid fa-house"></i>
				<span class="links_name">Início</span>
			</a>
			<span class="tooltip">Início</span>
		</li>

		<li>

			<a data-bs-toggle="collapse" href="#cad" role="button" aria-expanded="false" aria-controls="cad">
				<i class='bx bxs-file'></i>
				<span class="links_name">Tickets</span>
			</a>
			<span class="tooltip">Tickets</span>
		</li>

		<div id="cad" class="collpase collapse submenu">
			<ul>
				<li>
					<a href="?pagina=ti_cli">
						<i class="bi bi-file-person"></i>	
						<span class="links_name">Cliente</span>
					</a>
				</li>
			</ul>
		</div>

		<li>
			<a data-bs-toggle="collapse" href="#subs" role="button" aria-expanded="false" aria-controls="subs">
				<i class="bi bi-hdd-stack-fill"></i>
				<span class="links_name">CRUD</span>
			</a>
			<span class="tooltip">CRUD</span>
		</li>

		<div id="subs" class="collpase collapse submenu">
			<ul>
				<li>
					<a href="?pagina=voo">
						<i class="fa-solid fa-gear"></i>
						<span class="links_name">Voo</span>
					</a>
				</li>
				<li>
					<a href="?pagina=aviao">
						<i class="bi bi-wifi"></i>	
						<span class="links_name">Avião</span>
					</a>
				</li>
				<li>
					<a href="?pagina=aeroporto">
						<i class="fa-solid fa-truck-ramp-box"></i>
						<span class="links_name">Aeroporto</span>
					</a>
				</li>
			</ul>	
					
		</div>
		<li>
			<a data-bs-toggle="collapse" href="#subs1" role="button" aria-expanded="false" aria-controls="subs">
				<i class="bi bi-hdd-stack-fill"></i>
				<span class="links_name">Consultas</span>
			</a>
			<span class="tooltip">Consultas</span>
		</li>

		<div id="subs1" class="collpase collapse submenu">
			<ul>
				<li>
					<a href="?pagina=having">
						<i class="fa-solid fa-gear"></i>
						<span class="links_name">Having</span>
					</a>
				</li>
				<li>
					<a href="?pagina=join">
						<i class="bi bi-wifi"></i>	
						<span class="links_name">Junção Externa</span>
					</a>
				</li>
			</ul>	
					
		</div>

		<li>
			<a href="?pagina=compras">
				<i class="fa-solid fa-layer-group"></i>
				<span class="links_name">Compras</span>
			</a>
			<span class="tooltip">Compras</span>
		</li>
	</ul>
</div>