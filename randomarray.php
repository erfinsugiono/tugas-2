<?php 
require __DIR__ . '/vendor/autoload.php'; 
use Illuminate\Support\Collection; 


// https://laravel.com/docs/12.x/collections#method-range
$collection = collect()->range(1, 100);
// https://laravel.com/docs/12.x/collections#method-random
$random = $collection->random(fn (Collection $items) => max(100, count($items)));



echo "random array (1 array)"; 
    print_r ($collection->random());

echo "<br><br>random array (semua array):";
    print_r ($shuffled = $collection->shuffle());
 
$shuffled->all();

echo "<br><br>Asli: "; 
    print_r($collection->all()); 

echo "<br><br>angka yang dapat dibagi 5: ";
    print_r($filtered = $collection->filter(function (int $value, int $key) {
        return $value % 5  === 0;
    }));
    $filtered->all();


    ?>


 