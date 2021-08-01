<div class="py-12">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Motoristas') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if(session()->has('message'))
                <div class="rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{ session('message')}}</h4>
                        </div>
                    </div>
                </div>
            @endif

            <button wire:click="openModal()" class="font-bold py-2 px-4 my-3">NOVO</button>

            @if($createMode)
                @include('livewire.drivers.create')
            @endif

            @if($updateMode)
                @include('livewire.drivers.update')
            @endif
            
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">Cód.</th>
                        <th class="px-4 py-2">Nome</th>
                        <th class="px-4 py-2">CPF</th>
                        <th class="px-4 py-2">CNH</th>
                        <th class="px-4 py-2">Categoria</th>
                        <th class="px-4 py-2">Nascimento</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($drivers as $driver)
                    <tr>
                        <td class="border px-4 py-2">{{$driver->id}}</td>
                        <td class="border px-4 py-2">{{$driver->name}}</td>
                        <td class="border px-4 py-2">{{$driver->cpf}}</td>
                        <td class="border px-4 py-2">{{$driver->cnh_number}}</td>
                        <td class="border px-4 py-2">{{$driver->cnh_category}}</td>
                        <td class="border px-4 py-2">{{ date('d/m/Y', strtotime($driver->birthdate))}}</td>
                        <td class="border px-4 py-2">
                            @if($driver->status === 1)
                                Ativo
                            @else
                                Inativo
                            @endif
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <button wire:click="edit({{$driver->id}})" class="font-bold py-2 px-4">Editar</button>
                            <button wire:click="delete({{$driver->id}})" class="font-bold py-2 px-4">Remover</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>