<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
    
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full max-h-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" wire:model="name">
                        @error('name') <span class="error">O nome é obrigatório</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="cpf" class="block text-gray-700 text-sm font-bold mb-2">CPF:</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cpf" wire:model="cpf">
                        @error('cpf') <span class="error">O número de CPF é obrigatório</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="cnh_number" class="block text-gray-700 text-sm font-bold mb-2">CNH:</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cnh_number" wire:model="cnh_number">
                        @error('cnh_number') <span class="error">O número de CNH é obrigatória</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="cnh_category" class="block text-gray-700 text-sm font-bold mb-2">Categoria da CNH:</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cnh_category" wire:model="cnh_category">
                        @error('cnh_category') <span class="error">A categoria da CNH é obrigatória</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="birthdate" class="block text-gray-700 text-sm font-bold mb-2">Data de nascimento:</label>
                        <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="birthdate" wire:model="birthdate">
                        @error('birthdate') <span class="error">A data de nascimento é obrigatória</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                        <input type="radio" value="1" wire:model="status" name="status" checked>
                        <label for="status">{{ __('Ativo') }}</label>
                        <input type="radio" value="0" wire:model="status" name="status">
                        <label for="status">{{ __('Inativo') }}</label>
                        @error('status') <span class="error">O status é obrigatório</span> @enderror
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Salvar</button>
                        </span>

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>