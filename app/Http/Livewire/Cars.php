<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Car;

class Cars extends Component
{
    public $cars, $fuels, $name, $plate, $fuel_type, $manufacturer, $year_of_manufacturer, $tank_capacity, $obs, $car_id;
    public $createMode = false;
    public $updateMode = false;

    public function render()
    {
        $this->cars = Car::all();
        $path = storage_path() . "/json/fuel-data.json";
        $this->fuels = json_decode(file_get_contents($path), true);

        return view('livewire.cars.show');
    }

    protected function rules() {
        return [
            'name' => 'required',
            'plate' => 'required',
            'manufacturer' => 'required',
            'year_of_manufacturer' => 'required|numeric',
            'tank_capacity' => 'required|numeric',
            'fuel_type' => 'required',
            'obs' => '',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O modelo é obrigatório',
            'plate.required' => 'A placa é obrigatória',
            'manufacturer.required' => 'A marca é obrigatória',
            'year_of_manufacturer.required' => 'O ano é obrigatório',
            'year_of_manufacturer.numeric' => 'Insira somente números',
            'tank_capacity.required' => 'A capacidade é obrigatória',
            'tank_capacity.numeric' => 'Insira somente números',
            'fuel_type.required' => 'O tipo de combustível é obrigatório',
        ];
    }

    public function store() {
        $validatedData = $this->validate();

        Car::create($validatedData);

        session()->flash('message', 'Registro cadastrado com sucesso!');

        $this->clearForm();
        $this->closeModal();
    }

    public function edit($id) {
        $this->updateMode = true;

        $car = Car::where('id', $id)->first();

        $this->car_id = $id;
        $this->name = $car->name;
        $this->plate = $car->plate;
        $this->fuel_type = $car->fuel_type;
        $this->manufacturer = $car->manufacturer;
        $this->year_of_manufacturer = $car->year_of_manufacturer;
        $this->tank_capacity = $car->tank_capacity;
        $this->obs = $car->obs;
    }

    public function update() {
        $validatedData = $this->validate();

        if ($this->car_id) {
            $car = Car::find($this->car_id);
            $car->update($validatedData);

            $this->updateMode = false;
            session()->flash('message', 'Registro atualizado com sucesso!');
            $this->clearForm();
        }
    }

    public function openModal() {
        $this->clearForm();
        $this->createMode = true;
    }

    public function closeModal() {
        $this->createMode = false;
        $this->updateMode = false;
    }

    public function clearForm() {
        $this->name = '';
        $this->plate = ''; 
        $this->fuel_type = ''; 
        $this->manufacturer = ''; 
        $this->year_of_manufacturer = ''; 
        $this->tank_capacity = ''; 
        $this->obs = ''; 
    }

    public function delete($id) {
        if($id){
            Car::where('id', $id)->delete();
            session()->flash('message', 'Registro deletado com sucesso!');
        }
    }
}
