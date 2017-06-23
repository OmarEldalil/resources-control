<?php

namespace App\Http\Controllers\Website;

use App\Models\Car;
use App\Http\Requests;
use App\Services\Uploader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Excel;

class CarController extends Controller
{

    protected $cars;
    protected $uploader;

    protected $carFillableData = [
        'car_number','car_model','car_year','office','car_license_date','examination_date','driver_name','driver_license_date','license_type','vendor'
    ];

    protected $imageInputs = ['car_front_license','car_back_license','driver_front_id','driver_back_id','driver_front_license','driver_back_license'];

    public function __construct(Car $car , Uploader $uploader)
    {

        parent::__construct();

        $this->car = $car;
        $this->uploader = $uploader;


        $imageInputs = $this->imageInputs;
        view()->composer(['website.cars.single_car' , 'website.cars.car_form'] ,
            function ($view) use ($imageInputs) {
                $view->with('carImageInputs' , $imageInputs);
        });

    }

    public function allCars () {

        /*Excel::load(storage_path('app/public/cars.xlsx') , function ($reader) {

            $cars = $reader->all()->toArray();
            $allCars = [];
            $oneCar = [];

            foreach ($cars as $index => $carArray) {
                foreach ($carArray as $key => $value) {
                    if ($key == 'car_license_date' || $key == 'driver_license_date') $value = Carbon::parse($value);
                    $oneCar[$key] = $value;
                }
                $allCars[$index] = $oneCar;
                $oneCar = [];
            }

            //dd($allCars);

            foreach ($allCars as $car) {
                Car::create($car);
            }

        });*/

        $cars = $this->car->all();

        return view('website.cars.all_cars' , compact('cars'));

    }

    public function singleCar ($car_id) {

        $car = $this->car->findOrFail($car_id);

        return view('website.cars.single_car' , compact('car'));

    }

    public function createCar () {

        return view('website.cars.create_car');

    }

    public function saveCar (Request $request) {

        $car = new Car();

        $this->handleCarData($request , $car);

        return redirect(route('all_cars'))->with('success' , 'تم اضافة السيارة بنجاح');

    }

    public function editCar ($car_id) {


        $car = $this->car->findOrFail($car_id);

        return view('website.cars.edit_car' , compact('car'));

    }

    public function updateCar (Request $request , $car_id) {

        $car = $this->car->findOrFail($car_id);

        $this->handleCarData($request , $car);

        return redirect(route('all_cars'))->with('success' , 'تم تعديل السيارة بنجاح');

    }

    public function deleteCar ($car_id) {

        $this->car->findOrFail($car_id)->delete();

        return redirect(route('all_cars'))->with('success' , 'تم حذف السيارة');

    }

    private function handleCarData (Request $request , $car) {

        foreach ($this->carFillableData as $key) {
            $car->$key = ($request->input($key)) ? $request->input($key) : null;
        }

        foreach ($this->imageInputs as $imageInput) {
            if (!$car->$imageInput) {
                $fileName = $this->uploader->upload($request->file($imageInput) , 'imgs/cars');
                $car->$imageInput = $fileName;
            }
        }

        $car->save();

    }

    public function deleteCarImage ($car_id , $car_image_input)
    {

        $car = $this->car->findOrFail($car_id);

        unlink(public_path('imgs/cars/' . $car->$car_image_input));

        $car->$car_image_input = null;

        $car->save();

        return redirect()->back();

    }

}
