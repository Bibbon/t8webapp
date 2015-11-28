<?php
//$isbn = isset($_POST['isbn']) ? $_POST['isbn'] : '';  
// ou si vous préférez hardcodé  
  
function rechercheLivre($code){
	$isbn = $code;
  
$request = 'https://www.googleapis.com/books/v1/volumes?q=isbn:' . $isbn;  
$response = file_get_contents($request);  
$results = json_decode($response);  
  
if($results->totalItems > 0){  
   // avec de la chance, ce sera le 1er trouvé  
   $book = $results->items[0];  
  
   $infos['isbn'] = $book->volumeInfo->industryIdentifiers[0]->identifier;  
   $infos['title'] = $book->volumeInfo->title;  
   $infos['author'] = $book->volumeInfo->authors[0];  
   $infos['langue'] = $book->volumeInfo->language;  
   $infos['publication'] = $book->volumeInfo->publishedDate;  
   $infos['nb_pages'] = $book->volumeInfo->pageCount;
  // $infos['prix'] = $book->saleInfo;
  
   if( isset($book->volumeInfo->imageLinks) ){  
       $infos['image'] = str_replace('&edge=curl', '', $book->volumeInfo->imageLinks->thumbnail);  
   }  
  
   return($infos);  
}  
else{  
   return false;  
} 
}
?>