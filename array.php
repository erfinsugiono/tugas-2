<?php 
require __DIR__ . '/vendor/autoload.php'; 
use Illuminate\Support\Collection; 
$data = new Collection([1, 2, 3, 4, 5]); 
echo "Asli: "; print_r($data->all()); 
echo "Hasil map (x2): "; 
print_r($data->map(fn($item) => $item * 2)->all()); 
echo "Hanya genap: ";
 print_r($data->filter(fn($item) => $item % 2 === 0)->all());