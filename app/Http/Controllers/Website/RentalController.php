<?php

namespace App\Http\Controllers\Website;

use App\Models\Rental;
use App\Models\RentalImage;
use App\Services\Uploader;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Excel;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{

    protected $rental;
    protected $rentalImage;
    protected $uploader;

    protected $rentalFillableData = [
        'city' , 'address' , 'description' , 'owner' , 'renter' , 'contract_start_date' , 'contract_end_date' , 'rental_cost' , 'payment_method' , 'insurance' , 'annual_raise' , 'notes'
    ];

    public function __construct(Rental $rental , Uploader $uploader , RentalImage $rentalImage)
    {

        parent::__construct();

        $this->rental = $rental;
        $this->uploader = $uploader;
        $this->rentalImage = $rentalImage;

        $user = Auth::user();
        if ($user->authority != "admin" && $user->authority != "reader") {
            if(! preg_match("/rentals/",$user->abilities )){
            abort(404);
            }
        }
    }

    public function allRentals () {


        /*Excel::load(storage_path('app/public/rentals (1).xlsx') , function ($reader) {

            $rentals = $reader->all()->toArray();

            $allRentals = [];
            $oneRental = [];

            foreach ($rentals as $index => $rentalArray) {
                foreach ($rentalArray as $key => $value) {
                    if ($key == 'contract_start_date' || $key == 'contract_end_date' && !empty($value)) $value = Carbon::parse($value);
                    $oneRental[$key] = $value;
                }
                $allRentals[$index] = $oneRental;
                $oneRental = [];
            }

            //dd($allRentals);

            foreach ($allRentals as $rental) {
                Rental::create($rental);
            }

        });*/


        $rentals = $this->rental->all();

        return view('website.rentals.all_rentals' , compact('rentals'));

    }

    public function singleRental ($rental_id) {

        $rental = $this->rental->with('images')->findOrFail($rental_id);

        return view('website.rentals.single_rental' , compact('rental'));

    }

    public function createRental () {

        return view('website.rentals.create_rental');

    }

    public function saveRental (Request $request) {

        $rental = new Rental();

        $this->handleRentalData($request , $rental);

        return redirect(route('all_rentals'))->with('success' , 'تم اضافة الايجار بنجاح');


    }

    public function editRental ($rental_id) {

        $rental = $this->rental->findOrFail($rental_id);

        return view('website.rentals.edit_rental' , compact('rental'));

    }

    public function updateRental (Request $request , $rental_id) {

        $rental = $this->rental->findOrFail($rental_id);

        $this->handleRentalData($request , $rental);

        return redirect(route('all_rentals'))->with('success' , 'تم تعديل الايجار بنجاح');

    }

    public function deleteRental ($rental_id) {

        $this->rental->findOrFail($rental_id)->delete();

        return redirect(route('all_rentals'))->with('success' , 'تم حذف الأيجار بنجاح');

    }

    private function handleRentalData (Request $request , $rental) {

        foreach ($this->rentalFillableData as $key) {
            $rental->$key = ($request->input($key)) ? $request->input($key) : null;
        }

        $rental->save();

        $this->uploadRentalImages($request , $rental);

    }

    private function uploadRentalImages (Request $request , $rental)
    {

        $names = $this->uploader->uploadMultipleFile($request->file('rental_images') , 'imgs/rentals');

        if ($names) {

            foreach ($names as $name) {

                $rentalImage = new RentalImage();

                $rentalImage->rental_id = $rental->id;
                $rentalImage->image_name = $name;

                $rentalImage->save();

            }

        }

    }

    public function deleteRentalImage ($image_id) {

        $rentalImage = $this->rentalImage->findOrFail($image_id);

        unlink(public_path('imgs/rentals/' . $rentalImage->image_name));

        $rentalImage->delete();

        return redirect()->back();

    }

}
