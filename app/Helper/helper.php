<?php

if(!function_exists('konversi_candidate')){
    function konversi_candidate($type, $value, $normalisasisubkriteria){
     
      $normalisasi = 0;
      $linguistik = "";
        switch ($type) {
            case "penghasilan": 
                if ($value <= 450000) {
                  $normalisasi = $normalisasisubkriteria[0] ;
                  $linguistik = "Sangat Rendah";
                  }
                  else if($value > 450000 && $value <= 750000){
                    $normalisasi = $normalisasisubkriteria [1] ;
                    $linguistik = "Rendah";
                   }
                   else if($value > 750000 && $value <= 1050000 ){
                    $normalisasi = $normalisasisubkriteria[2];
                    $linguistik = "Sedang";
                   }
                  else if($value > 1050000 && $value <= 1350000 ){
                   $normalisasi = $normalisasisubkriteria[3];
                   $linguistik = "Tinggi";
                  }
                  else{
                    $normalisasi = $normalisasisubkriteria[4];
                    $linguistik = "Sangat Tinggi";
                  }
                   break;
            case "tanggungan":
              if ($value >= 4 ) {
                  $normalisasi = $normalisasisubkriteria[0];
                  $linguistik = "Banyak";
                }
                else if($value >= 2 && $value < 4  ){
                  $normalisasi = $normalisasisubkriteria[1];
                  $linguistik = "Sedang";
                }
                else if ($value < 2){
                  $normalisasi = $normalisasisubkriteria[2];
                  $linguistik = "Sedikit";
                }
            break;
            case "jumlah_kepala_keluarga":
              if ($value >= 3) {
                  $normalisasi = $normalisasisubkriteria[0];
                  $linguistik = "Banyak";
                }
                else if($value >= 2 && $value < 3 ){
                  $normalisasi = $normalisasisubkriteria[1];
                  $linguistik = "Sedang";
                }
                else if ($value < 2){
                  $normalisasi = $normalisasisubkriteria[2];
                  $linguistik = "Rendah";
                }
            break; 
            case "tabungan":
                if ($value == "tidak mempunyai") {
                    $normalisasi = $normalisasisubkriteria[0];
                    $linguistik = "Sangat Rendah";
                  }
                  else if($value == "alat elektronik" ){
                   $normalisasi = $normalisasisubkriteria[1];
                   $linguistik = "Rendah";
                  }
                  else if ($value == "sepeda motor"){
                   $normalisasi = $normalisasisubkriteria[2];
                   $linguistik = "Sedang";
                  }
                  else if ($value == "sepeda motor dan alat elektronik"){
                    $normalisasi = $normalisasisubkriteria[3];
                    $linguistik = "Tinggi";
                   }
                  else if ($value == "mobil"){
                  $normalisasi = $normalisasisubkriteria[4];
                  $linguistik = "Sangat Tinggi";
                  }
                  
              break;
            
          }
          return [
            "normalisasi"=> $normalisasi,
            "linguistik" => $linguistik
          ];
    }

}