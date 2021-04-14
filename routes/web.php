<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfpicController;
use App\Http\Controllers\AppliedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeprofileController;
use App\Http\Controllers\FarmerprofileController;
use App\Http\Controllers\TractorrequestController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReplyController;

use App\Http\Controllers\CropserviceController;
use App\Http\Controllers\CropproductController;
use Illuminate\Support\Facades\Request;


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
    return redirect()->route('login');
});



Route::get('/home', function () {
    return redirect()->route('farmers');
});

Route::get('/data', function () {
    return view('datatable');
});



Route::get('/report/tractor', function () {
    return view('applied.report');
});


Route::get('/myprofile/profiling', function () {
    return view('profile.profile');
});
// Route::get('/registration/custom', function () {
//     return view('registercustom') ;
// });

Route::get('/updatingone','App\Http\Controllers\FarmerprofileController@updatingone');


Auth::routes();
//added routes
Route::get('/CAGRO', [App\Http\Controllers\AppliedController::class, 'review'])->name('layouts');
Route::get('/dsfg', [App\Http\Controllers\UserController::class, 'lpo'])->name('web.search');
Route::get('/surveymap', [App\Http\Controllers\DisposaltractorController::class, 'mapsurvey'])->name('map1');



Route::get('/AppliedSectorHome', [App\Http\Controllers\AppliedController::class, 'index'])->name('applied')->middleware('applied');
Route::get('/CropsSectorDashboard', [App\Http\Controllers\CropsController::class, 'index'])->name('crops')->middleware('crops');
Route::get('/FisherySectorDashboard', [App\Http\Controllers\FisheryController::class, 'index'])->name('fishery')->middleware('fishery');
Route::get('/LivestockSectorDashboard',  [App\Http\Controllers\LivestockController::class, 'index'])->name('livestock')->middleware('livestock');
Route::get('/ResearchSectorDashboard', [App\Http\Controllers\ResearchController::class, 'index'])->name('research')->middleware('research');
Route::get('/FarmersSectorDashboard', [App\Http\Controllers\FarmersController::class, 'index'])->name('farmers')->middleware('farmers');

//applied routes
// Route::get('/AppliedSectordashboard', [App\Http\Controllers\AppliedController::class, 'navbar'])->nastoreme('navbar');
// Route::get('post', [App\Http\Controllers\ProfpicController::class, 'store_another'])->name('profpic');
Route::post('post', [App\Http\Controllers\ProfpicController::class, 'store_another'])->name('profpic');



//for routing tables
Route::resource('user', 'UserController');

Route::get('/registration/custom', [App\Http\Controllers\UserController::class, 'regcustom'])->name('registercustom');

Route::get('/Applied/ProfileManagementDashboard', [App\Http\Controllers\UserController::class, 'index'])->name('profilemanage');
Route::get('/farmer/users', [App\Http\Controllers\UserController::class, 'readindex']);
Route::post('adduser', [App\Http\Controllers\UserController::class, 'store'])->name('adduser');
Route::post('register/custom', [App\Http\Controllers\UserController::class, 'registration'])->name('registration');

Route::get('/editusers/{id}', [App\Http\Controllers\UserController::class, 'edit'])
->name('edituser');
Route::post('/updateuser/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('updateuser');
Route::get('/deleteuser/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('deleteuser');

Route::post('addimage', [App\Http\Controllers\ProfpicController::class, 'store'])->name('imageadd');
Route::post('/editimage/{id}', [App\Http\Controllers\ProfpicController::class, 'update'])->name('updateimage');
Route::get('/deleteimage/{id}', [App\Http\Controllers\ProfpicController::class, 'destroy'])->name('deleteimage');

Route::get('/find',[App\Http\Controllers\UserController::class, 'find'])->name('web.find');
Route::get('/search',[App\Http\Controllers\UserController::class, 'search'])->name('ssss');

//for Employee Profile route
Route::post('addemployee', [App\Http\Controllers\EmployeeprofileController::class, 'store'])->name('empadd');
Route::post('/editprofile/{id}', [App\Http\Controllers\EmployeeprofileController::class, 'update'])->name('editprof');
Route::get('/deleteprofile/{id}', [App\Http\Controllers\EmployeeprofileController::class, 'destroy'])->name('deleteprof');


//rsbsa routing
Route::get('/rsbsa/{id}', [App\Http\Controllers\HomeController::class, 'takeedit'])->name('rsbsa');
Route::get('/secondrsbas', [App\Http\Controllers\UserController::class, 'rsbsa'])->name('rsbsa2');
Route::post('/addfarmerprof', [App\Http\Controllers\FarmerprofileController::class, 'store'])->name('rsbsadd');
Route::post('/editrsbsa/{id}', [App\Http\Controllers\FarmerprofileController::class, 'update'])->name('edrsbsa');
Route::get('/delrsbsa1/{id}', [App\Http\Controllers\FarmerprofileController::class, 'destroy'])->name('delrsbsa1');
Route::post('/updatersbsa/{id}', [App\Http\Controllers\FarmerprofileController::class, 'updatingone'])->name('updatesrsbsa');
Route::post('/addfarmerregistrationcagro', [App\Http\Controllers\FarmerprofileController::class, 'registtwo'])->name('registwo.store');





//part 1.5
Route::post('/addrsbsa2', [App\Http\Controllers\FarmerpersonalController::class, 'store'])->name('rsbsadd2');
Route::post('/farmpersonal/{id}', [App\Http\Controllers\FarmerpersonalController::class, 'update'])->name('farmerper');
Route::get('/delpersonfarm/{id}', [App\Http\Controllers\FarmerpersonalController::class, 'destroy'])->name('delprersonfarm');
//part1.6
Route::post('/addrsbsa3', [App\Http\Controllers\FarmerparttwoController::class, 'store'])->name('rsbsadd3');
Route::post('/updatersbsa3/{id}', [App\Http\Controllers\FarmerparttwoController::class, 'update'])->name('rsbsaedit3');
Route::get('/delrsbsa3/{id}', [App\Http\Controllers\FarmerparttwoController::class, 'destroy'])->name('rsbsadel3');
//farmparce
Route::post('/farmparcelinsert', [App\Http\Controllers\FarmparcelController::class, 'store'])->name('farmparcel');
Route::post('/editparcel/{id}', [App\Http\Controllers\FarmparcelController::class, 'update'])->name('parceledit');
Route::get('/delparcel/{id}', [App\Http\Controllers\FarmparcelController::class, 'destroy'])->name('parseldel');
Route::post('/parcelani', [App\Http\Controllers\ParcelanimalController::class, 'store'])->name('parcelani');
Route::post('/parsedit/{id}', [App\Http\Controllers\ParcelanimalController::class, 'update'])->name('parsedit');
Route::get('/parsdel/{id}', [App\Http\Controllers\ParcelanimalController::class, 'destroy'])->name('delapars');


//for tractor service
Route::get('/service/tractor', [App\Http\Controllers\TractorserviceController::class, 'index'])->name('trservice');
Route::post('/add/service/tr', [App\Http\Controllers\TractorserviceController::class, 'store'])->name('trsadd');
Route::post('/updatetractor/{id}', [App\Http\Controllers\TractorserviceController::class, 'update'])->name('trsupdate');
Route::get('/deletetractor/{id}', [App\Http\Controllers\TractorserviceController::class, 'destroy'])->name('deltrs');

//tractor request
Route::get('/request/tractor', [App\Http\Controllers\TractorrequestController::class, 'index'])->name('trrequest');
Route::post('/request/tractor/add', [App\Http\Controllers\TractorrequestController::class, 'store'])->name('trradd');
Route::post('/approverequest/{id}', [App\Http\Controllers\TractorrequestController::class, 'update']);
Route::get('/deletetractor/{id}', [App\Http\Controllers\TractorrequestController::class, 'destroy'])->name('tdelete');
Route::get('/status/tractor', [App\Http\Controllers\TractorrequestController::class, 'secondindex'])->name('trstatus');

//for consultation
Route::get('/consultation', [App\Http\Controllers\ConsultationController::class, 'index'])->name('consult');
Route::post('/consultation/add', [App\Http\Controllers\ConsultationController::class, 'store'])->name('consultadd');
Route::get('/delete/consultation/{id}', [App\Http\Controllers\ConsultationController::class, 'destroy'])->name('delcon');
Route::post('/readme/{id}', [App\Http\Controllers\ConsultationController::class, 'update'])->name('readmeup');
Route::get('/convo/consultation/{id}', [App\Http\Controllers\ConsultationController::class, 'edit'])->name('convos');
Route::get('/deleteddetails', [App\Http\Controllers\ConsultationController::class, 'deteletdetails'])->name('deldetails');
Route::get('/delete/trash/{id}', [App\Http\Controllers\ConsultationController::class, 'destroytrash'])->name('deltrash');
Route::get('/farm/conversation/{id}', [App\Http\Controllers\ConsultationController::class, 'dates'])->name('convos.new');
Route::post('/readingreply/{id}', [App\Http\Controllers\ConsultationController::class, 'update2'])->name('readdown');
Route::get('/nextconsultsent', [App\Http\Controllers\ConsultationController::class, 'second'])->name('consult.two');
Route::get('/deletethis/now/{id}', [App\Http\Controllers\ConsultationController::class, 'destroying'])->name('del.one');


//for reply
Route::get('/reply', [App\Http\Controllers\ReplyController::class, 'index'])->name('reply');
Route::post('/reply/add', [App\Http\Controllers\ReplyController::class, 'store'])->name('replyadd');
Route::get('/delete/reply/{id}', [App\Http\Controllers\ReplyController::class, 'destroy'])->name('delrep');
// Route::post('/reply/add', [App\Http\Controllers\ReplyController::class, 'store'])->name('replyadd');
Route::post('/info/addss', [App\Http\Controllers\ReplyController::class, 'infome'])->name('infome');



//for tutorial
Route::get('/tutorial', [App\Http\Controllers\TutorialsController::class, 'index'])->name('tutor');
Route::post('/tutorial/add', [App\Http\Controllers\TutorialsController::class, 'store'])->name('tutoradd');
Route::post('/updatetutorial/{id}', [App\Http\Controllers\TutorialsController::class, 'update']);
Route::get('/deletetutorial/{id}', [App\Http\Controllers\TutorialsController::class, 'destroy'])->name('deltut');
Route::get('/tutorialsearch', [App\Http\Controllers\TutorialsController::class, 'find'])->name('tutfind');


//for activity
Route::get('/activity', [App\Http\Controllers\ActivityController::class, 'index'])->name('active');
Route::post('/activity/add', [App\Http\Controllers\ActivityController::class, 'store'])->name('storeact');
Route::post('/activity/update/{id}', [App\Http\Controllers\ActivityController::class, 'update'])->name('activeup');
Route::get('/activity/delete/{id}', [App\Http\Controllers\ActivityController::class, 'destroy'])->name('deleteact');
Route::get('/activitysearch', [App\Http\Controllers\ActivityController::class, 'find'])->name('actfind');


//disposal
Route::get('/disposal', [App\Http\Controllers\DisposaltractorController::class, 'index'])->name('dispose');
Route::post('/disposaltractor/{id}', [App\Http\Controllers\DisposaltractorController::class, 'update'])
->name('disp');
Route::post('/resched/{id}', [App\Http\Controllers\DisposaltractorController::class, 'resched'])->name('resched1');
Route::post('/return/{id}', [App\Http\Controllers\DisposaltractorController::class, 'returnnow'])->name('returnnow');


Route::get('/deletedispose/{id}', [App\Http\Controllers\DisposaltractorController::class, 'destroy'])->name('deledeis');

//inventory
Route::get('/inventorytractor', [App\Http\Controllers\TrinventoryController::class, 'index'])->name('trinventory');
Route::post('/tractorinvetory', [App\Http\Controllers\TrinventoryController::class, 'store'])->name('trstore');
Route::get('/deleteinventory/{id}', [App\Http\Controllers\TrinventoryController::class, 'destroy'])->name('delin');
Route::post('/trinventory/update/{id}', [App\Http\Controllers\TrinventoryController::class, 'update'])->name('upinv');


//mapa
Route::get('/home/map', [App\Http\Controllers\OutletController::class, 'index'])->name('homemap');
Route::post('/add_outlet', [App\Http\Controllers\OutletController::class, 'store'])->name('add_outlet');
Route::get('/show_outlet/{id}', [App\Http\Controllers\OutletController::class, 'show'])->name('show_outlet');
Route::get('/edit_outlet/{id}', [App\Http\Controllers\OutletController::class, 'edit'])->name('edit_outlet');
Route::patch('/update_outlet/{id}', [App\Http\Controllers\OutletController::class, 'update'])->name('update_outlet');
Route::delete('/delete_outlet/{id}', [App\Http\Controllers\OutletController::class, 'destroy'])->name('delete_outlet');



//for crops enrollment
//Route::get('/cropsenrollment', [App\Http\Controllers\TrinventoryController::class, 'index'])->name('trinventory');
Route::get('/crops/service', [App\Http\Controllers\CropserviceController::class, 'index'])->name('cropserve');
Route::post('/cropsserveadd', [App\Http\Controllers\CropserviceController::class, 'store'])->name('cserveadd');
Route::post('/cropsserviceupdate/{id}', [App\Http\Controllers\CropserviceController::class, 'update'])->name('cserveupdate');
Route::get('/deletecropservice/{id}', [App\Http\Controllers\CropserviceController::class, 'destroy'])->name('delcropserv');

//add products
Route::get('/crops/products', [App\Http\Controllers\CropproductController::class, 'index'])->name('cropproducts');
Route::post('/cropsproduct/adding', [App\Http\Controllers\CropproductController::class, 'store'])->name('cropstore');
Route::post('/cropproducts/update/{id}', [App\Http\Controllers\CropproductController::class, 'update'])->name('cropproduct.update');
Route::get('/deletecropproduct/{id}', [App\Http\Controllers\CropproductController::class, 'destroy']);


//croprequest
Route::get('/crops/request/seedlings', [App\Http\Controllers\CroprequestController::class, 'index'])->name('cropseed');
Route::post('/cropseeds/store', [App\Http\Controllers\CroprequestController::class, 'store'])->name('cropseedstore');
Route::post('/croprequest/approval/{id}', [App\Http\Controllers\CroprequestController::class, 'update'])->name('cropapprovalreq');
Route::get('/deletecroprequest/{id}', [App\Http\Controllers\CroprequestController::class, 'destroy'])->name('cropdel.request');
Route::get('/crops/request/status', [App\Http\Controllers\CroprequestController::class, 'status'])->name('crop.status');

//cropinventory
Route::get('/crops/inventory', [App\Http\Controllers\CropinventoryController::class, 'index'])->name('crop.invent');
Route::post('/crops/storinginventory', [App\Http\Controllers\CropinventoryController::class, 'store'])->name('cropinvent.store');
Route::post('/crop/updatingInventory/{id}', [App\Http\Controllers\CropinventoryController::class, 'update'])->name('cropinvent.update');
Route::get('/deletecropinventory/this/{id}', [App\Http\Controllers\CropinventoryController::class, 'destroy']);
//cropdispose
Route::get('/crops/disposal', [App\Http\Controllers\CropdisposeController::class, 'index'])->name('crop.dispose');
Route::post('/crop/deliveryanddisposal/{id}', [App\Http\Controllers\CropdisposeController::class, 'update'])->name('cropdis.update');
Route::get('/deletecropdisposal/this/{id}', [App\Http\Controllers\CropdisposeController::class, 'destroy']);



//loanrequest
Route::get('/loansrequests', [App\Http\Controllers\LoanrequestController::class, 'index'])->name('loanr');
Route::post('/loanrequest/amount', [App\Http\Controllers\LoanrequestController::class, 'store'])->name('loanrequest');
Route::post('/loan/updating/{id}', [App\Http\Controllers\LoanrequestController::class, 'update'])->name('loan.update');
Route::get('/deleteloans/this/{id}', [App\Http\Controllers\LoanrequestController::class, 'destroy']);



//enrollment
Route::get('/enroll/programs/cagropanabo', [App\Http\Controllers\EnrollmentController::class, 'index'])->name('enrollme');
Route::post('/storing/enroll', [App\Http\Controllers\EnrollmentController::class, 'store'])->name('enrolstore');
Route::post('/enroll/updating/{id}', [App\Http\Controllers\EnrollmentController::class, 'update'])->name('enroll.update');
Route::get('/deleteenroll/this/{id}', [App\Http\Controllers\EnrollmentController::class, 'destroy']);



//for fishery
Route::get('/fish/request/now', [App\Http\Controllers\FishrequestController::class, 'index'])->name('fishrequest');
Route::post('/store/fish', [App\Http\Controllers\FishrequestController::class, 'store'])->name('fishstore');
Route::post('/fishrequest/approval/{id}', [App\Http\Controllers\FishrequestController::class, 'update'])->name('fish.approve');
Route::get('/deletefishrequest/{id}', [App\Http\Controllers\FishrequestController::class, 'destroy'])->name('fish.deletereq');
Route::get('/fishstatus/with', [App\Http\Controllers\FishrequestController::class, 'status'])->name('fish.stat');


//fishservice
Route::get('/fishservices', [App\Http\Controllers\FishserviceController::class, 'index'])->name('fishservices');
Route::post('/fishservicestores', [App\Http\Controllers\FishserviceController::class, 'store'])->name('fishserve.store');
Route::post('/fishserviceedit/{id}', [App\Http\Controllers\FishserviceController::class, 'update'])->name('fishserve.update');
Route::get('/deletefisheryservices/{id}', [App\Http\Controllers\FishserviceController::class, 'destroy'])->name('fishserve.del');

//fishproduct
Route::get('/fishproduct', [App\Http\Controllers\FishproductController::class, 'index'])->name('fishproduct');
Route::post('/addfishproducts', [App\Http\Controllers\FishproductController::class, 'store'])->name('fishpro.store');
Route::post('/fishproducta/{id}', [App\Http\Controllers\FishproductController::class, 'update'])->name('fishpro.update');
Route::get('/deleteproduct/fishery/{id}', [App\Http\Controllers\FishproductController::class, 'destroy'])->name('fishpro.del');

//fishinventory
Route::get('/fishinventory', [App\Http\Controllers\FishinventoryController::class, 'index'])->name('fishinventory');
Route::post('/fishinventory/add', [App\Http\Controllers\FishinventoryController::class, 'store'])->name('fishinvent.store');
Route::post('/fishinventory/edit/{id}', [App\Http\Controllers\FishinventoryController::class, 'update'])->name('fishinvent.update');
Route::get('/deletefishinventory/{id}', [App\Http\Controllers\FishinventoryController::class, 'destroy'])->name('fishpro.del');

//fishdisposal
Route::get('/fishdisposal', [App\Http\Controllers\FishdisposeController::class, 'index'])->name('fishdispose');
Route::get('/deletefishdispose/{id}', [App\Http\Controllers\FishdisposeController::class, 'destroy'])->name('fishdispose.del');
Route::post('/fish/delliverdispose/{id}', [App\Http\Controllers\FishdisposeController::class, 'update'])->name('fishdispose.update');




//livestock
Route::get('/livestock/agriculture', [App\Http\Controllers\AnimalrequestController::class, 'index'])->name('animalrequest');
Route::post('/livestock/request', [App\Http\Controllers\AnimalrequestController::class, 'store'])->name('livestockreq');
Route::post('/livestockrrequest/updating/{id}', [App\Http\Controllers\AnimalrequestController::class, 'update'])->name('livestockreq.update');
Route::get('/deletelivestockrequest/{id}', [App\Http\Controllers\AnimalrequestController::class, 'destroy'])->name('livestockreq.del');
Route::get('/satuslivestock/agriculture', [App\Http\Controllers\AnimalrequestController::class, 'status'])->name('animalstatus');


//llivestock service
Route::get('/livestockservices', [App\Http\Controllers\AnimalserviceController::class, 'index'])->name('anim.serve');
Route::post('/livestockservices/add', [App\Http\Controllers\AnimalserviceController::class, 'store'])->name('anim.add');
Route::post('/livestockservices/updating/{id}', [App\Http\Controllers\AnimalserviceController::class, 'update'])->name('anim.update');
Route::get('/livestockservicesremoving/{id}', [App\Http\Controllers\AnimalserviceController::class, 'destroy'])->name('anim.del');

//livestock product
Route::get('/livestockproducts/serve', [App\Http\Controllers\AnimalproductController::class, 'index'])->name('animpro.serve');
Route::post('/livestockproducts/add', [App\Http\Controllers\AnimalproductController::class, 'store'])->name('animpro.add');
Route::post('/productsupdatelive/add/{id}', [App\Http\Controllers\AnimalproductController::class, 'update'])->name('animpro.update');
Route::get('/livestockdeletethis/{id}', [App\Http\Controllers\AnimalproductController::class, 'destroy'])->name('livestock.delete');

//livestockinventory
Route::get('/livestockinventory', [App\Http\Controllers\LivestockinventoryController::class, 'index'])->name('livestock.serve');
Route::post('/livestockinventory/add', [App\Http\Controllers\LivestockinventoryController::class, 'store'])->name('animlive.save');
Route::post('/livestockinventoryupdate/{id}', [App\Http\Controllers\LivestockinventoryController::class, 'update'])->name('animlive.updates');
Route::get('/livestockinventorydelete/{id}', [App\Http\Controllers\LivestockinventoryController::class, 'destroy'])->name('animlive.deletes');

//livestockdispose
Route::get('/livestockdisposal', [App\Http\Controllers\LivestockdisposeController::class, 'index'])->name('livedispose.dispose');
Route::post('/animalsapprovdispose/{id}', [App\Http\Controllers\LivestockdisposeController::class, 'update'])->name('livedispose.approve');
Route::get('/deletingdisposallivestock/{id}', [App\Http\Controllers\LivestockdisposeController::class, 'destroy'])->name('livedispose.destroy');




//User
Route::get('/cagropanabo/activity', [App\Http\Controllers\FarmersController::class, 'act'])->name('farm.act');
Route::get('/activity/events/fulldetais/{id}', [App\Http\Controllers\FarmersController::class, 'activity'])
->name('activitydetails');
Route::get('/cagropanabo/tutorials', [App\Http\Controllers\FarmersController::class, 'tutorial'])->name('farm.tut');
Route::get('/tutorialfulldetails/{id}', [App\Http\Controllers\FarmersController::class, 'tutorialview'])->name('farm.tutor');
Route::get('/billing/activity', [App\Http\Controllers\FarmersController::class, 'bills'])->name('farm.bill');
Route::get('/cagro/subenrollment/', [App\Http\Controllers\FarmersController::class, 'enrollment'])->name('farm.enroll');

Route::get('/farmersupports/', [App\Http\Controllers\FarmersController::class, 'support'])->name('farm.support');
Route::get('/farmerthread/', [App\Http\Controllers\FarmersController::class, 'thread'])->name('farm.thread');
Route::get('/farmerregistration/', [App\Http\Controllers\FarmersController::class, 'registon'])->name('farm.reg');
Route::get('/croprequest/', [App\Http\Controllers\FarmersController::class, 'croprequest'])->name('farmcrop.req');
Route::get('/livestockrequest/farmer/', [App\Http\Controllers\FarmersController::class, 'livestockreq'])->name('farmcrop.lives');
Route::get('/fishrequest/farmer/', [App\Http\Controllers\FarmersController::class, 'fishreq'])->name('farmcrop.fish');
Route::get('/loanrequest/farmer/', [App\Http\Controllers\FarmersController::class, 'loanrequest'])->name('farmcrop.loan');
Route::get('/tractorreq/farmer/', [App\Http\Controllers\FarmersController::class, 'tractor'])->name('farmcrop.tractor');
Route::get('/tractorreq/reviews/', [App\Http\Controllers\FarmersController::class, 'reviewing'])->name('farmcrop.reviewing');




//report route
Route::get('/appliedTractorReport/', [App\Http\Controllers\AppliedController::class, 'report'])->name('applied.report');
Route::get('/reportcrops/', [App\Http\Controllers\CropsController::class, 'report'])->name('crop.report');
Route::get('/reportoffishery/', [App\Http\Controllers\FisheryController::class, 'report'])->name('fish.fish');
Route::get('/reportlivestock/', [App\Http\Controllers\LivestockController::class, 'report'])->name('live.live');




//research route
Route::get('/farmlistmap/', [App\Http\Controllers\FarmparcelController::class, 'index'])->name('map.list');
Route::get('/mapenrollmentall/', [App\Http\Controllers\MapController::class, 'enrollment'])->name('map.enroll');
Route::get('/mapsurveyenrollment/', [App\Http\Controllers\MapController::class, 'allenroll'])->name('map.thisroll');
Route::get('/cropsectormaps/', [App\Http\Controllers\MapController::class, 'cropmap'])->name('map.cropmap');
Route::get('/fishsectormap/', [App\Http\Controllers\MapController::class, 'fishmap'])->name('map.fishmap');
Route::get('/livestocksectormap/', [App\Http\Controllers\MapController::class, 'livemap'])->name('map.livemap');



//farmparcel in research and mapping
Route::post('/addparcellocation/add/{id}', [App\Http\Controllers\MapController::class, 'updateparcel'])->name('parcel.loc');
Route::get('/seelocationoffarm/{id}', [App\Http\Controllers\MapController::class, 'edit'])->name('map.see');
Route::get('/allfarmermap/', [App\Http\Controllers\MapController::class, 'index'])->name('map.farmlist');
Route::post('/enrollmentsurvey/location/{id}', [App\Http\Controllers\MapController::class, 'updateenrol'])->name('maps.enrollee');
Route::get('/locationforenrollment/{id}', [App\Http\Controllers\MapController::class, 'senroll'])->name('map.senroll');


//reports url
Route::get('/inventoryreports', function () {
    return view('research.inventory');
});

Route::get('/monthanddatereports', function () {
    return view('research.report');
});

Route::get('/statisticalreports', function () {
    return view('research.statistics');
});


Auth::routes();
