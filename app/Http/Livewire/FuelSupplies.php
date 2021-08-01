<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;

use Livewire\Component;
use App\Models\FuelSupply;
use App\Models\Driver;
use App\Models\Car;
use PDF;

class FuelSupplies extends Component
{
    public $supplies, $fuels, $drivers, $cars, $date, $fuel_type, $quantity_supplied, $total_supplied, $driver_id, $car_id;
    public $createMode;

    public function render()
    {
        $this->supplies = DB::table('fuel_supplies')
            ->join('drivers', 'drivers.id', '=', 'fuel_supplies.driver_id')
            ->join('cars', 'cars.id', '=', 'fuel_supplies.car_id')
            ->select('fuel_supplies.*', 'drivers.name as driver_name', 'cars.name as car_name')
            ->get();

        $this->drivers = Driver::orderBy('name', 'ASC')->get();
        $this->cars = Car::orderBy('manufacturer', 'ASC')->get();

        $path = storage_path() . "/json/fuel-data.json";
        $this->fuels = json_decode(file_get_contents($path), true);

        return view('livewire.fuel-supplies.show');
    }

    public function createPDF() {
        $data = DB::table('fuel_supplies')
            ->join('drivers', 'drivers.id', '=', 'fuel_supplies.driver_id')
            ->join('cars', 'cars.id', '=', 'fuel_supplies.car_id')
            ->select('fuel_supplies.*', 'drivers.name as driver_name', 'cars.name as car_name')
            ->get();
  
        view()->share('supply', $data);
        $pdf = PDF::loadView('livewire.fuel-supplies.pdf_view', $data);
  
        return $pdf->download('pdf_file.pdf');
    }

    protected function rules() {
        return [
            'date' => 'required', 
            'fuel_type' => 'required', 
            'quantity_supplied' => 'required', 
            'driver_id' => 'required', 
            'car_id' => 'required',
            'total_supplied' => '',
        ];
    }

    public function messages() {
        return [
            'date.required' => 'A data é obrigatória',
            'fuel_type.required' => 'O tipo de combustível é obrigatório',
            'quantity_supplied.required' => 'A quantidade abastecida é obrigatória',
            'driver_id.required' => 'O motorista é obrigatório',
            'car_id.required' => 'O modelo do carro é obrigatório',
        ];
    }

    public function store() {
        $validatedData = $this->validate();
        
        if($this->fuelValidation()) {
            $this->calculateSupply();
        
            $validatedData = $this->validate();
            
            FuelSupply::create($validatedData);

            session()->flash('message', 'Abastecimento cadastrado com sucesso!');

            $this->clearForm();
            $this->closeModal();
        }
    }

    protected function calculateSupply() {
        $fuel = collect($this->fuels)->firstWhere('name', $this->fuel_type);

        $this->total_supplied = $fuel['price'] * $this->quantity_supplied;
    }

    protected function fuelValidation() { 
        $car = DB::table('cars')->where('id', $this->car_id)->first();

        if (floatval($this->quantity_supplied) > $car->tank_capacity) {
            session()->flash('invalid-data', 'A quantidade abastecida não pode exceder a capacidade do tanque!');
            return false;
        }

        if ($car->fuel_type !== $this->fuel_type) {
            session()->flash('invalid-data', 'Combustível não compatível com o veículo!');
            return false;
        }

        return true;
    }

    public function openModal() {
        $this->createMode = true;

        $path = storage_path() . "/json/fuel-data.json";
        $fuels = json_decode(file_get_contents($path), true);
    }

    public function closeModal() {
        $this->createMode = false;
    }

    public function clearForm() {
        $this->date = '';
        $this->fuel_type = ''; 
        $this->quantity_supplied = ''; 
        $this->driver_id = ''; 
        $this->car_id = ''; 
    }
}
