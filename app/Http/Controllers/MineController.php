<?php

namespace App\Http\Controllers;

use App\Models\DashPackage;
use App\Models\DashCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Livewire\LoadContentCategory;

class MineController extends Controller
{
    public function index(){
        return view('dulbalitourandtravel' , [
            'title'    => mine()['longTitle'] . ' - ' . mine()['slogan'],
            'desc'    => 'Discover Bali with the best travel and tour services. Exclusive packages and comfortable accommodation - ' . mine()['longTitle'],
            'category' => DashCategory::orderBy('id' , 'desc')->get(),
            'package'  => DashPackage::orderBy('id' , 'desc')->take(6)->get(),
        ]);
    }
    public function tour(){
        return view('tour' , [
            'title'    => 'Best Bali Tour Packages - ' . mine()['longTitle'],
            'desc'    => 'Best Bali Tour Packages Only with ' . mine()['longTitle'] . ' Offering a variety of tours and activities that can be customized to your needs. Book now and enjoy your holiday.',
            'category' => DashCategory::orderBy('id' , 'desc')->get(),
            // 'package'  => DashPackage::orderBy('id' , 'desc')->paginate(6),
        ]);
    }
    public function single_category(DashCategory $single_category){
        return view('single_category' , [
            'title'    =>  'Category ' . $single_category->title . ' - ' . mine()['longTitle'],
            'desc'    => 'Category ' . $single_category->title . ' - Discover the stunning beauty of Bali with tour packages from ' . mine()['longTitle'],
            'category' => $single_category,
            'package'  => $single_category->package->sortByDesc('id'),
        ]);
    }
    public function single_package(DashPackage $single_package){
        return view('single_package' , [
            'title'    => 'Package ' . $single_package->title . ' - ' . mine()['longTitle'],
            'desc'    =>  $single_package->title . ' tour package from ' . mine()['longTitle'] . ' offers an unforgettable adventure experience.',
            'category' => DashCategory::inRandomOrder()->get(),
            'packages'  => DashPackage::all(),
            'package'  => $single_package,
        ]);
    }
}
