<?php 

	//Class 
	class FileOutput {
		private $file;
		private $name;
		
		function __construct( $file ) {
			if($file) //This is dev
			$this->file = $file;
			$name = explode('/',$this->file);
			$this->name = end($name);
		}
		
		public function output() {
			if(file_exists($this->file)) {
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header("Content-Disposition: attachment; filename=" . $this->name);
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($this->file));
				readfile($this->file);
				exit;
			}
			else {
				echo "File Error. Please contact the site administrator.";
			}
		}
	}

 ?>