<?php
use App\Models\Message;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestMessage;
use Illuminate\Support\Facades\Route;
use App\Models\Tutorial;
use Illuminate\Http\Request;

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
// Homepage
Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
// Message
Route::resource('message', GuestMessage::class)->only('index', 'show' ,'store', 'create');
// Authentication
Auth::routes();

// Show List of Tutorial https://stackoverflow.com/questions/41366092/property-title-does-not-exist-on-this-collection-instance
Route::get('tutorial', function(){
    $tutorial = Tutorial::all();
        return view('tutorial.index')->with('tutorial', $tutorial);
})->name('index-tutorial');

// Route::
// Create a Tutorial
Route::get('tutorial/create', function(){
    // return view('tutorial.create');
    // $tutorial = Tutorial::findOrFail($id);
    //->with('tutorial', $tutorial);
    return view('tutorial.create');
})->name('create-tutorial');

// Store the Tutorial Created
Route::post('tutorial', function(Request $request){
       // dd($request);
       $tutorial = new Tutorial();
       $tutorial->title = $request->input('title');
       $tutorial->video = $request->input('video', 'My Video');
       $tutorial->title_description = $request->input('title_description');
       $tutorial->title_lesson = $request->input('title_lesson');
       $tutorial->save();
       return redirect()->route('index-tutorial', ['tutorial' => $tutorial->id]);
})->name('store-tutorial');


// Show one Tutorial by Id
Route::get('tutorial/{id}', function($id){
    // $column = collect('title', 'title_description', 'video'); 
    // $tutorial = Tutorial::where('tutorials')->get($id);
    $tutorial = Tutorial::findOrFail($id);
    return view('tutorial.show')->with('tutorial', $tutorial);
})->name('show-tutorial');

// Deleteb one tutorial by id
Route::delete('tutorial/{id}',function($id){
    $tutorial = Tutorial::findOrFail($id);
    $tutorial->delete();
    return redirect()->route('index-tutorial'); 
})->name('delete-tutorial');

// Edit one tutorial by id
Route::get('tutorial/{id}/edit', function($id){
    $tutorial = Tutorial::findOrFail($id);
   
    return view('tutorial.edit')->with('tutorial', $tutorial);
})->name('edit-tutorial');

// Update one tutorial by id in the edit form
Route::put('tutorial/{id}', function(Request $request, $id){
    // $validator = Validator::make($request->all(), [
    //     'title' => 'required|unique:posts|max:255',
    //     'body' => 'required',
    // ]);
    
    // $validated = $validator->validated();
    $tutorial = Tutorial::findOrFail($id);
    // $validator = $request->validated();
    $tutorial->title = $request->input('title');
    $tutorial->video = $request->input('video', 'My Video');
    $tutorial->title_description = $request->input('title_description');
    $tutorial->title_lesson = $request->input('title_lesson');
    $tutorial->save();
    return view('tutorial.show')->with('tutorial', $tutorial);
    $request->session()->flash('status', 'Tutorial is Updated');
})->name('update-tutorial');


