<?php
	/**
	 * classe per il login
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
            $sql = "SELECT * FROM componente WHERE tipo_id='$this->id'";
            $result = $conn->query($sql);
			$out = array();
            if ($result->num_rows > 0) {
				foreach ($result as $row) {
					unset($row['utente_id']);
					unset($row['tipo_id']);
					$out[] = $row;
				}
				return $out;
			}else{
				$sql2 = "SELECT * FROM tipo WHERE id='$this->id'";
				$result2 = $conn->query($sql2);
				$row = $result2->fetch_assoc();
				throw new Exception();
			}
		}
	}
?>
