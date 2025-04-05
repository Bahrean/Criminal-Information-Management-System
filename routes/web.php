<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CollageDeanController;
use App\Http\Controllers\CollageRegistralController;
use App\Http\Controllers\DepartmentHeadController;

use App\Http\Controllers\StuffController;
use App\Http\ControostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CollegePostController;
use App\Http\Controllers\DepartmentPostController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/chat', Index::class)->name('chat.index');
    Route::get('/chat/{query}', Chat::class)->name('chat');

    Route::get('/users', Users::class)->name('users');

    Route::patch('/posts/{post}/{action}', [
        PostController::class,
        'updateFeedback',
    ]);

    Route::get('/common/posts', [PostController::class, 'AdminPosts2'])->name(
        'common.posts.post'
    );
    Route::get('/common/addpost', [
        PostController::class,
        'CommonAddPost',
    ])->name('common.addpost');
    Route::post('/common/post/store', [
        PostController::class,
        'CommonPostStore',
    ])->name('common.post.store');
    Route::get('/common/editpost{id}', [
        PostController::class,
        'CommonEditPost',
    ])->name('common.editpost');
    Route::post('/common/updatepost', [
        PostController::class,
        'CommonUpdatePost',
    ])->name('common.updatepost');
    Route::get('/common/deletepost{id}', [
        PostController::class,
        'CommonDeletePost',
    ])->name('common.deletepost');

    Route::get('/common/departmentpost', [
        DepartmentPostController::class,
        'CommonDepartmentposts',
    ])->name('common.posts.departmentpost');
    Route::get('/common/adddepartmentpost', [
        DepartmentPostController::class,
        'CommonAddDepartmentPost',
    ])->name('common.adddepartmentpost');
    Route::post('/common/departmentpost/store', [
        DepartmentPostController::class,
        'CommonDepartmentPostStore',
    ])->name('common.departmentpost.store');
    Route::get('/common/editdepartmentpost{id}', [
        DepartmentPostController::class,
        'CommonEditDepartmentPost',
    ])->name('common.editdepartmentpost');
    Route::post('/common/updatedepartmentpost', [
        DepartmentPostController::class,
        'CommonUpdateDepartmentPost',
    ])->name('common.updatedepartmentpost');
    Route::get('/common/deletedepartmentpost{id}', [
        DepartmentPostController::class,
        'CommonDeleteDepartmentPost',
    ])->name('common.deletedepartmentpost');

    Route::get('/common/collegepost', [
        CollegePostController::class,
        'CommonCollegePost',
    ])->name('common.posts.collegepost');
    Route::get('/common/addcollegepost', [
        CollegePostController::class,
        'CommonCollegeAddPost',
    ])->name('common.addcollegepost');
    Route::post('/common/collegepost/store', [
        CollegePostController::class,
        'CommonCollegePostStore',
    ])->name('common.collegepost.store');

    Route::get('/common/editcollegepost{id}', [
        CollegePostController::class,
        'CommonEditCollegePost',
    ])->name('common.editcollegepost');
    Route::post('/common/updatecollegepost', [
        CollegePostController::class,
        'CommonUpdateCollegePost',
    ])->name('common.updatecollegepost');
    Route::get('/common/deletecollegepost{id}', [
        CollegePostController::class,
        'CommonDeleteCollegePost',
    ])->name('common.deletecollegepost');
});

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
    Route::get('/admin/chat', [AdminController::class, 'AdminChat'])->name(
        'admin.chat'
    );
    Route::get('/admin/posts', [AdminController::class, 'AdminPosts'])->name(
        'admin.posts'
    );
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
    Route::get('/admin/posts2', [PostController::class, 'AdminPosts2'])->name(
        'admin.posts2'
    );
    Route::get('/admin/postcomment{post}', [
        PostController::class,
        'AdminPostComment',
    ])->name('admin.post.comment');
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
    Route::post('/admin/post/store', [
        PostController::class,
        'AdminPostStore',
    ])->name('admin.post.store');
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
        'DepartmentHeadAddDepartmentPost',
    ])->name('admin.adddepartmentpost');

    Route::get('/admin/editdepartmentpost{id}', [
        DepartmentPostController::class,
        'AdminEditDepartmentPost',
    ])->name('admin.editdepartmentpost');
    Route::post('/admin/updatedepartmentpost', [
        DepartmentPostController::class,
        'AdminUpdateDepartmentPost',
    ])->name('admin.updatedepartmentpost');
});

Route::middleware(['auth', 'role:collage_dean'])->group(function () {
    Route::get('/collagedean/dashboard', [
        CollageDeanController::class,
        'CollageDeanDashboard',
    ])->name('collagedean.dashboard');
    Route::get('/collagedean/profile', [
        CollageDeanController::class,
        'CollageDeanProfile',
    ])->name('collagedean.profile');
    Route::get('/collagedean/chat', [
        CollageDeanController::class,
        'CollagedeanChat',
    ])->name('collagedean.chat');
    Route::get('/collagedean/logout', [
        CollageDeanController::class,
        'CollagedeanLogout',
    ])->name('collagedean.logout');
    Route::post('/collagedean/profile/store', [
        CollageDeanController::class,
        'CollagedeanProfileStore',
    ])->name('collagedean.profile.store');
    Route::get('/collagedean/change/password', [
        CollageDeanController::class,
        'CollagedeanChangePassword',
    ])->name('collagedean.change.password');
    Route::post('/collagedean/update/password', [
        CollageDeanController::class,
        'CollagedeanUpdatePassword',
    ])->name('collagedean.update.password');
    Route::get('/collegedean/showmembers', [
        CollageDeanController::class,
        'CollegeDeanShowMember',
    ])->name('collegedean.showmembers');
    Route::get('/collegedean/posts', [
        PostController::class,
        'CollegeDeanPosts',
    ])->name('collegedean.posts');
    Route::get('/collegedean/showmembers', [
        CollageDeanController::class,
        'CollegeDeanShowMember',
    ])->name('collegedean.showmembers');

    Route::get('/collegedean/collageposts', [
        CollegePostController::class,
        'CollegeDeanCollagePosts',
    ])->name('collegedean.collageposts');
    Route::get('/collegedean/addcollegepost', [
        CollegePostController::class,
        'CollegeDeanAddCollegePost',
    ])->name('collegedean.addcollegepost');
    Route::post('/collegedean/post/collegestore', [
        CollegePostController::class,
        'CollegeDeanCollegePostStore',
    ])->name('collegedean.post.collegestore');
    Route::get('/collegedean/departmentposts', [
        DepartmentPostController::class,
        'CollegeDeanDepartmentposts',
    ])->name('collegedean.departmentposts');

    Route::get('/collegedean/adddepartmentpost', [
        DepartmentPostController::class,
        'DepartmentHeadAddDepartmentPost',
    ])->name('collegedean.adddepartmentpost');

    Route::post('/collegedean/post/departmentstore', [
        DepartmentPostController::class,
        'CollegeDeanDepartmentPostStore',
    ])->name('collegedean.post.departmentstore');
});

Route::middleware(['auth', 'role:collage_registral'])->group(function () {
    Route::get('/collageregistral/dashboard', [
        CollageRegistralController::class,
        'CollageRegistralDashboard',
    ])->name('collageregistral.dashboard');
    Route::get('/collageregistral/profile', [
        CollageRegistralController::class,
        'CollageRegistralProfile',
    ])->name('collageregistral.profile');
    Route::get('/collageregistral/chat', [
        CollageRegistralController::class,
        'CollageRegistralChat',
    ])->name('collageregistral.chat');
    Route::get('/collageregistral/logout', [
        CollageRegistralController::class,
        'CollageRegistralLogout',
    ])->name('collageregistral.logout');
    Route::post('/collageregistral/profile/store', [
        CollageRegistralController::class,
        'CollageRegistralProfileStore',
    ])->name('collageregistral.profile.store');
    Route::get('/collageregistral/change/password', [
        CollageRegistralController::class,
        'CollageRegistralChangePassword',
    ])->name('collageregistral.change.password');
    Route::post('/collageregistral/update/password', [
        CollageRegistralController::class,
        'CollageRegistralUpdatePassword',
    ])->name('collageregistral.update.password');
    Route::get('/collageregistral/posts', [
        CollageRegistralController::class,
        'CollageRegistralPosts',
    ])->name('collageregistral.posts');

    Route::get('/collageregistral/adddepartmentpost', [
        DepartmentPostController::class,
        'DepartmentHeadAddDepartmentPost',
    ])->name('collageregistral.adddepartmentpost');
    Route::get('/collageregistral/showmembers', [
        CollageRegistralController::class,
        'CollageRegistralShowMember',
    ])->name('collageregistral.showmembers');
});

Route::middleware(['auth', 'role:department_head'])->group(function () {
    Route::get('/departmenthead/dashboard', [
        DepartmentHeadController::class,
        'DepartmentHeadDashboard',
    ])->name('departmenthead.dashboard');
    Route::get('/departmenthead/profile', [
        DepartmentHeadController::class,
        'DepartmentHeadProfile',
    ])->name('departmenthead.profile');
    Route::get('/departmenthead/chat', [
        DepartmentHeadController::class,
        'DepartmentHeadChat',
    ])->name('departmenthead.chat');
    Route::get('/departmenthead/logout', [
        DepartmentHeadController::class,
        'DepartmentHeadLogout',
    ])->name('departmenthead.logout');
    Route::get('/departmenthead/showmember', [
        DepartmentHeadController::class,
        'DepartmentHeadShowMember',
    ])->name('departmenthead.showmembers');
    Route::post('/departmenthead/profile/store', [
        DepartmentHeadController::class,
        'DepartmentHeadProfileStore',
    ])->name('departmenthead.profile.store');
    Route::get('/departmenthead/change/password', [
        DepartmentHeadController::class,
        'DepartmentHeadChangePassword',
    ])->name('departmenthead.change.password');
    Route::post('/departmenthead/update/password', [
        DepartmentHeadController::class,
        'DepartmentHeadUpdatePassword',
    ])->name('departmenthead.update.password');
    Route::get('/departmenthead/posts', [
        PostController::class,
        'AdminPosts2',
    ])->name('departmenthead.posts');
    Route::get('/departmenthead/addpost', [
        PostController::class,
        'AdminAddPost',
    ])->name('departmenthead.addpost');
    Route::get('/departmenthead/posts/editpost', [
        PostController::class,
        'DepartmentHeadEditPost',
    ])->name('departmenthead.post.alleditpost{id}');
    Route::post('/departmenthead/updatepost', [
        PostController::class,
        'DepartmentHeadUpdatePost',
    ])->name('departmenthead.updatepost');
    Route::get('/departmenthead/deletepost', [
        PostController::class,
        'DepartmentHeadDeletePost',
    ])->name('departmenthead.deletepost{id}');
    Route::post('/departmenthead/post/store', [
        PostController::class,
        'DepartmentHeadPostStore',
    ])->name('departmenthead.post.store');
    Route::get('/departmenthead/collageposts', [
        CollegePostController::class,
        'DepartmentHeadCollagePosts',
    ])->name('departmenthead.collageposts');
    Route::get('/departmenthead/addcollegepost', [
        CollegePostController::class,
        'DepartmentHeadAddCollegePost',
    ])->name('departmenthead.addcollegepost');
    Route::post('/departmenthead/post/collegestore', [
        CollegePostController::class,
        'DepartmentHeadCollegePostStore',
    ])->name('departmenthead.post.collegestore');
    Route::get('/departmenthead/departmentposts', [
        DepartmentPostController::class,
        'DepartmentHeadDepartmentposts',
    ])->name('departmenthead.departmentposts');
    Route::get('/departmenthead/adddepartmentpost', [
        DepartmentPostController::class,
        'DepartmentHeadAddDepartmentPost',
    ])->name('departmenthead.adddepartmentpost');
    Route::post('/departmenthead/post/departmentstore', [
        DepartmentPostController::class,
        'DepartmentHeadDepartmentPostStore',
    ])->name('departmenthead.post.departmentstore');
});

Route::middleware(['auth', 'role:stuff'])->group(function () {
    Route::get('/stuff/dashboard', [
        StuffController::class,
        'StuffDashboard',
    ])->name('stuff.dashboard');
    Route::get('/stuff/profile', [
        StuffController::class,
        'StuffProfile',
    ])->name('stuff.profile');
    Route::get('/stuff/chat', [StuffController::class, 'StuffChat'])->name(
        'stuff.chat'
    );
    Route::get('/stuff/logout', [StuffController::class, 'StuffLogout'])->name(
        'stuff.logout'
    );
    Route::post('/stuff/profile/store', [
        StuffController::class,
        'StuffProfileStore',
    ])->name('stuff.profile.store');
    Route::get('/stuff/change/password', [
        StuffController::class,
        'StuffChangePassword',
    ])->name('stuff.change.password');
    Route::post('/stuff/update/password', [
        StuffController::class,
        'StuffUpdatePassword',
    ])->name('stuff.update.password');
    Route::get('/stuff/posts', [PostController::class, 'StuffPosts'])->name(
        'stuff.posts'
    );
    Route::get('/stuff/collageposts', [
        CollegePostController::class,
        'StuffCollagePosts',
    ])->name('stuff.collageposts');
    Route::get('/stuff/departmentposts', [
        DepartmentPostController::class,
        'StuffDepartmentPosts',
    ])->name('stuff.departmentposts');

    Route::get('/stuff/adddepartmentpost', [
        DepartmentPostController::class,
        'DepartmentHeadAddDepartmentPost',
    ])->name('stuff.adddepartmentpost');
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
