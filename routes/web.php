<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/doctor-house', function () {
    return 'Nemcsak az emberek megalázásával lehet a gőzt kiereszteni; mondják,
                hogy a bowling jobb még ennél is.';
});
Route::get('/uvegtigris/csoki', function (){
    return 'Mennyire vagy túsz? Sörhöz odaférsz?';
});
Route::get('/uvegtigris/lali', function (){
    return 'Az egybubis az egy kicsit drágább, mert hát abból ki kellett vennem
                a többi bubit.';
});
Route::get('/modern-family',function (){
    return 'A siker mindig 1 százalék ihlet, plusz 98 százalék verejték, végül
                pedig 2 százalék odafigyelés.';
})->name('modern-family');
Route::get('/harry-potter/fred-es-george', function (){
    return '– Mindig is tudtuk hol a határ - bólintott Fred
                - És csak óvatosan léptük át - tette hozzá George.';
})->name('harry-potter.fred-es-george');
Route::get('/harry-potter/hermione',function (){
    return 'Még egy ilyen remek ötlet, és mindhárman meghalunk, vagy akár ki
                is csaphatnak!';
})->name('harry-potter.hermione');
Route::get('/naptar/{nap}',function ($nap){
    if ($nap == "ma"){
        $d = new DateTime('NOW');
        return $d->format('Y-m-d');
    }elseif ($nap == "holnap"){
        $d = new DateTime('NOW');
        $i = new DateInterval('P1D');
        return $d->add($i)->format('Y-m-d');
    }elseif ($nap == "tegnap"){
        $d = new DateTime('NOW');
        $i = new DateInterval('P1D');
        return $d->sub($i)->format('Y-m-d');
    }else{

    }
});
Route::get('/szamologep/{a}{operator}{b}',function ($a,$operator,$b){
    if (is_numeric($a) == false){
        return "Nem számot adott meg.";
    }elseif (is_numeric($b) == false){
        return "Nem számot adott meg.";
    }elseif($operator == "+"){
        return $a."+".$b."=".($a+$b);
    }elseif ($operator == "-"){
        return $a."-".$b."=".($a-$b);
    }elseif ($operator == "*"){
        return $a."*".$b."=".($a*$b);
    }elseif ($operator == "/"){

    }else{
        return "Nem megfelelő operátort használ.";
    }
});
Route::get('/szamologep/{a}/{b}',function ($a,$b){
    if (is_numeric($a) == false){
        return "Nem számot adott meg.";
    }elseif (is_numeric($b) == false){
        return "Nem számot adott meg.";
    }else{
        return $a."/".$b."=".($a/$b);
    }
});
Route::get('/hetnapja/{a}',function ($a){
       switch ($a){
           case 1: return "Hétfő";
               break;
           case 2: return "Kedd";
               break;
           case 3: return "Szerda";
               break;
           case 4: return "Csütörtök";
               break;
           case 5: return "Péntek";
               break;
           case 6: return "Szombat";
               break;
           case 7: return "Vasárnap";
               break;
           default: return "A hét napjához adja meg a sorászámát (1 és 7 közötti szám).";
                break;
       }
})->whereNumber("a");
Route::get('/hetnapja/{b}',function ($b){
    switch ($b){
        case "Hetfo": return 1;
            break;
        case "Kedd": return 2;
            break;
        case "Szerda": return 3;
            break;
        case "Csutortok": return 4;
            break;
        case "Pentek": return 5;
            break;
        case "Szombat": return 6;
            break;
        case "Vasarnap": return 7;
            break;
        default: return "Ismeretlen nap!";
            break;
    }
})->whereAlpha("b");