<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvestigatorLeaderController;
use App\Http\Controllers\RegisterOfficeController;
use App\Http\Controllers\InvestigatorController;

use App\Http\Controllers\policeController;
use App\Http\ControostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CollegePostController;
use App\Http\Controllers\DepartmentPostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CriminalRecordController;
use App\Http\Controllers\InvestigatorLeaderSentToInvestigator;
use App\Http\Controllers\CommonController;
use App\Http\Livewire\Chat\Chat;
use App\Http\Livewire\Chat\Index;
use App\Http\Livewire\Users;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// routes/web.php

// GET route for showing the form (consistent naming)
Route::get('/criminal-reporting', [AdminController::class, 'showReportingForm'])
     ->name('criminal_reporting.form'); // More descriptive name

// POST route for storing the report (RESTful convention)
Route::post('/criminal-reporting', [ReportController::class, 'store'])
     ->name('criminal_reporting.store'); // Simplified name

Route::post('/criminalstore', [AdminController::class, 'CriminalStore'])->name(
        'criminalstore'
    );

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/Common/showcriminalreport', [
        CommonController::class,
        'CommonShowCriminalReport',
    ])->name('Common.showcriminalreport');

});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [
        AdminController::class,
        'AdminDashboard',
    ])->name('admin.dashboard');
    Route::get('/admin/profile', [
        AdminController::class,
        'AdminProfile',
    ])->name('admin.profile');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name(
        'admin.logout'
    );
    Route::post('/admin/profile/store', [
        AdminController::class,
        'AdminProfileStore',
    ])->name('admin.profile.store');
    Route::get('/admin/change/password', [
        AdminController::class,
        'AdminChangePassword',
    ])->name('admin.change.password');


    Route::post('/admin/update/password', [
        AdminController::class,
        'AdminUpdatePassword',
    ])->name('admin.update.password');
    Route::get('/admin/addmember', [
        AdminController::class,
        'AdminAddMember',
    ])->name('admin.addmember');
    Route::get('/admin/showmember', [
        AdminController::class,
        'AdminShowMember',
    ])->name('admin.showmember');
    Route::post('/admin/store', [AdminController::class, 'AdminStore'])->name(
        'admin.store'
    );
    Route::get('/admin/editmember{id}', [
        AdminController::class,
        'AdminEditMember',
    ])->name('admin.editmember');
    Route::post('/admin/updatemember', [
        AdminController::class,
        'AdminUpdateMember',
    ])->name('admin.updatemember');
    Route::get('/admin/deletemember{id}', [
        AdminController::class,
        'AdminDeleteMember',
    ])->name('admin.deletemember');


    Route::get('/admin/addpost', [PostController::class, 'AdminAddPost'])->name(
        'admin.addpost'
    );
    Route::get('/admin/editpost{id}', [
        PostController::class,
        'AdminEditPost',
    ])->name('admin.editpost');
    Route::post('/admin/updatepost', [
        PostController::class,
        'AdminUpdatePost',
    ])->name('admin.updatepost');
    Route::get('/admin/deletepost{id}', [
        PostController::class,
        'AdminDeletePost',
    ])->name('admin.deletepost');

    Route::post('/admin/statuschange{id}', [
        AdminController::class,
        'AdminStatusChange',
    ])->name('admin.statuschange');
    Route::get('/admin/collageposts', [
        CollegePostController::class,
        'AdminCollagePosts',
    ])->name('admin.collageposts');
    Route::get('/admin/departmentposts', [
        DepartmentPostController::class,
        'AdminDepartmentPosts',
    ])->name('admin.departmentposts');
    Route::get('/admin/deletecollegepost{id}', [
        CollegePostController::class,
        'AdminDeleteCollegePost',
    ])->name('admin.deletecollegepost');
    Route::get('/admin/deletedepartmentpost{id}', [
        DepartmentPostController::class,
        'AdminDeleteDepartmentPost',
    ])->name('admin.deletedepartmentpost');

    Route::get('/admin/adddepartmentpost', [
        DepartmentPostController::class,
        'InvestigatorAddDepartmentPost',
    ])->name('admin.adddepartmentpost');

    Route::get('/admin/editdepartmentpost{id}', [
        DepartmentPostController::class,
        'AdminEditDepartmentPost',
    ])->name('admin.editdepartmentpost');
    Route::post('/admin/updatedepartmentpost', [
        DepartmentPostController::class,
        'AdminUpdateDepartmentPost',
    ])->name('admin.updatedepartmentpost');

    Route::get('/admin/showcriminalreport', [
        AdminController::class,
        'AdminShowCriminalReport',
    ])->name('admin.showcriminalreport');
    Route::get('/admin/showrecordedcriminal', [
        CriminalRecordController::class,
        'Adminshowrecordedcriminal',
    ])->name('admin.showrecordedcriminal');
});

Route::middleware(['auth', 'role:investigation_leader'])->group(function () {
    Route::get('/InvestigatorLeader/dashboard', [
        InvestigatorLeaderController::class,
        'InvestigatorLeaderDashboard',
    ])->name('InvestigatorLeader.dashboard');
    Route::get('/InvestigatorLeader/profile', [
        InvestigatorLeaderController::class,
        'InvestigatorLeaderProfile',
    ])->name('InvestigatorLeader.profile');

    Route::get('/InvestigatorLeader/logout', [
        InvestigatorLeaderController::class,
        'InvestigatorLeaderLogout',
    ])->name('InvestigatorLeader.logout');
    Route::post('/InvestigatorLeader/profile/store', [
        InvestigatorLeaderController::class,
        'InvestigatorLeaderProfileStore',
    ])->name('InvestigatorLeader.profile.store');
    Route::get('/InvestigatorLeader/change/password', [
        InvestigatorLeaderController::class,
        'InvestigatorLeaderChangePassword',
    ])->name('InvestigatorLeader.change.password');
    Route::post('/InvestigatorLeader/update/password', [
        InvestigatorLeaderController::class,
        'InvestigatorLeaderUpdatePassword',
    ])->name('InvestigatorLeader.update.password');
    Route::get('/InvestigatorLeader/showmembers', [
        InvestigatorLeaderController::class,
        'InvestigatorLeaderShowMember',
    ])->name('InvestigatorLeader.showmembers');

    Route::get('/InvestigatorLeader/showmembers', [
        InvestigatorLeaderController::class,
        'InvestigatorLeaderShowMember',
    ])->name('InvestigatorLeader.showmembers');

    Route::get('/InvestigatorLeader/collageposts', [
        CollegePostController::class,
        'InvestigatorLeaderCollagePosts',
    ])->name('InvestigatorLeader.collageposts');
    Route::get('/InvestigatorLeader/addcollegepost', [
        CollegePostController::class,
        'InvestigatorLeaderAddCollegePost',
    ])->name('InvestigatorLeader.addcollegepost');
    Route::post('/InvestigatorLeader/post/collegestore', [
        CollegePostController::class,
        'InvestigatorLeaderCollegePostStore',
    ])->name('InvestigatorLeader.post.collegestore');
    Route::get('/InvestigatorLeader/departmentposts', [
        DepartmentPostController::class,
        'InvestigatorLeaderDepartmentposts',
    ])->name('InvestigatorLeader.departmentposts');

    Route::get('/InvestigatorLeader/adddepartmentpost', [
        DepartmentPostController::class,
        'InvestigatorAddDepartmentPost',
    ])->name('InvestigatorLeader.adddepartmentpost');

    Route::post('/InvestigatorLeader/post/departmentstore', [
        DepartmentPostController::class,
        'InvestigatorLeaderDepartmentPostStore',
    ])->name('InvestigatorLeader.post.departmentstore');

    Route::get('/InvestigatorLeader/showcriminalreport', [
        InvestigatorLeaderController::class,
        'InvestigatorLeaderShowCriminalReport',
    ])->name('InvestigatorLeader.showcriminalreport');
    Route::get('/InvestigatorLeader/showallinvestigator', [
        InvestigatorLeaderController::class,
        'InvestigatorLeaderShowAllInvestigator',
    ])->name('InvestigatorLeader.showallinvestigator');

    Route::get('/InvestigatorLeader/sendsuspecttoinvestigator', [
        InvestigatorLeaderController::class,
        'InvestigatorLeaderSendSuspectToInvestigator',
    ])->name('InvestigatorLeader.sendsuspecttoinvestigator');
    Route::get('/InvestigatorLeader/sendtoinvestigator{id}', [
        InvestigatorLeaderController::class,
        'InvestigatorLeaderSendToInvestigator',
    ])->name('InvestigatorLeader.sendtoinvestigator');

    Route::post('/InvestigatorLeader/senttoinvestigator', [InvestigatorLeaderController::class, 'InvestigatorLeaderSentToInvestigator'])->name(
        'investigatorLeader.senttoinvestigator'
    );
});

Route::middleware(['auth', 'role:collage_registral'])->group(function () {
    Route::get('/RegisterOffice/dashboard', [
        RegisterOfficeController::class,
        'RegisterOfficeDashboard',
    ])->name('RegisterOffice.dashboard');
    Route::get('/RegisterOffice/profile', [
        RegisterOfficeController::class,
        'RegisterOfficeProfile',
    ])->name('RegisterOffice.profile');
    Route::get('/RegisterOffice/chat', [
        RegisterOfficeController::class,
        'RegisterOfficeChat',
    ])->name('RegisterOffice.chat');
    Route::get('/RegisterOffice/logout', [
        RegisterOfficeController::class,
        'RegisterOfficeLogout',
    ])->name('RegisterOffice.logout');
    Route::post('/RegisterOffice/profile/store', [
        RegisterOfficeController::class,
        'RegisterOfficeProfileStore',
    ])->name('RegisterOffice.profile.store');
    Route::get('/RegisterOffice/change/password', [
        RegisterOfficeController::class,
        'RegisterOfficeChangePassword',
    ])->name('RegisterOffice.change.password');
    Route::post('/RegisterOffice/update/password', [
        RegisterOfficeController::class,
        'RegisterOfficeUpdatePassword',
    ])->name('RegisterOffice.update.password');
    Route::get('/RegisterOffice/posts', [
        RegisterOfficeController::class,
        'RegisterOfficePosts',
    ])->name('RegisterOffice.posts');

    Route::get('/RegisterOffice/adddepartmentpost', [
        DepartmentPostController::class,
        'InvestigatorAddDepartmentPost',
    ])->name('RegisterOffice.adddepartmentpost');
    Route::get('/RegisterOffice/showmembers', [
        RegisterOfficeController::class,
        'RegisterOfficeShowMember',
    ])->name('RegisterOffice.showmembers');
    Route::get('/RegisterOffice/recordcriminalinformation', [
        RegisterOfficeController::class,
        'RegisterOfficeRecordcriminalinformation',
    ])->name('RegisterOffice.recordcriminalinformation');
    Route::post('/registeroffice/storecriminalrecord', [RegisterOfficeController::class, 'RegisterOfficestorecriminalrecord'])->name(
        'registeroffice.storecriminalrecord'
    );
});

Route::middleware(['auth', 'role:investigator'])->group(function () {
    Route::get('/Investigator/dashboard', [
        InvestigatorController::class,
        'InvestigatorDashboard',
    ])->name('Investigator.dashboard');
    Route::get('/Investigator/profile', [
        InvestigatorController::class,
        'InvestigatorProfile',
    ])->name('Investigator.profile');

    Route::get('/Investigator/logout', [
        InvestigatorController::class,
        'InvestigatorLogout',
    ])->name('Investigator.logout');
    Route::get('/Investigator/showmember', [
        InvestigatorController::class,
        'InvestigatorShowMember',
    ])->name('Investigator.showmembers');
    Route::post('/Investigator/profile/store', [
        InvestigatorController::class,
        'InvestigatorProfileStore',
    ])->name('Investigator.profile.store');
    Route::get('/Investigator/change/password', [
        InvestigatorController::class,
        'InvestigatorChangePassword',
    ])->name('Investigator.change.password');
    Route::post('/Investigator/update/password', [
        InvestigatorController::class,
        'InvestigatorUpdatePassword',
    ])->name('Investigator.update.password');

    Route::get('/Investigator/addpost', [
        PostController::class,
        'AdminAddPost',
    ])->name('Investigator.addpost');
    Route::get('/Investigator/posts/editpost', [
        PostController::class,
        'InvestigatorEditPost',
    ])->name('Investigator.post.alleditpost{id}');
    Route::post('/Investigator/updatepost', [
        PostController::class,
        'InvestigatorUpdatePost',
    ])->name('Investigator.updatepost');
    Route::get('/Investigator/deletepost', [
        PostController::class,
        'InvestigatorDeletePost',
    ])->name('Investigator.deletepost{id}');

    Route::get('/Investigator/collageposts', [
        CollegePostController::class,
        'InvestigatorCollagePosts',
    ])->name('Investigator.collageposts');
    Route::get('/Investigator/addcollegepost', [
        CollegePostController::class,
        'InvestigatorAddCollegePost',
    ])->name('Investigator.addcollegepost');
    Route::post('/Investigator/post/collegestore', [
        CollegePostController::class,
        'InvestigatorCollegePostStore',
    ])->name('Investigator.post.collegestore');
    Route::get('/Investigator/departmentposts', [
        DepartmentPostController::class,
        'InvestigatorDepartmentposts',
    ])->name('Investigator.departmentposts');
    Route::get('/Investigator/adddepartmentpost', [
        DepartmentPostController::class,
        'InvestigatorAddDepartmentPost',
    ])->name('Investigator.adddepartmentpost');
    Route::post('/Investigator/post/departmentstore', [
        DepartmentPostController::class,
        'InvestigatorDepartmentPostStore',
    ])->name('Investigator.post.departmentstore');
    Route::get('/Investigator/showreportsentfrominvestigatorleader', [
        InvestigatorController::class,
        'InvestigatorShowReportSentFromInvestigatorLeader',
    ])->name('Investigator.showreportsentfrominvestigatorleader');
});

Route::middleware(['auth', 'role:police'])->group(function () {
    Route::get('/police/dashboard', [
        policeController::class,
        'policeDashboard',
    ])->name('police.dashboard');
    Route::get('/police/profile', [
        policeController::class,
        'policeProfile',
    ])->name('police.profile');
    Route::get('/police/chat', [policeController::class, 'policeChat'])->name(
        'police.chat'
    );
    Route::get('/police/logout', [policeController::class, 'policeLogout'])->name(
        'police.logout'
    );
    Route::post('/police/profile/store', [
        policeController::class,
        'policeProfileStore',
    ])->name('police.profile.store');
    Route::get('/police/change/password', [
        policeController::class,
        'policeChangePassword',
    ])->name('police.change.password');
    Route::post('/police/update/password', [
        policeController::class,
        'policeUpdatePassword',
    ])->name('police.update.password');
    Route::get('/police/posts', [PostController::class, 'policePosts'])->name(
        'police.posts'
    );
    Route::get('/police/collageposts', [
        CollegePostController::class,
        'policeCollagePosts',
    ])->name('police.collageposts');
    Route::get('/police/departmentposts', [
        DepartmentPostController::class,
        'policeDepartmentPosts',
    ])->name('police.departmentposts');

    Route::get('/police/adddepartmentpost', [
        DepartmentPostController::class,
        'InvestigatorAddDepartmentPost',
    ])->name('police.adddepartmentpost');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
});
