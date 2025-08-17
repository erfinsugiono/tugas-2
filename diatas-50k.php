<?php 
require __DIR__ . '/vendor/autoload.php'; 
use Illuminate\Support\Collection; 

$collection = new Collection([

// #3
// seng iki lavarel tak coba kombinasi obj1-3 berubah jadi list.
// (object) ['id' => 1, 'brand' => collect([(object)['Samsung'], (object)['harga' => 60000]])],
// (object) ['id' => 2, 'brand' => collect([(object)['Apple'], (object)['harga' => 90000]])], 
// (object) ['id' => 3, 'brand' => collect([(object)['Xiaomi'], (object)['harga' => 49000]])], 



// seng iki setelah aku mumet kanan kiri ga nemu, pas golek cara save hasil.json ng google

// https://www.google.com/search?q=hasil+filter+ke+file+hasil.json.+dengan+lavarel+collection&rlz=1C1ONGR_enID1078ID1078&oq=hasil+filter+ke+file+hasil.json.+dengan+lavarel+collection&aqs=chrome..69i57j0i751l3.11186j0j7&sourceid=chrome&ie=UTF-8

// #4

['brand' => 'Samsung', 'harga' => 60000],
['brand' => 'Apple', 'harga' => 90000],
['brand' => 'Xiaomi', 'harga' => 49000],

]); 

// #0
// $obj1 = (object) ['brand' => 'Samsung', 'harga' => 60000];
// $obj2 = (object) ['brand' => 'Apple', 'harga' => 90000];
// $obj3 = (object) ['brand' => 'Xiaomi', 'harga' => 49000];

// #1
// model ngene ga kenek jadi ta ubah kyk ng ndisor iki.

// $obj1 = (object) ['id' => 1, 'brand' => collect([(object)['nama' => 'Samsung'], (object)['harga' => 60000]])];
// $obj2 = (object) ['id' => 2, 'brand' => collect([(object)['nama' => 'Apple'], (object)['harga' => 90000]])]; 
// $obj3 = (object) ['id' => 3, 'brand' => collect([(object)['nama' => 'Xiaomi'], (object)['harga' => 49000]])]; 

//	#2 model rapi dari (#1)
// $obj1 = (object) [
// 	'id' => 1, 
// 	'brand' => collect([(object)[
// 		'nama' => 'Samsung'], (object)[
// 			'harga' => 60000]])];
// $obj2 = (object) [
// 	'id' => 2, 
// 	'brand' => collect([(object)[
// 		'merk' => 'Iphone'], (object)[
// 			'harga' => 90000]])]; 
// $obj3 = (object) [
// 	'id' => 3, 
// 	'brand' => collect([(object)[
// 		'merk' => 'Xiaomi'], (object)[
// 			'harga' => 49000]])]; 

// collection untuk #1 dan #2
// $collection = new Collection([$obj1, $obj2, $obj3]); 

// kesimpulan setelah tak coba beberapa model collect data aku nemu seng tekok google dimna aku isok kombinasi fiter iki

//     print_r($collection->filter(function ($item){
// 		return $item['harga'] > 50000;
// 		})->toJson());

// sebelum e gawe model e pean selalu error karena collection data dipisah jadi $var1-3. sehinnga filter ga isok detect 'harga'. digawe pluck sek isok tapi ketika digawe filter ga gelem detect.

echo "Semua data: "; 
print_r($collection->toJson()); 

echo "<br><br>Ambil hanya nama: "; 
print_r($collection->pluck('brand')->all());


// minus dari model 
// $obj1 = (object) ['id' => 1, 'brand' => collect([(object)['nama' => 'Samsung'], (object)['harga' => 60000]])];
// GA MAU MUNCUL
// jadi harus pakek model ini
// $obj1 = (object) ['brand' => 'Samsung', 'harga' => 60000];
// mungkin kalau pakek model 
// $obj1 = (object) ['id' => 1, 'brand' => collect([(object)['nama' => 'Samsung'], (object)['harga' => 60000]])];
// perlu pendekatan lain misal combinasi pluck sama apa gitu biar 'harga direcognize'
// seng penting saiki soal nomer 2 ne pean bener kan pakai code paling bawah yaitu xiaomi harga 49k tidak muncul.

echo "<br><br>Ambil hanya Harga: "; 
print_r($collection->pluck('harga')->all());



// dari sini jika pakai model 
// $obj1 = (object) ['brand' => 'Samsung', 'harga' => 60000]; 
// HASIL ERROR DAN TIDAK MUNCUL tapi jika pakai model
// $obj1 = (object) ['brand' => 'Samsung', 'harga' => 60000];

echo "<br><br>Harga diatas 50.000 rupiah: ";
    print_r($filtered = $collection->filter(function ($item){
    	return $item['harga'] > 50000;
    })->toJson());



// sebelum e aku ketemu error kyk ngene
// Illuminate\Support\Collection Object ( [items:protected] => ... )
// aku browsing ng google jarene error e gara2 gawe print_r dan dd
// mari ngunu aku coba ng chatgpt
// ketemu ne toJson. selain gawe chat gpt rata2 browsing laravel collection



// https://www.google.com/search?q=hasil+filter+ke+file+hasil.json.+dengan+lavarel+collection&rlz=1C1ONGR_enID1078ID1078&oq=hasil+filter+ke+file+hasil.json.+dengan+lavarel+collection&aqs=chrome..69i57j0i751l3.11186j0j7&sourceid=chrome&ie=UTF-8

// tekok kene aku ga nemu clue tentang save file lewat lavarel. jadi browsing ketemu ringkasan tekok google.


$filename = "hasil.json";
$file_handle = fopen($filename, "w") or die("Couldn't open file for writing!");
fwrite($file_handle, $filtered);
fclose($file_handle);
echo "<br>Content written to " . $filename;






// referensi
// https://www.google.com/search?q=laravel+collections+filter%28where%28%29%29&sca_esv=777c07ccfe2c70ac&rlz=1C1ONGR_enID1078ID1078&sxsrf=AE3TifOKJeULA77QZSoD0qYLcO53l8WBSA%3A1755396134854&ei=JjihaMDvM8mXseMP08HhuAo&ved=0ahUKEwjAmruY4JCPAxXJS2wGHdNgGKcQ4dUDCBI&uact=5&oq=laravel+collections+filter%28where%28%29%29&gs_lp=Egxnd3Mtd2l6LXNlcnAiI2xhcmF2ZWwgY29sbGVjdGlvbnMgZmlsdGVyKHdoZXJlKCkpMgUQIRifBTIFECEYnwVIyTJQvg1YzTBwA3gBkAEDmAHBDKAB6S6qAREwLjEuMS4wLjEuMi4xLjEuMbgBA8gBAPgBAZgCCKACyBHCAgoQABiwAxjWBBhHwgIGEAAYFhgewgIIEAAYgAQYogSYAwCIBgGQBgiSBwszLjEuMS4wLjEuMqAHlRSyBwswLjEuMS4wLjEuMrgHiRHCBwcyLTIuNS4xyAdg&sclient=gws-wiz-serp
// Laravel collection Official page (https://laravel.com/docs/12.x/collections)