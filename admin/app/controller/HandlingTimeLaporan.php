<?php
function handlingTimeLaporan($pilihan, $tanggal)
{
  $split_to_array = preg_split("/-/", $tanggal);

  if ($pilihan == 'bulanan') {
    return $split_to_array[1] == date("m");
  } else if ($pilihan == 'tahunan') {
    return $split_to_array[0] == date("Y");
  } else {
    return false;
  }
}
