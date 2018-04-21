<?php
	//yyyy-mm-dd

	function InggrisTgl($tanggal)
	{
		$tgl 	= substr($tanggal, 0,2);
		$bln	= substr($tanggal, 3,2);
		$thn	= substr($tanggal, 6,4);
		$tanggal="$thn-$bln-$tgl";
		return $tanggal;
	}
	function IndonesiaTgl($tanggal)
	{
		$tgl 	= substr($tanggal, 8,2);
		$bln	= substr($tanggal, 5,2);
		$thn	= substr($tanggal, 0,4);
		$tanggal="$tgl-$bln-$thn";
		return $tanggal;
	}
?>
