<?php

class CriticalError extends Exception {

	public function __toString() {
		$this->getMessage();
	}

}