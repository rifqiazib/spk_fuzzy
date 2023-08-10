<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Candidate;
use App\Models\SubCriteria;
use Dompdf\Dompdf;

class RangkingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['criterias'] = Criteria::all();
        $data['alternatives'] = Alternative::all();
        $data['candidates'] = Candidate::all();
        return view('admin.rangking', $data);
    }

    public function doRanking(Request $request)
    {
        $tfnSkala = [
            (object)[
                "tria" => [1, 1, 1],
                "reci" => [1, 1, 1]
            ],
            (object)[
                "tria" => [0.5, 1, 1.5],
                "reci" => [0.666, 1, 2]
            ],
            (object)[
                "tria" => [1, 1.5, 2],
                "reci" => [0.5, 0.666, 1]
            ],
            (object)[
                "tria" => [1.5, 2, 2.5],
                "reci" => [0.4, 0.5, 0.666]
            ],
            (object)[
                "tria" => [2, 2.5, 3],
                "reci" => [0.333, 0.4, 0.5]
            ],
            (object)[
                "tria" => [2.5, 3, 3.5],
                "reci" => [0.285, 0.333, 0.4]
            ],
            (object)[
                "tria" => [3, 3.5, 4],
                "reci" => [0.25, 0.285, 0.333]
            ],
            (object)[
                "tria" => [3.5, 4, 4.5],
                "reci" => [0.222, 0.25, 0.285]
            ],
            (object)[
                "tria" => [4, 4.5, 4.5],
                "reci" => [0.5, 0.222, 0.25]
            ]
        ];
        $inputCriteria = array_map('intval', $request->input);



        $data['criterias'] = Criteria::all();
        $data['inputCriterias'] = array_chunk($inputCriteria, count($data['criterias']));
        // return $tfnSkala[0];
        // return $data['inputCriterias'];
        $lmuArray = [];
        foreach($data['inputCriterias'] as $indexInput => $sub) {
            
            foreach($sub as $indexSub => $item) {
                if ($item == 0) {
                    $lmuArray[] = $tfnSkala[$data['inputCriterias'][$indexSub][$indexInput] - 1]->reci;
                } else {
                    $lmuArray[] = $tfnSkala[$item - 1]->tria;
                }
            }
        }

        
        // sub criteria function
        $getSubByCriteria = SubCriteria::select('criteria_id')->distinct()->get();
        $subCriteriaLength = $getSubByCriteria->count();
        
        $subCriteriaCount = \DB::table('sub_criterias')
            ->select('criteria_id', \DB::raw('COUNT(*) as count'))
            ->groupBy('criteria_id')
            ->pluck('count')
            ->toArray();
        
        $inputSubCriteria = [];
        for ($i = 1; $i <= $subCriteriaLength; $i++) {
            $parseNumber = array_map('intval', $request->input("sub_input_" . $i));
            $inputSubCriteria[] = array_chunk($parseNumber, $subCriteriaCount[$i - 1]);
        }

        // sub criteria 1
        $data['inputSubCriteria1'] = $inputSubCriteria[0];
        $lmuSubCriteria1 = [];

        foreach($data['inputSubCriteria1'] as $indexInput => $sub) {
            foreach($sub as $indexSub => $item) {
                if ($item == 0) {
                    $lmuSubCriteria1[] = $tfnSkala[$data['inputSubCriteria1'][$indexSub][$indexInput] - 1]->reci;
                } else {
                    $lmuSubCriteria1[] = $tfnSkala[$item - 1]->tria;
                }
            }
        }

        // sub criteria 2
        $data['inputSubCriteria2'] = $inputSubCriteria[1];
        $lmuSubCriteria2 = [];

        foreach($data['inputSubCriteria2'] as $indexInput => $sub) {
            foreach($sub as $indexSub => $item) {
                if ($item == 0) {
                    $lmuSubCriteria2[] = $tfnSkala[$data['inputSubCriteria2'][$indexSub][$indexInput] - 1]->reci;
                } else {
                    $lmuSubCriteria2[] = $tfnSkala[$item - 1]->tria;
                }
            }
        }

        // sub criteria 3
        $data['inputSubCriteria3'] = $inputSubCriteria[2];
        $lmuSubCriteria3 = [];

        foreach($data['inputSubCriteria3'] as $indexInput => $sub) {
            foreach($sub as $indexSub => $item) {
                if ($item == 0) {
                    $lmuSubCriteria3[] = $tfnSkala[$data['inputSubCriteria3'][$indexSub][$indexInput] - 1]->reci;
                } else {
                    $lmuSubCriteria3[] = $tfnSkala[$item - 1]->tria;
                }
            }
        }

        // sub criteria 4
        $data['inputSubCriteria4'] = $inputSubCriteria[3];
        $lmuSubCriteria4 = [];

        foreach($data['inputSubCriteria4'] as $indexInput => $sub) {
            foreach($sub as $indexSub => $item) {
                if ($item == 0) {
                    $lmuSubCriteria4[] = $tfnSkala[$data['inputSubCriteria4'][$indexSub][$indexInput] - 1]->reci;
                } else {
                    $lmuSubCriteria4[] = $tfnSkala[$item - 1]->tria;
                }
            }
        }
        
        // return array_chunk(array_merge(...$lmuArray), 12);
        
        $data['conversionCriterias'] = array_chunk(array_merge(...$lmuArray), 12);
        
        $data['conversionSubCriteria1'] = array_chunk(array_merge(...$lmuSubCriteria1), 15);
        $data['conversionSubCriteria2'] = array_chunk(array_merge(...$lmuSubCriteria2), 9);
        $data['conversionSubCriteria3'] = array_chunk(array_merge(...$lmuSubCriteria3), 9);
        $data['conversionSubCriteria4'] = array_chunk(array_merge(...$lmuSubCriteria4), 15);
        
        // TOTAL LMU TIAP KRITERIA ROW
        $sumtotal = [];
        $arraysumL = 0;
        $arraysumM= 0;
        $arraysumU= 0;
// return $data['conversionCriterias'];
        foreach($data['conversionCriterias'] as $subarray){
          foreach($subarray as $index => $value){
           
              if($index % 3 === 0){
                 $arraysumL =  $arraysumL += $value;
                ;
              }
              if($index == 1 || $index == 4 || $index == 7 || $index == 10  ){
                  $arraysumM =  $arraysumM += $value;
                 ;
               }
               if($index == 2 || $index == 5 || $index == 8 || $index == 11 ){
                  $arraysumU =  $arraysumU += $value;
                 ;
               }
          }
          if($arraysumL !== 0 ){
            $sumtotal[] += $arraysumL;
            $arraysumL = 0;
          }
          if($arraysumM !== 0 ){
            $sumtotal[] += $arraysumM;
            $arraysumM = 0;
          }
          if($arraysumU !== 0 ){
            $sumtotal[] += $arraysumU;
            $arraysumU = 0;
          }
         
        }

         //TOTAL SUB CRITERIA 1
         $totalsubcriteria1 = [];
         foreach($data['conversionSubCriteria1'] as $subarray){
             foreach($subarray as $index => $value){
              
                 if($index % 3 === 0){
                    $arraysumL =  $arraysumL += $value;
                   ;
                 }
                 if($index == 1 || $index == 4 || $index == 7 || $index == 10 || $index == 13){
                     $arraysumM =  $arraysumM += $value;
                    ;
                  }
                  if($index == 2 || $index == 5 || $index == 8 || $index == 11 || $index == 14){
                     $arraysumU =  $arraysumU += $value;
                    ;
                  }
             }
             if($arraysumL !== 0 ){
                 $totalsubcriteria1[]  += $arraysumL;
               $arraysumL = 0;
             }
             if($arraysumM !== 0 ){
                 $totalsubcriteria1[] += $arraysumM;
               $arraysumM = 0;
             }
             if($arraysumU !== 0 ){
                 $totalsubcriteria1[] += $arraysumU;
               $arraysumU = 0;
             }
            
           }

        //TOTAL SUB CRITERIA 2
        $totalsubcriteria2 = [];
        foreach($data['conversionSubCriteria2'] as $subarray){
            foreach($subarray as $index => $value){
             
                if($index % 3 === 0){
                   $arraysumL =  $arraysumL += $value;
                  ;
                }
                if($index == 1 || $index == 4 || $index == 7 || $index == 10){
                    $arraysumM =  $arraysumM += $value;
                   ;
                 }
                 if($index == 2 || $index == 5 || $index == 8 || $index == 11){
                    $arraysumU =  $arraysumU += $value;
                   ;
                 }
            }
            if($arraysumL !== 0 ){
                $totalsubcriteria2[]  += $arraysumL;
              $arraysumL = 0;
            }
            if($arraysumM !== 0 ){
                $totalsubcriteria2[] += $arraysumM;
              $arraysumM = 0;
            }
            if($arraysumU !== 0 ){
                $totalsubcriteria2[] += $arraysumU;
              $arraysumU = 0;
            }
           
          }

          

           //TOTAL SUB CRITERIA 3
        $totalsubcriteria3 = [];
        foreach($data['conversionSubCriteria3'] as $subarray){
            foreach($subarray as $index => $value){
             
                if($index % 3 === 0){
                   $arraysumL =  $arraysumL += $value;
                  ;
                }
                if($index == 1 || $index == 4 || $index == 7 || $index == 10){
                    $arraysumM =  $arraysumM += $value;
                   ;
                 }
                 if($index == 2 || $index == 5 || $index == 8 || $index == 11){
                    $arraysumU =  $arraysumU += $value;
                   ;
                 }
            }
            if($arraysumL !== 0 ){
                $totalsubcriteria3[]  += $arraysumL;
              $arraysumL = 0;
            }
            if($arraysumM !== 0 ){
                $totalsubcriteria3[] += $arraysumM;
              $arraysumM = 0;
            }
            if($arraysumU !== 0 ){
                $totalsubcriteria3[] += $arraysumU;
              $arraysumU = 0;
            }
           
          }

           //TOTAL SUB CRITERIA 4
        $totalsubcriteria4 = [];
        foreach($data['conversionSubCriteria4'] as $subarray){
            foreach($subarray as $index => $value){
             
                if($index % 3 === 0){
                   $arraysumL =  $arraysumL += $value;
                  ;
                }
                if($index == 1 || $index == 4 || $index == 7 || $index == 10 || $index == 13){
                    $arraysumM =  $arraysumM += $value;
                   ;
                 }
                 if($index == 2 || $index == 5 || $index == 8 || $index == 11 || $index == 14){
                    $arraysumU =  $arraysumU += $value;
                   ;
                 }
            }
            if($arraysumL !== 0 ){
                $totalsubcriteria4[]  += $arraysumL;
              $arraysumL = 0;
            }
            if($arraysumM !== 0 ){
                $totalsubcriteria4[] += $arraysumM;
              $arraysumM = 0;
            }
            if($arraysumU !== 0 ){
                $totalsubcriteria4[] += $arraysumU;
              $arraysumU = 0;
            }
           
          }

        $data['Arrays'] =array_chunk($sumtotal, 3) ;
        $data['Arrays1'] =array_chunk($totalsubcriteria1, 3) ;
        $data['Arrays2'] =array_chunk($totalsubcriteria2, 3) ;
        $data['Arrays3'] =array_chunk($totalsubcriteria3, 3) ;
        $data['Arrays4'] =array_chunk($totalsubcriteria4, 3) ;

        

        //TOTAL LMU COL
       $sumArray = [];
        foreach ($data['Arrays'] as $subarray) {
                foreach ($subarray as $index => $value) {
                    if (!isset($sumArray[$index])) {
                        $sumArray[$index] = 0;
                    }
                    $sumArray[$index] += $value;
                }
            }

        //TOTAL LMU COL SUB 1
       $sumArray1 = [];
       foreach ($data['Arrays1'] as $subarray) {
               foreach ($subarray as $index => $value) {
                   if (!isset($sumArray1[$index])) {
                       $sumArray1[$index] = 0;
                   }
                   $sumArray1[$index] += $value;
               }
           }
    
        //TOTAL LMU COL SUB 2
       $sumArray2 = [];
       foreach ($data['Arrays2'] as $subarray) {
               foreach ($subarray as $index => $value) {
                   if (!isset($sumArray2[$index])) {
                       $sumArray2[$index] = 0;
                   }
                   $sumArray2[$index] += $value;
               }
           }

            //TOTAL LMU COL SUB 3
       $sumArray3 = [];
       foreach ($data['Arrays3'] as $subarray) {
               foreach ($subarray as $index => $value) {
                   if (!isset($sumArray3[$index])) {
                       $sumArray3[$index] = 0;
                   }
                   $sumArray3[$index] += $value;
               }
           }

        //TOTAL LMU COL SUB 4
       $sumArray4 = [];
       foreach ($data['Arrays4'] as $subarray) {
               foreach ($subarray as $index => $value) {
                   if (!isset($sumArray4[$index])) {
                       $sumArray4[$index] = 0;
                   }
                   $sumArray4[$index] += $value;
               }
           }
        $data['sums'] = array_chunk($sumArray,3); 
        $data['sums1'] = array_chunk($sumArray1,3); 
        $data['sums2'] = array_chunk($sumArray2,3); 
        $data['sums3'] = array_chunk($sumArray3,3); 
        $data['sums4'] = array_chunk($sumArray4,3); 

         
        $data['lmucol'] = array_merge($data['Arrays'],$data['sums']);
        $data['lmucol1'] = array_merge($data['Arrays1'],$data['sums1']);
        $data['lmucol2'] = array_merge($data['Arrays2'],$data['sums2']);
        $data['lmucol3'] = array_merge($data['Arrays3'],$data['sums3']);
        $data['lmucol4'] = array_merge($data['Arrays4'],$data['sums4']);

        
        $lmu = $data['lmucol'];
           
        //Sintetis Fuzzy 
        $divisors =  $lmu[4];
        $div = [
            $divisors[2],
            $divisors[1],
            $divisors[0]
        ];
        $values = [];
       // return $divisors;
       foreach ($lmu as $array) {
        foreach ($array as $index => $value) {
            if (isset($div[$index])&& $div[$index] != 0) {
                
                $result =  $value / $div[$index];
                $values[] = $result;
                
            }
        }
    }
    
        
        //Sintetis Fuzzy Subkriteria1
        $lmu1 = $data['lmucol1'];
    
        $divisors1 =  $lmu1[5];
        // return $divisors1;
        $div1 = [
            $divisors1[2],
            $divisors1[1],
            $divisors1[0]
        ];
        
        $values1 = [];
       // return $divisors;
       foreach ($lmu1 as $array) {
        foreach ($array as $index => $value) {
            if (isset($div1[$index])&& $div1[$index] != 0) {
                
                $result =  $value / $div1[$index];
                $values1[] = $result;
                
            }
        }
    }
    // return $values1;
    


    //Sintetis Fuzzy Subkriteria2
    $lmu2 = $data['lmucol2'];
    $lmu2pop = array_pop($lmu2);
  //  return [$lmu2,$lmu2pop];
    $div2 = [
        $lmu2pop[2],
        $lmu2pop[1],
        $lmu2pop[0]
    ];

    $values2 = [];
   foreach ($lmu2 as $array) {
    foreach ($array as $index => $value) {
        if (isset($div2[$index]) && $div2[$index] != 0) {
            
            $result2 =  $value / $div2[$index];
            $values2[] = $result2;
            
        }
    }
}




         //Sintetis Fuzzy Subkriteria3
    $lmu3 = $data['lmucol3'];
    $lmu3pop = array_pop($lmu3);
    $div3 = [
        $lmu3pop[2],
        $lmu3pop[1],
        $lmu3pop[0]
    ];
    $values3 = [];
   // return $divisors;
   foreach ($lmu3 as $array) {
    foreach ($array as $index => $value) {
        if (isset($div3[$index])&& $div3[$index] != 0) {
            
            $result =  $value / $div3[$index];
            $values3[] = $result;
            
        }
    }
}

    //Sintetis Fuzzy Subkriteria4
    $lmu4 = $data['lmucol4'];
    $divisors4 =  $lmu4[5];
    ;
    $div4 = [
        $divisors4[2],
        $divisors4[1],
        $divisors4[0]
    ];
    // return $div4;
    $values4 = [];
   // return $divisors;
   foreach ($lmu4 as $array) {
    foreach ($array as $index => $value) {
        if (isset($div4[$index])&& $div4[$index] != 0) {
            
            $result =  $value / $div4[$index];
            $values4[] = $result;
            
        }
    }
}

        $data['sintetics'] = array_chunk($values, 3);
        $data['sintetics1'] = array_chunk($values1, 3);
        $data['sintetics2'] = array_chunk($values2, 3);
        $data['sintetics3'] = array_chunk($values3, 3);
        $data['sintetics4'] = array_chunk($values4, 3);

        //  return $data['sintetics1'];
        $new_sintetics =array_slice($data['sintetics'],0,4); 

    //Perhitungan nilai vektor

    $vector = [];
    // return $new_sintetics;
    foreach($new_sintetics as $parentKey => $parentItem) {
        $currentValue = $parentItem[1];

        foreach($new_sintetics as $childItem) {
          
            if ($currentValue >= $childItem[1]) {
                $vector[] = 1;
            } 
            else if ($childItem[0] >= $parentItem[2]){
                $vector[] = 0;
            }
            else {
                $a = $childItem[0] - $parentItem[2];
                $b = ($parentItem[1] - $parentItem[2]) - ($childItem[1] - $childItem[0]);
                $vector[] = $a / $b;
                //$vector[] = $childItem[0] - $parentItem[2]/($parentItem[1] - $parentItem[2]) - ($childItem[1] - $childItem[0]);
            }
            
        }
    }

    
        
    //Perhitungan nilai vektor Sub1
    $new_sintetics1 =array_slice($data['sintetics1'],0,5); 
    // return $new_sintetics1;
    $vector1 = [];

    foreach($new_sintetics1 as $parentKey => $parentItem) {
        $currentValue = $parentItem[1];

        foreach($new_sintetics1 as $childItem) {
          
            if ($currentValue >= $childItem[1]) {
                $vector1[] = 1;
            } else if ($childItem[0] >= $parentItem[2]){
                $vector1[] = 0;
            } else {
                $a = $childItem[0] - $parentItem[2];
                $b = ($parentItem[1] - $parentItem[2]) - ($childItem[1] - $childItem[0]);
                $vector1[] = $a / $b;
                //$vector[] = $childItem[0] - $parentItem[2]/($parentItem[1] - $parentItem[2]) - ($childItem[1] - $childItem[0]);
            }
            
        }
    }

    //Perhitungan nilai vektor Sub2
    $new_sintetics2 =array_slice($data['sintetics2'],0,3);
    // return [$new_sintetics, $new_sintetics2];
    $vector2 = [];
    foreach($new_sintetics2 as $parentKey => $parentItem) {
        $currentValue = $parentItem[1];

        foreach($new_sintetics2 as $childItem) {
          
            if ($currentValue >= $childItem[1]) {
                $vector2[] = 1;
            } else if ($childItem[0] >= $parentItem[2]){
                $vector2[] = 0;
            } 
            else {
                $a = $childItem[0] - $parentItem[2];
                $b = ($parentItem[1] - $parentItem[2]) - ($childItem[1] - $childItem[0]);
                $vector2[] = $a / $b;
                //$vector[] = $childItem[0] - $parentItem[2]/($parentItem[1] - $parentItem[2]) - ($childItem[1] - $childItem[0]);
            }
            
        }
    }

    //Perhitungan nilai vektor Sub3
    $new_sintetics3 =array_slice($data['sintetics3'],0,3); 
    $vector3 = [];

    foreach($new_sintetics3 as $parentKey => $parentItem) {
        $currentValue = $parentItem[1];

        foreach($new_sintetics3 as $childItem) {
          
            if ($currentValue >= $childItem[1]) {
                $vector3[] = 1;
            } else if ($childItem[0] >= $parentItem[2]){
                $vector3[] = 0;
            } 
            else {
                $a = $childItem[0] - $parentItem[2];
                $b = ($parentItem[1] - $parentItem[2]) - ($childItem[1] - $childItem[0]);
                $vector3[] = $a / $b;
                //$vector[] = $childItem[0] - $parentItem[2]/($parentItem[1] - $parentItem[2]) - ($childItem[1] - $childItem[0]);
            }
            
        }
    }

    //Perhitungan nilai vektor Sub4
    $new_sintetics4 =array_slice($data['sintetics4'],0,5); 
    $vector4 = [];

    foreach($new_sintetics4 as $parentKey => $parentItem) {
        $currentValue = $parentItem[1];

        foreach($new_sintetics4 as $childItem) {
          
            if ($currentValue >= $childItem[1]) {
                $vector4[] = 1;
            } else if ($childItem[0] >= $parentItem[2]){
                $vector4[] = 0;
            } 
            else {
                $a = $childItem[0] - $parentItem[2];
                $b = ($parentItem[1] - $parentItem[2]) - ($childItem[1] - $childItem[0]);
                $vector4[] = $a / $b;
                //$vector[] = $childItem[0] - $parentItem[2]/($parentItem[1] - $parentItem[2]) - ($childItem[1] - $childItem[0]);
            }
            
        }
    }

    
    
    $data['vectorResult'] = array_chunk($vector, 4);
    $data['vectorResult1'] = array_chunk($vector1, 5);
    $data['vectorResult2'] = array_chunk($vector2, 3);
    $data['vectorResult3'] = array_chunk($vector3, 3);
    $data['vectorResult4'] = array_chunk($vector4, 5);
    
    
    $vectorResult = array_chunk($vector, 4);
    
    // normalisasi
    $minValue = [];

    foreach($vectorResult as $vectorItem) {
        
        $minValue[] = min($vectorItem);
    }

    $normalisasiValue = [];

    foreach($minValue as $normalisasiItem) {
        $normalisasiValue[] = $normalisasiItem / array_sum($minValue);
    }

    
    
    // normalisasi sub1
    $vectorResult1 = array_chunk($vector1, 5);
    $minValue1 = [];

    foreach($vectorResult1 as $vectorItem) {
        
        $minValue1[] = min($vectorItem);
    }

    $normalisasiValue1 = [];

    foreach($minValue1 as $normalisasiItem) {
        $normalisasiValue1[] = $normalisasiItem / array_sum($minValue1);
    }

    // normalisasi sub2
    $vectorResult2 = array_chunk($vector2, 3);
    // return $vectorResult2;
    $minValue2 = [];

    foreach($vectorResult2 as $vectorItem) {
        
        $minValue2[] = min($vectorItem);
    }
    // return $minValue2;
    $normalisasiValue2 = [];

    foreach($minValue2 as $normalisasiItem) {
        $normalisasiValue2[] = $normalisasiItem / array_sum($minValue2);
    }
   

    // normalisasi sub3
    $vectorResult3 = array_chunk($vector3, 3);
    $minValue3 = [];

    foreach($vectorResult3 as $vectorItem) {
        
        $minValue3[] = min($vectorItem);
    }

    $normalisasiValue3 = [];

    foreach($minValue3 as $normalisasiItem) {
        $normalisasiValue3[] = $normalisasiItem / array_sum($minValue3);
    }

    // normalisasi sub4
    $vectorResult4 = array_chunk($vector4, 5);
    $minValue4 = [];

    foreach($vectorResult4 as $vectorItem) {
        
        $minValue4[] = min($vectorItem);
    }

    $normalisasiValue4 = [];

    foreach($minValue4 as $normalisasiItem) {
        $normalisasiValue4[] = $normalisasiItem / array_sum($minValue4);
    }
    //kriteria
    $data['normalisasis'] = array_chunk($normalisasiValue,4);
    //penghasilan
    $data['normalisasis1'] = array_chunk($normalisasiValue1,5);
    
   //tanggungan
    $data['normalisasis2'] = array_chunk($normalisasiValue2,4);
    //jumlah kk
    $data['normalisasis3'] = array_chunk($normalisasiValue3,4);
    //tabungan
    $data['normalisasis4'] = array_chunk($normalisasiValue4,5);

    //  return $data['normalisasis1'];

    $data['candidates'] = Candidate::all();

       return view('admin.result', $data);

    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
