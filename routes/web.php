<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Team_MemberController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Website\CoursesController;
use App\Http\Controllers\Website\AdmissionController;
use App\Http\Controllers\ManageController;




Route::get('/', function () {
    return view('website.home.index');
});

Route::get('/home',[IndexController::class,'index'])->name('home');
Route::get('/about',[IndexController::class,'about'])->name('about');
Route::get('/contact',[IndexController::class,'contact'])->name('contact');
Route::get('/news',[IndexController::class,'news'])->name('news');
Route::get('/single-course',[CoursesController::class,'single_course'])->name('single_course');
Route::get('/courses',[CoursesController::class,'courses'])->name('courses');
Route::get('/admission',[AdmissionController::class,'admission'])->name('admission');



Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');

Route::get('/dashboard/banner',[BannerController::class,'index'])->name('banner');
Route::get('/dashboard/banner/add',[BannerController::class,'add'])->name('banner.add');
Route::get('/dashboard/banner/view/{slug}',[BannerController::class,'view'])->name('banner.view');
Route::get('/dashboard/banner/edit/{slug}',[BannerController::class,'edit'])->name('banner.edit');
Route::post('/dashboard/banner/submit',[BannerController::class,'insert'])->name('banner.submit');
Route::post('/dashboard/banner/update',[BannerController::class,'update'])->name('banner.update');
Route::post('/dashboard/banner/softdelete',[BannerController::class,'softdelete'])->name('banner.softdelete');
Route::post('/dashboard/banner/restore',[BannerController::class,'restore'])->name('banner.restore');
Route::post('/dashboard/banner/delete',[BannerController::class,'delete'])->name('banner.delete');

Route::get('/dashboard/service',[ServiceController::class,'index'])->name('service');
Route::get('/dashboard/service/add',[ServiceController::class,'add'])->name('service.add');
Route::get('/dashboard/service/view/{slug}',[ServiceController::class,'view'])->name('service.view');
Route::get('/dashboard/service/edit/{slug}',[ServiceController::class,'edit'])->name('service.edit');
Route::post('/dashboard/service/submit',[ServiceController::class,'insert'])->name('service.submit');
Route::post('/dashboard/service/update',[ServiceController::class,'update'])->name('service.update');
Route::post('/dashboard/service/softdelete',[ServiceController::class,'softdelete'])->name('service.softdelete');
Route::post('/dashboard/service/restore',[ServiceController::class,'restore'])->name('service.restore');
Route::post('/dashboard/service/delete',[ServiceController::class,'delete'])->name('service.delete');

Route::get('/dashboard/team',[Team_MemberController::class,'index'])->name('team');
Route::get('/dashboard/team/add',[Team_MemberController::class,'add'])->name('team.add');
Route::get('/dashboard/team/view/{slug}',[Team_MemberController::class,'view'])->name('team.view');
Route::get('/dashboard/team/edit/{slug}',[Team_MemberController::class,'edit'])->name('team.edit');
Route::post('/dashboard/team/submit',[Team_MemberController::class,'insert'])->name('team.submit');
Route::post('/dashboard/team/update',[Team_MemberController::class,'update'])->name('team.update');
Route::post('/dashboard/team/softdelete',[Team_MemberController::class,'softdelete'])->name('team.softdelete');
Route::post('/dashboard/team/restore',[Team_MemberController::class,'restore'])->name('team.restore');
Route::post('/dashboard/team/delete',[Team_MemberController::class,'delete'])->name('team.restore');

Route::get('/dashboard/partner',[PartnerController::class,'index'])->name('partner');
Route::get('/dashboard/partner/add',[PartnerController::class,'add'])->name('partner.add');
Route::get('/dashboard/partner/view/{slug}',[PartnerController::class,'view'])->name('partner.view');
Route::get('/dashboard/partner/edit/{slug}',[PartnerController::class,'edit'])->name('partner.edit');
Route::post('/dashboard/partner/submit',[PartnerController::class,'insert'])->name('partner.submit');
Route::post('/dashboard/partner/update',[PartnerController::class,'update'])->name('partner.update');
Route::post('/dashboard/partner/softdelete',[PartnerController::class,'softdelete'])->name('partner.softdelete');
Route::post('/dashboard/partner/restore',[PartnerController::class,'restore'])->name('partner.restore');
Route::post('/dashboard/partner/delete',[PartnerController::class,'delete'])->name('partner.restore');

Route::get('/dashboard/client',[ClientController::class,'index'])->name('client');
Route::get('/dashboard/client/add',[clientController::class,'add'])->name('client.add');
Route::get('/dashboard/client/view/{slug}',[clientController::class,'view'])->name('client.view');
Route::get('/dashboard/client/edit/{slug}',[clientController::class,'edit'])->name('client.edit');
Route::post('/dashboard/client/submit',[clientController::class,'insert'])->name('client.submit');
Route::post('/dashboard/client/update',[clientController::class,'update'])->name('client.update');
Route::post('/dashboard/client/softdelete',[clientController::class,'softdelete'])->name('client.softdelete');
Route::post('/dashboard/client/restore',[clientController::class,'restore'])->name('client.restore');
Route::post('/dashboard/client/delete',[clientController::class,'delete'])->name('client.restore');

Route::get('/dashboard/testimonial',[TestimonialController::class,'index'])->name('testimonial');
Route::get('/dashboard/testimonial/add',[TestimonialController::class,'add'])->name('testimonial.add');
Route::get('/dashboard/testimonial/view/{slug}',[TestimonialController::class,'view'])->name('testimonial.view');
Route::get('/dashboard/testimonial/edit/{slug}',[TestimonialController::class,'edit'])->name('testimonial.edit');
Route::post('/dashboard/testimonial/submit',[TestimonialController::class,'insert'])->name('testimonial.submit');
Route::post('/dashboard/testimonial/update',[TestimonialController::class,'update'])->name('testimonial.update');
Route::post('/dashboard/testimonial/softdelete',[TestimonialController::class,'softdelete'])->name('testimonial.softdelete');
Route::post('/dashboard/testimonial/restore',[TestimonialController::class,'restore'])->name('testimonial.restore');
Route::post('/dashboard/testimonial/delete',[TestimonialController::class,'delete'])->name('testimonial.restore');

Route::get('/dashboard/contact/message',[ContactMessageController::class,'index'])->name('contact.message');
Route::get('/dashboard/contact/message/add',[ContactMessageController::class,'add'])->name('contact.message.add');
Route::get('/dashboard/contact/message/view/{slug}',[ContactMessageController::class,'view'])->name('contact.message.view');
Route::get('/dashboard/contact/message/edit/{slug}',[ContactMessageController::class,'edit'])->name('contact.message.edit');
Route::post('/dashboard/contact/message/submit',[ContactMessageController::class,'insert'])->name('contact.message.submit');
Route::post('/dashboard/contact/message/update',[ContactMessageController::class,'update'])->name('contact.message.update');
Route::post('/dashboard/contact/message/softdelete',[ContactMessageController::class,'softdelete'])->name('contact.message.softdelete');
Route::post('/dashboard/contact/message/restore',[ContactMessageController::class,'restore'])->name('contact.message.restore');
Route::post('/dashboard/contact/message/delete',[ContactMessageController::class,'delete'])->name('contact.message.restore');

Route::get('/dashboard/project',[ProjectController::class,'index'])->name('project');
Route::get('/dashboard/project/add',[ProjectController::class,'add'])->name('project.add');
Route::get('/dashboard/project/view/{slug}',[ProjectController::class,'view'])->name('project.view');
Route::get('/dashboard/project/edit/{slug}',[ProjectController::class,'edit'])->name('project.edit');
Route::post('/dashboard/project/submit',[ProjectController::class,'insert'])->name('project.submit');
Route::post('/dashboard/project/update',[ProjectController::class,'update'])->name('project.update');
Route::post('/dashboard/project/softdelete',[ProjectController::class,'softdelete'])->name('project.softdelete');
Route::post('/dashboard/project/restore',[ProjectController::class,'restore'])->name('project.restore');
Route::post('/dashboard/project/delete',[ProjectController::class,'delete'])->name('project.restore');

Route::get('dashboard/project/category', [ProjectCategoryController::class, 'index'])->name('project.category');
Route::get('dashboard/project/category/add', [ProjectCategoryController::class, 'add'])->name('project.category.add');
Route::get('dashboard/project/category/edit/{slug}', [ProjectCategoryController::class, 'edit']);
Route::get('dashboard/project/category/view/{slug}', [ProjectCategoryController::class, 'view']);
Route::post('dashboard/project/category/submit', [ProjectCategoryController::class, 'insert']);
Route::post('dashboard/project/category/update', [ProjectCategoryController::class, 'update']);
Route::post('dashboard/project/category/softdelete', [ProjectCategoryController::class, 'softdelete']);
Route::post('dashboard/project/category/restore', [ProjectCategoryController::class, 'restore']);
Route::post('dashboard/project/category/delete', [ProjectCategoryController::class, 'delete']);

Route::get('/dashboard/country',[CountryController::class,'index'])->name('country');
Route::get('/dashboard/country/add',[CountryController::class,'add'])->name('country.add');
Route::get('/dashboard/country/view/{slug}',[CountryController::class,'view'])->name('country.view');
Route::get('/dashboard/country/edit/{slug}',[CountryController::class,'edit'])->name('country.edit');
Route::post('/dashboard/country/submit',[CountryController::class,'insert'])->name('country.submit');
Route::post('/dashboard/country/update',[CountryController::class,'update'])->name('country.update');
Route::post('/dashboard/country/softdelete',[CountryController::class,'softdelete'])->name('country.softdelete');
Route::post('/dashboard/country/restore',[CountryController::class,'restore'])->name('country.restore');
Route::post('/dashboard/country/delete',[CountryController::class,'delete'])->name('country.restore');

Route::get('/dashboard/university',[UniversityController::class,'index'])->name('university');
Route::get('/dashboard/university/add',[UniversityController::class,'add'])->name('university.add');
Route::get('/dashboard/university/view/{slug}',[UniversityController::class,'view'])->name('university.view');
Route::get('/dashboard/university/edit/{slug}',[UniversityController::class,'edit'])->name('university.edit');
Route::post('/dashboard/university/submit',[UniversityController::class,'insert'])->name('university.submit');
Route::post('/dashboard/university/update',[UniversityController::class,'update'])->name('university.update');
Route::post('/dashboard/university/softdelete',[UniversityController::class,'softdelete'])->name('university.softdelete');
Route::post('/dashboard/university/restore',[UniversityController::class,'restore'])->name('university.restore');
Route::post('/dashboard/university/delete',[UniversityController::class,'delete'])->name('university.restore');

Route::get('/dashboard/manage/basic',[ManageController::class,'basic'])->name('basic');
Route::post('/dashboard/manage/basic/update',[ManageController::class,'basic_update'])->name('basic.update');
Route::get('/dashboard/manage/social',[ManageController::class,'social'])->name('social');
Route::post('/dashboard/manage/social/update',[ManageController::class,'social_update'])->name('social.update');

require __DIR__.'/auth.php';
