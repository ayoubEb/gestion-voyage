<?php

use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ThemeActiviteController;
use App\Http\Controllers\AgenceUserController;
use App\Http\Controllers\AttributController;
use App\Http\Controllers\AttributValueController;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EmployeSalaireController;
use App\Http\Controllers\HotelAttributController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PermisController;

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\UserSalaireController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VoyageController;
// use App\Http\Controllers\VoyageOrganiseController;
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

Route::get('/', function () {

    return view('acceuil');
});
Route::group(['middleware' => ['auth']], function() {
  Route::resources([
    'user'=>UtilisateurController::class,
    'voyage'=>VoyageController::class,
    'agence'=>AgenceController::class,
    // 'voyage-organise'=>VoyageOrganiseController::class,
    'profil'=>ProfilController::class,
    'agenceUser'=>AgenceUserController::class,
    'client'=>ClientController::class,
    'reservation'=>ReservationController::class,
    'contact'=>ContactController::class,
    'roles'=>RoleController::class,

    'avion'=>AvionController::class,
    'employe'=>EmployeController::class,
    'employe-salaire'=>EmployeSalaireController::class,

    'activite'=>ActiviteController::class,
    'theme-activite'=>ThemeActiviteController::class,
    'attribut'=>AttributController::class,
    'attribut-value'=>AttributValueController::class,
    'permi'=>PermisController::class,
    'transport'=>TransportController::class,
    "user-salaire"=>UserSalaireController::class,
    "hotel"=>HotelController::class,
    "hotel-attribut"=>HotelAttributController::class,

  ]);

  // Route::get('/caracteristiques',[HotelController::class,'getCaracter'])->name('caracter');
  // Route::get('/valeur',[HotelController::class,'getCaracterValeur'])->name('valeur');

  // Route::resource('hotel-car',HotelCaracteristiqueController::class)
  Route::get("/getAgence",[AgenceUserController::class,'GetAgence'])->name("getAgence");

  Route::get("/get-Attribut",[HotelController::class,'getAttribut'])->name("getAttribut");

  Route::get("/getVoyage/{id}",[ReservationController::class,'GetVoyage'])->name("getVoyage");
  Route::get('/hotel-caracteristque',[ReservationController::class,'getHotelCaracter'])->name('hotel-caracter');
  Route::get('/caracteristque-valeur',[ReservationController::class,'getHotelCaracterVal'])->name('caracterVal');
  Route::get('/exp-pdf/{reservation}',[ReservationController::class,'exporter'])->name('exporter');

  Route::get('/liste-voyages',[VoyageController::class,'listePDF'])->name('exporter-voyages');

  // Route::get('/voyageOrganises/exporter',[VoyageOrganiseController::class,'exporterPDF'])->name('eporter-vs');

  Route::get('/filter/',[ThemeActiviteController::class,'filterTheme'])->name('filter');

  Route::get('/employes/intérieurs',[EmployeController::class,'interieur'])->name("interieur");
  Route::get('/employes/véhicules',[EmployeController::class,'vehicule'])->name("vehicule");

  Route::get('/employe-reçu/{employeSalaire}',[EmployeSalaireController::class,'getRecu'])->name("employe-recu");
  Route::get('/carte-travail/employé/{employe}/',[EmployeController::class,'carteTravail'])->name("carte-employe");
  Route::get('/employés/fiche-technique',[EmployeSalaireController::class,'employe_salaires'])->name("employe-salaire.ft");
  Route::get('/employe/{id}/{annee}',[EmployeController::class,'employe_pdfAnnee'])->name("employe-annee.pdf");


  Route::get('/user-reçu/{userSalaire}',[UserSalaireController::class,'getRecu'])->name("user-recu");
  Route::get('/carte-travail/user/{user}/',[UtilisateurController::class,'carteTravail'])->name("carte-user");
  Route::get('/utilisateurs/fiche-technique',[UserSalaireController::class,'user_salaires'])->name("user-salaire.ft");
  Route::get('/user/{id}/{annee}',[UserSalaireController::class,'user_pdfAnnee'])->name("user-annee.pdf");

});


// route front end
Route::get("/",[AcceuilController::class,'index'])->name("acceuil");
Route::get("/voyage-organises",[VoyageOrganiseController::class,'getVoyageOrganise'])->name("voyage-organise");




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
