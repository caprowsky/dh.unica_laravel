<?php

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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('home');
})->middleware('auth');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/documentus/jqb', 'DocumentuController@search')->middleware('auth');
Route::get('/logus/jqb', 'LoguController@search')->middleware('auth');
Route::get('/eventus/jqb', 'EventuController@search')->middleware('auth');
Route::get('/acorradoris/jqb', 'AcorradoriController@search')->middleware('auth');
Route::get('/colletzionis/jqb', 'ColletzioniController@search')->middleware('auth');
Route::get('/esecudoris/jqb', 'EsecudoriController@search')->middleware('auth');
Route::get('/tiers/jqb', 'TierController@search')->middleware('auth');
Route::get('/intervals/jqb', 'IntervalController@search')->middleware('auth');

Route::get('/documentus/autocomplete', 'DocumentuController@autocomplete');
Route::get('/esecudoris/autocomplete', 'EsecudoriController@autocomplete');
Route::get('/logus/autocomplete', 'LoguController@autocomplete');
Route::get('/queries/autocomplete', 'QueryController@autocomplete');

Route::post('/documentus/importa', 'DocumentuController@importa')->middleware('auth');
Route::get('/documentus/{id}/esporta', 'DocumentuController@esporta')->middleware('auth');
Route::post('/documentus/upload', 'ResourceController@uploadSubmit')->middleware('auth');
Route::get('/documentus/upload/{id}', 'ResourceController@audioSubmit')->middleware('auth');
Route::get('/documentus/file/{id}', 'ResourceController@downloadFile')->middleware('auth');
Route::delete('/documentus/upload/{id}', 'ResourceController@deleteSubmit')->middleware('auth');
Route::get('/foto/{name}', 'ResourceController@downloadFoto')->middleware('auth');
Route::post('/foto/upload', 'ResourceController@uploadFoto')->middleware('auth');

Route::get('/documentus/resources/{id}/edit', 'ResourceController@resources')->middleware('auth');
Route::get('/documentus/resources/{id}/play', 'ResourceController@play')->middleware('auth');
Route::get('/documentus/resources/{id}/play/{sub}', 'ResourceController@playSubTrack')->middleware('auth');
Route::get('/documentus/resources/{id}/view', 'ResourceController@view')->middleware('auth');
Route::get('/documentus/resources/{id}/json', 'ResourceController@json')->middleware('auth');

Route::post('/documentus/tgupload', 'TierController@tgSubmit')->middleware('auth');
Route::post('/documentus/tgimport', 'TierController@tgImport')->middleware('auth');

Route::delete('/documentus/tier/{id}', 'ResourceController@tierDelete')->middleware('auth');
Route::get('/documentus/tier/{id}/json', 'TierController@tierGetJson')->middleware('auth');
//Route::get('/documentus/tier/{id}', 'ResourceController@tierShow')->middleware('auth');
Route::get('/documentus/interval/{id}', 'IntervalController@intervalPlay')->middleware('auth');
Route::get('/documentus/files/{id}', 'ResourceController@index')->middleware('auth');

Route::get('/documentus/{id}/acapiu/create', 'DocumentuController@acapiuCreate')->middleware('auth');
Route::delete('/documentus/{id}/acapiu', 'DocumentuController@acapiuDelete')->middleware('auth');
Route::post('/documentus/{id}/acapiu', 'DocumentuController@acapiuStore')->middleware('auth');
Route::get('/documentus/{id}/acapius', 'DocumentuController@acapius')->middleware('auth');
Route::get('/documentus/{id}/acapiaus', 'DocumentuController@acapiaus')->middleware('auth');

Route::get('/documentus/{id}/ruolu/create', 'DocumentuController@ruoluCreate')->middleware('auth');
Route::get('/documentus/{d_id}/ruolu/{r_id}/edit', 'DocumentuController@ruoluEdit')->middleware('auth');
Route::delete('/documentus/{id}/ruolu', 'DocumentuController@ruoluDelete')->middleware('auth');
Route::post('/documentus/{id}/ruolu', 'DocumentuController@ruoluStore')->middleware('auth');
Route::put('/documentus/{id}/ruolu', 'DocumentuController@ruoluUpdate')->middleware('auth');
Route::get('/documentus/{id}/ruolus', 'DocumentuController@ruolus')->middleware('auth');


Route::get('/esecudoris/{id}/acapiu/create', 'EsecudoriController@acapiuCreate')->middleware('auth');
Route::delete('/esecudoris/{id}/acapiu', 'EsecudoriController@acapiuDelete')->middleware('auth');
Route::post('/esecudoris/{id}/acapiu', 'EsecudoriController@acapiuStore')->middleware('auth');
Route::get('/esecudoris/{id}/acapius', 'EsecudoriController@acapius')->middleware('auth');
Route::get('/esecudoris/{id}/acapiaus', 'EsecudoriController@acapiaus')->middleware('auth');

Route::get('/esecudoris/{id}/logu/create', 'EsecudoriController@loguCreate')->middleware('auth');
Route::delete('/esecudoris/{id}/logu', 'EsecudoriController@loguDelete')->middleware('auth');
Route::post('/esecudoris/{id}/logu', 'EsecudoriController@loguStore')->middleware('auth');
Route::get('/esecudoris/{id}/logus', 'EsecudoriController@logus')->middleware('auth');

Route::get('/documentus/{id}/play', 'DocumentuController@play')->middleware('auth');
Route::get('/documentus/{id}/tag', 'DocumentuController@tagga')->middleware('auth');

Route::get('/documentus/{id}/clona', 'DocumentuController@clona')->middleware('auth');
Route::get('/documentus/{id}/clona_totu', 'DocumentuController@clona_totu')->middleware('auth');

Route::get('/logus/ver', 'LoguController@verifica')->middleware('auth');

Route::get('/logus/rev/{id}','LoguController@invsearch')->middleware('auth');
Route::get('/acorradoris/rev/{id}','AcorradoriController@invsearch')->middleware('auth');
Route::get('/esecudoris/rev/{id}','EsecudoriController@invsearch')->middleware('auth');
Route::get('/colletzionis/rev/{id}','ColletzioniController@invsearch')->middleware('auth');
Route::get('/eventus/rev/{id}','EventuController@invsearch')->middleware('auth');
Route::get('/documentus/rev/{id}','DocumentuController@invsearch')->middleware('auth');

Route::resource('logus','LoguController');
Route::resource('eventus','EventuController');
Route::resource('acorradoris','AcorradoriController');
Route::resource('colletzionis','ColletzioniController');
Route::resource('esecudoris','EsecudoriController');
Route::resource('documentus','DocumentuController');
Route::resource('tiers','TierController');
Route::resource('intervals','IntervalController');
Route::resource('queries','QueryController');
Route::resource('users','UserController');


Route::get('eventus/{id}/partecipant/create','EventuController@createPartecipanti')->middleware('auth');
Route::get('eventus/{id_e}/partecipant/{id_p}/edit','EventuController@editPartecipanti')->middleware('auth');
Route::put('eventus/{id_e}/partecipant/{id_p}','EventuController@updatePartecipanti')->middleware('auth');
Route::post('eventus/{id_e}/partecipant','EventuController@storePartecipanti')->middleware('auth');
Route::delete('eventus/{id_e}/partecipant/{id_p}','EventuController@destroyPartecipanti')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
