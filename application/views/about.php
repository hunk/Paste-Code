<?php $this->load->view('header'); ?>
  <?php /*FlashNotice::display();*/ ?>
		<div id="content">
			
    <p>Paste Code es un desarrollo de <?php echo anchor('http://ideaslabs.com/','IdeasLabs.com');?> para ayuda de todos.</p>
    <p>Paste code es un lugar el cual te permite mostrar codigo a las demas personas y de esta forma colaborar mas rapidamente.</p>
    <p>Paste Code se apoya de la clase Generic Syntax Highlighter <?php echo anchor('http://qbnz.com/highlighter/','GeSHi'); ?> para resaltar la sintaxis y con esto tener una mejor lectura del codigo, la clase GeSHi nos permite resaltar la sintaxis de mas de 80 lenguajes.</p>
    <p>Paste Code te permite guardar el codigo durante una hora, un dia, una semana o un mes.</p>
    <p>Cuando observas el codigo te muestra una casilla donde tienes la posibilidad de corregir o añadir codigo y volverlo a pegar, en la misma pagina te muestra algunos datos del codigo pegado (fecha, languaje, quien lo pego, la url para ver el codigo) y ademas te da la opcion para poder descargar el codigo que estas observando.</p> <br />
    <p>Acontinuacion se muestra los 5 lenguajes mas colocados y uno que engloba los restantes.</p>
    
    <img src="http://chart.apis.google.com/chart?
cht=p3
&amp;chd=t:<?php echo $numero; ?>
&amp;chs=600x200
&amp;chl=<?php echo $language; ?>
"/>
    
    <br />
    <code>
imagen generada con <?php echo anchor('http://code.google.com/apis/chart/','Google Chart Api'); ?>
</code>
		</div>
		<div id="sub-content"> 
			<?php $this->load->view('sidebar');?>
                        <?php $this->load->view('adsense1');?>
		</div>
	</div></div>
<?php $this->load->view('footer')?>

