<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductCOntroller;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function(){
    return "hello word";
} );
Route::get('/hello2', function(){
  return [
    "produits"=>"produits1"
  ] ;
});
// Route::get('/user/{login}', function($login){
//     return "hello".  $login;
// });

// cette route renvoie un objet json
Route::get('boutique', function(Request $request){
    return [
        "name"=>$request->query('informatique'),
        "pc"=> "pc 1"
    ];
});

// les parametres optionnels 
Route::get('users/{name?}', function(?string $name="mdc"){
    return $name;
});


//Lecon 07... Les requettes && requettes  Http

//1--- La methode get utiliser pour aller chercher les donnees sur le serveur


//2--- La methode post utiliser pour envoyer les donner aux serveurs
Route::post('user', function(){
    return "utilisateur creer avec success" ;
});

//3--- La methode put utiliser pour mettre a jour les donnees entieres
Route::put('user/{id}', function($id){
return "utilisateur $id modifier";
});
//4--- La methode patch utiliser pour mettre a jour les donnees partiellement
Route::patch('user/{id}', function($id){
return "utilisateur $id modifier";
});
//5--- La methode delete utiliser pour supprimer  les donnees 
Route::delete('user/{id}', function($id){
return "utilisateur $id supprimer avec success";
});
//6-- La methode option utiliser pour obtenir des ressources 
Route::options('/user', function(){
    return "options pour les les utilisateurs";
});

//07-- La methode match utiliser pour reunir les requetes https similaires
 
Route::match(['put', 'patch'],'user/{id}', function($id){
return "utilisateur $id modifier avec success";
});
// 08-- La methode any 
Route::any('/user/all', function(){
    return "Repond a toutes les requetes pour les routes /user/all";
});

// Lecon 09... Les methodes de redirection
Route::redirect('hello', '/', 301);
Route::permanentRedirect('hello', '/', 301);

// Lecon 10 ... La notion des prefixes dans les routes en laravels
// Route::prefix('dashboard')->group(function(){
//     Route::get('/admin', function(){
//         return "page admin";
//     });
//     Route::get('/user', function(){
//         return "page users";
//     });
// });

Route::prefix('shop')->group(function(){
 Route::get('products', function(){
    return "La listes de tous les produits";
 });
 Route::get('product/{id}', function($id){
    return " Tout les details d'un seul produit dont l'id est $id";
 });
 Route::post('/order', function(){
    return " Retourne la commande creer ";
 });
});


//La notion de middlewares 
// Route::prefix('admin')
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::post('products', function(){
        return "produits creer avec success";
    });
    Route::put('products/{id}', function($id){
        return "produits $id update avec success";
    });
    Route::delete('products/{id}', function($id){
        return "produits $id delete avec success";
    });
    Route::post('orders', function(){
        return "Listes des commandes...";
    });
});
////////////Lecon 11 ///////////////////////////////////////
//Lcon 11 Le nommage des routes

Route::get('/listes', function(){
    return "hello welcome to Laravel 12";
})->name('home');

// /////////////Lecon 12  NOTION DE CONTROLLERS
//commande de creation d'un controllers: php artisan make:controller NomController

Route::get('/listproduits', [ProductController::class, 'index'])->name('product.index');