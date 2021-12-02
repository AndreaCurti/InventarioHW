<?php
	/**
	 * classe per mostrare i componenti
	 */
	class ListComponentsClass
	{
		private $id;

		function __construct($id)
		{
			$this->id = $id;
		}

		function getComponents(){
			require 'application/libs/connection.php';
			$sql = "";
			if($this->id != 6){
				$sql = "SELECT * FROM componente WHERE tipo_id='$this->id' && is_enable=1";
			}else{
				$sql = "SELECT * FROM componente WHERE is_enable=0";
			}
            $result = $conn->query($sql);
			$out = array();
            if ($result->num_rows > 0) {
				foreach ($result as $row) {
					unset($row['utente_id']);
					unset($row['tipo_id']);
					unset($row['is_enable']);
					$out[] = $row;
				}
				return $out;
			}else{
				throw new Exception();
			}
		}
	}
?>
