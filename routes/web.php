<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Master\CommitteeTypeController;
use App\Http\Controllers\Master\MemberTypeController;
use App\Http\Controllers\Master\QualificationController;



use App\Http\Controllers\Admin\CommitteeController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\LoseMemberController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\EventPaymentController;

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


//___________________________________// START \\______________________________________________//
Route::get('/', [FrontViewController::class, 'welcome'])->name('/');

/**______________________________________________________________________________________________
 * View Pages => ALL
 * ______________________________________________________________________________________________
 */
Route::get('comming/soon', [FrontViewController::class, 'welcome'])->name('comming_soon');
//______________ ABOUT US
Route::get('pages/about-us', [FrontViewController::class, 'about'])->name('page.about-us');
Route::get('pages/message', [FrontViewController::class, 'message'])->name('page.message');
Route::get('pages/memorandum', [FrontViewController::class, 'memorandum'])->name('page.memorandum');
//______________ COMMITTEE
Route::get('pages/{id}/committee', [FrontViewController::class, 'committee'])->name('page.committee');
//______________ MEMBERS 
Route::get('pages/{id}/member', [FrontViewController::class, 'member'])->name('page.member');
//______________ WHY BE MEMBER
Route::get('pages/why-be-member',[FrontViewController::class,'whyBeMember'])->name('page.why-be-member');
//______________ LINK PAGE
Route::get('pages/requirements',[FrontViewController::class,'requirements'])->name('page.requirements');
Route::get('pages/requirements-details',[FrontViewController::class,'requirementDetails'])->name('page.requirements_details');
Route::get('pages/requirements-student',[FrontViewController::class,'requirementStudent'])->name('page.requirements_student');
//______________ GALLERY
Route::get('pages/gallery-image',[FrontViewController::class,'galleryImage'])->name('page.gallery-cover');
Route::get('pages/gallery-image/{id}/show',[FrontViewController::class,'galleryShow'])->name('page.gallery-show');
//______________ EVENTS
Route::get('pages/events', [FrontViewController::class,'events'])->name('page.events');
Route::get('pages/events-search', [FrontViewController::class,'eventSearch'])->name('page.events-search');
Route::get('pages/events/{id}/details', [FrontViewController::class,'eventShow'])->name('page.events-details');
//______________ Corporate Partners
Route::get('page/corporate-partners', [FrontViewController::class, 'corporatePartners'])->name('page.corporate-partners');
//______________ BLOGS
Route::get('page/blogs', [FrontViewController::class, 'blogs'])->name('page.blogs');
Route::get('page/news-content-details/{id}', [FrontViewController::class, 'blogDetails'])->name('page.blog-details');
Route::get('page/newsletters', [FrontViewController::class, 'newsletter'])->name('page.newsletters');
Route::get('/download-newsletter/{id}', [NewsletterController::class, 'downloadNewsletter'])->name('newsletter.download');
//______________ CONTACT US
Route::get('pages/contact-us', [FrontViewController::class, 'contact'])->name('page.contact-us');
Route::post('contact-us/store', [ContactController::class,'contactStore'])->name('contact-us.store');
//______________ OTHER
Route::get('pages/terms-condition', [FrontViewController::class, 'termsCondition'])->name('page.terms-condition');
Route::get('pages/privacy-policy', [FrontViewController::class,'privacyPolicy'])->name('page.privacy-policy');


Route::get('download/member-list/download-csv', [MemberController::class, 'downloadMemberListCSV'])->name('member-csv.download');

/**______________________________________________________________________________________________
 * Login Check => Dashboard
 * ______________________________________________________________________________________________
 */
Route::middleware([ 'auth:sanctum','verified','member', config('jetstream.auth_session')])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('pages/member-all', [AdminController::class, 'member'])->name('page.member-all');
    Route::get('pages/member-search', [AdminController::class,'memberSearch'])->name('page.member-search');
    
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
});

/* Apply Membership */
Route::get('/member-register/create', [MemberController::class,'create'])->name('member_register.create');
Route::post('/member-register/store', [MemberController::class,'store'])->name('member_register.store');
Route::post('/member-verification/find', [MemberController::class, 'findMember'])->name('member.find');

/* Payment check */
Route::group(['middleware' => ['verified']], function () {
    Route::get('/registation-payment/create', [TransactionController::class, 'createRegistation'])->name('registation-payment.create');
    Route::post('/registation-payment/store', [TransactionController::class, 'storeRegistation'])->name('registation-payment.store');
});




/*
|--------------------------------------------------------------------------
| Profile Setting
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth']], function(){
    Route::get('member-prifile/{id}/show', [ProfileController::class, 'profile_show'])->name('profile_show');
    Route::put('member-prifile/other_info/{id}/update', [ProfileController::class, 'infoOtherUpdate'])->name('info_other.update');
    Route::post('member-prifile/change-password/{id}', [ProfileController::class, 'changePassword'])->name('change.password');
    Route::get('info_member/edit/{id}', [ProfileController::class, 'member_edit'])->name('info_member.edit');
    Route::post('info_member/update/{id}', [ProfileController::class, 'member_update'])->name('info_member.update');
});


Route::group(['middleware' => ['auth']], function(){
    /**______________________________________________________________________________________________
     * MEMBER => MENU
     * ______________________________________________________________________________________________
     */
    Route::get('member/{id}/index', [MemberController::class,'index'])->name('member.index');
    // Route::get('member/{id}/edit', [MemberController::class,'edit'])->name('member.edit');
    // Route::get('member/{id}/show', [MemberController::class,'show'])->name('member.show');
    // Route::PATCH('member/{id}/update', [MemberController::class,'update'])->name('member.update');
    //-- MEMBER APPROVE
    Route::get('member-approve/index', [MemberController::class,'approveIndex'])->name('members-approve.index');
    Route::get('member-approve/padding', [MemberController::class, 'approvePadding'])->name('member-approve.padding');
    Route::PATCH('member-approve/{id}/update', [MemberController::class, 'approveUpdate'])->name('member-approve.update');
    Route::PATCH('member-approve/{id}/cancel', [MemberController::class, 'approveCancel'])->name('member-approve.cancel');

    Route::get('download/member-documents/{id}/download-ZipFile', [MemberController::class, 'downloadZipFile'])->name('member-document.downloadZipFile');
    Route::get('download/member-certificate/{user}', [MemberController::class, 'certificateDownload'])->name('member-certificate.download');

    Route::get('download/member-documents/{id}/trade_licence', [MemberController::class, 'downloadTradeLicence'])->name('document-trade-licence.download');
    Route::get('download/member-documents/{id}/tin_certificate', [MemberController::class, 'downloadTinCertificate'])->name('document-tin-certificate.download');
    Route::get('download/member-documents/{id}/nid_photo_copy', [MemberController::class, 'downloadNidPhotoCopy'])->name('document-nid-photo-copy.download');
    Route::get('download/member-documents/{id}/passport_photo', [MemberController::class, 'downloadPassportPhoto'])->name('document-passport-photo.download');
    Route::get('download/member-documents/{id}/edu_certificate', [MemberController::class, 'downloadEduCertificate'])->name('document-edu-certificate.download');
    Route::get('download/member-documents/{id}/experience_certificate', [MemberController::class, 'downloadExperienceCertificate'])->name('document-experience-certificate.download');
    Route::get('download/member-documents/{id}/stu_id_copy', [MemberController::class, 'downloadStuIdCopy'])->name('document-stu-id-copy.download');
    Route::get('download/member-documents/{id}/recoment_letter', [MemberController::class, 'downloadRecomentLetter'])->name('document-recoment-letter.download');
    
    //-- MASTER SETTING =>> Member
    Route::get('master/member-type/index',[MemberTypeController::class,'index'])->name('member-type.index');
    Route::post('master/member-type/store', [MemberTypeController::class, 'store'])->name('member-type.store');
    Route::get('master/member-type/edit', [MemberTypeController::class, 'edit'])->name('member-type.edit');
    Route::get('master/member-type/delete', [MemberTypeController::class, 'delete'])->name('member-type.delete');
    //-- MASTER SETTING =>> Committee
    Route::get('master/committee-type/index',[CommitteeTypeController::class,'index'])->name('committee-type.index');
    Route::post('master/committee-type/store', [CommitteeTypeController::class, 'store'])->name('committee-type.store');
    Route::get('master/committee-type/edit', [CommitteeTypeController::class, 'edit'])->name('committee-type.edit');
    Route::get('master/committee-type/delete', [CommitteeTypeController::class, 'delete'])->name('committee-type.delete');
    //-- MASTER SETTING =>> Qualification
    Route::get('master/member-qualification/index',[QualificationController::class,'index'])->name('member-qualification.index');
    Route::post('master/member-qualification/store', [QualificationController::class, 'store'])->name('member-qualification.store');
    Route::get('master/member-qualification/edit', [QualificationController::class, 'edit'])->name('member-qualification.edit');
    Route::get('master/member-qualification/delete', [QualificationController::class, 'delete'])->name('member-qualification.delete');
    
    /**______________________________________________________________________________________________
     * TRANSACTION => MENU
     * ______________________________________________________________________________________________
     */
    //-- TRANSACTION => MEMBER REGISTATION
    Route::get('transaction-registation/approve/index', [TransactionController::class,'approveIndexRegistation'])->name('transaction-registation-approve.index');
    Route::PATCH('transaction-registation/{id}/approve', [TransactionController::class, 'approveRegistationApproved'])->name('transaction-registation.approve');
    Route::PATCH('transaction-registation/{id}/cancel', [TransactionController::class, 'approveRegistationCancel'])->name('transaction-registation.cancel');
    Route::get('transaction-registation/{id}/details', [TransactionController::class, 'approveRegistrationDetails'])->name('transaction-registration.details');
    Route::get('download/transaction-registation/{id}', [TransactionController::class, 'downloadSlip'])->name('transaction-document.download');

    //-- TRANSACTION => EVENT REGISTATION
    Route::get('transaction-event/index', [TransactionController::class,'indexEventRegistation'])->name('transaction-event.index');
    Route::get('transaction-event/{id}/create', [TransactionController::class,'createEventRegistation'])->name('transaction-event.create');

    Route::get('transaction-event-approve/index', [TransactionController::class,'approveIndexEvent'])->name('transaction-event-approve.index');
    Route::PATCH('transaction-event/{id}/approve', [TransactionController::class, 'approveEventApproved'])->name('transaction-event.approve');
    Route::PATCH('transaction-event/{id}/cancel', [TransactionController::class, 'approveEventCancel'])->name('transaction-event.cancel');
    Route::get('transaction-event/{id}/details', [TransactionController::class, 'approveEventDetails'])->name('transaction-event.details');
    
    //-- TRANSACTION => ANNUAL REGISTATION
    Route::get('transaction-annual/index', [TransactionController::class,'indexAnnualFees'])->name('transaction-annual.index');
    Route::get('transaction-annual/create', [TransactionController::class,'createAnnualFees'])->name('transaction-annual.create');

    Route::get('transaction-annual-approve/index', [TransactionController::class,'approveIndexAnnualFees'])->name('transaction-annual-approve.index');
    Route::PATCH('transaction-annual/{id}/approve', [TransactionController::class, 'approveAnnualFeesApproved'])->name('transaction-annual.approve');
    Route::PATCH('transaction-annual/{id}/cancel', [TransactionController::class, 'approveAnnualFeesCancel'])->name('transaction-annual.cancel');
    Route::get('transaction-annual/{id}/details', [TransactionController::class, 'approveAnnualFeesDetails'])->name('transaction-annual.details');
    
    //-- MASTER SETTING =>> PAYMENT NUMBER
    Route::get('master/transaction-payment/number/index',[TransactionController::class,'indexPaymentNumber'])->name('transaction-payment-number.index');
    Route::post('master/transaction-payment/number/store',[TransactionController::class,'storePaymentNumber'])->name('transaction-payment-number.store');
    Route::get('master/transaction-payment/number/edit',[TransactionController::class,'editPaymentNumber'])->name('transaction-payment-number.edit');
    Route::get('master/transaction-payment/number/delete',[TransactionController::class,'deletePaymentNumber'])->name('transaction-payment-number.delete');
    Route::get('get/payment-number',[TransactionController::class,'getPaymentNumber'])->name('get-payment-number');
    //-- MASTER SETTING =>> PAYMENT FEE
    Route::get('master/transaction-payment/fees/index',[TransactionController::class,'indexPaymentFees'])->name('transaction-payment-fees.index');
    Route::get('master/transaction-payment/fees/edit',[TransactionController::class,'editPaymentFees'])->name('transaction-payment-fees.edit');
    Route::post('master/transaction-payment/fees/store',[TransactionController::class,'storePaymentFees'])->name('transaction-payment-fees.store');
    /**______________________________________________________________________________________________
     * POST => MENU
     * ______________________________________________________________________________________________
     */
    //-- GALLERY
    Route::resource('gallery', GalleryController::class);
    Route::delete('gallery-destroy/{id}',[GalleryController::class,'destroy'])->name('gallery.destroy');
    Route::delete('gallery-deleteimage/{id}',[GalleryController::class,'deleteimage'])->name('gallery.deleteimage');
    Route::delete('gallery-deletecover/{id}',[GalleryController::class,'deletecover'])->name('gallery.deletecover');

    Route::get('/download/{id}', [GalleryController::class, 'downloadFile'])->name('gallery.download');
    Route::get('/dowloads', [GalleryController::class, 'dowloads']);

    Route::get('dashboard-gallery/all',[GalleryController::class,'bvGallery'])->name('dashboard-gallery.all');
    Route::get('dashboard-gallery/{id}/show',[GalleryController::class,'bvGalleryImage'])->name('dashboard-gallery.images');
    //-- EVENTS
    Route::resource('event', EventController::class);
        //-- BLOG
    Route::get('blog-news/index', [BlogController::class,'index'])->name('blog.index');
    Route::get('blog-news/create', [BlogController::class,'create'])->name('blog.create');
    Route::post('blog-news/store', [BlogController::class,'store'])->name('blog.store');
    Route::get('blog-news/edit/{blog}', [BlogController::class,'edit'])->name('blog.edit');
    Route::put('blog-news/update/{blog}', [BlogController::class,'update'])->name('blog.update');
    Route::get('blog-news/show/{blog}', [BlogController::class,'show'])->name('blog.show');
    Route::delete('blog-news/delete/{id}', [BlogController::class,'destroy'])->name('blog.delete');
    //-- CONTACT
    Route::resource('blog', BlogController::class);
    Route::resource('newsletters', NewsletterController::class);
    //-- CONTACT
    Route::get('contact-us/index', [ContactController::class,'contactIndex'])->name('contact-us.index');
    Route::get('contact-us/{id}/reply', [ContactController::class,'contactReply'])->name('contact-us.reply');
    Route::get('contact-us/{id}/delete', [ContactController::class,'contactDelete'])->name('contact-us.delete');
});













//---Website View
Route::get('/advisor', [MemberController::class,'fv_adviser'])->name('fv.advisor');
Route::get('/ecommittee', [MemberController::class,'fv_executive_committee'])->name('fv.executive_committee');
Route::get('/welfare', [MemberController::class,'fv_welfare'])->name('fv.welfare');
Route::get('/member/list', [MemberController::class,'fv_member_all'])->name('page.member_list');

/*___________ Committee Member __________*/
Route::group(['middleware' => ['auth']], function(){
    Route::get('/bv_advisor', [MemberController::class,'bv_adviser'])->name('bv.advisor');
    Route::get('/bv_ecommittee', [MemberController::class,'bv_executive_committee'])->name('bv.executive_committee');
    Route::get('/bv_welfare', [MemberController::class,'bv_welfare'])->name('bv.welfare');
    Route::get('/bv_member/list', [MemberController::class,'bv_member_all'])->name('bv.member_list');
});

/*___________ Subscription Information __________*/
// Route::group(['middleware' => ['auth']], function(){
//     Route::resource('subscription', SubscriptionController::class);
// });
// Route::get ('/subscription_approve_list', [SubscriptionController::class,'subscription_approve_list'])->name('subscription_approve_list');
// Route::patch ('/subscription_approve/{id}', [SubscriptionController::class,'subscription_approve'])->name('subscription_approve.update');
// Route::patch ('/subscription_cancel/{id}', [SubscriptionController::class,'subscription_cancel'])->name('subscription_cancel.update');
// /*___________ Lose Member __________*/
// Route::group(['middleware' => ['auth']], function(){
//     Route::resource('lose_member', LoseMemberController::class);
// });
/*___________ Event Information __________*/
// Route::group(['middleware' => ['auth']], function(){
//     Route::resource('event', EventController::class);

//     Route::get('/event_payment', [EventPaymentController::class,'index'])->name('event_payment.index');
//     Route::get('/event_payment/create/{id}', [EventPaymentController::class,'create'])->name('event_payment.create');
//     Route::post('/event_payment/store/{id}', [EventPaymentController::class,'store'])->name('event_payment.store');
//     Route::get('/event_payment/edit/{id}', [EventPaymentController::class,'edit'])->name('event_payment.edit');
//     Route::put('/event_payment/update/{id}', [EventPaymentController::class,'update'])->name('event_payment.update');
//     Route::get('/event_payment/{id}/destroy', [EventPaymentController::class,'destroy'])->name('event_payment.destroy');

//     Route::get('/events_register/from/{id}', [EventController::class,'register_create'])->name('events_register');
//     Route::post('/events_register/store/{id}', [EventController::class,'event_register'])->name('events_register.store');

//     Route::get('/event_registation_list', [EventController::class,'event_registation_list'])->name('event_registation_list');
//     Route::get('/event_approve_list', [EventController::class,'event_approve_list'])->name('event_approve_list');
//     Route::patch ('/approve_event/update/{id}', [EventController::class,'approve_event_fee'])->name('approve_event_fee.update');
//     Route::patch ('/cancel_event_fee/update/{id}', [EventController::class,'cancel_event_fee'])->name('cancel_event_fee.update');
// });
//---Website View
Route::get('/view-pdf', function () {
    return response()->file(public_path('images/memoradum.pdf'));
})->name('view.pdf');
