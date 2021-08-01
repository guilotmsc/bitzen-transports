<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Driver;

class Drivers extends Component
{
    public $drivers, $name, $cpf, $cnh_number, $cnh_category, $birthdate, $status, $driver_id;
    public $createMode = false;
    public $updateMode = false;

    public function render()
    {
        $this->drivers = Driver::all(); 

        return view('livewire.drivers.show');
    }

    protected function rules() {
        return [
            'name' => 'required',
            'cpf' => 'required',
            'cnh_number' => 'required',
            'cnh_category' => 'required',
            'birthdate' => 'required',
            'status' => 'required',
        ];
    }

    public function store() {
        $validatedData = $this->validate();

        Driver::create($validatedData);

        session()->flash('message', 'Registro cadastrado com sucesso!');

        $this->clearForm();
        $this->closeModal();
    }

    public function edit($id) {
        $this->updateMode = true;

        $driver = Driver::where('id', $id)->first();
        
        $this->driver_id = $id;
        $this->name = $driver->name;
        $this->cpf = $driver->cpf;
        $this->cnh_number = $driver->cnh_number;
        $this->cnh_category = $driver->cnh_category;
        $this->birthdate = $driver->birthdate;
        $this->status = $driver->status;
    }

    public function update() {
        $validatedData = $this->validate();

        if ($this->driver_id) {
            $driver = Driver::find($this->driver_id);
            $driver->update($validatedData);

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
        $this->cpf = ''; 
        $this->cnh_number = ''; 
        $this->cnh_category = ''; 
        $this->birthdate = '';
        $this->status = 1;
    }

    public function delete($id) {
        if($id){
            Driver::where('id', $id)->delete();
            session()->flash('message', 'Registro deletado com sucesso!');
        }
    }
}
