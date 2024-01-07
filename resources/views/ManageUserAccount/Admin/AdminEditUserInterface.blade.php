<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form method="post" action="{{ route('update_user', ['id' => $user->id]) }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="form-input mt-1 block w-full" value="{{ old('name', $user->name) }}" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="form-input mt-1 block w-full" value="{{ old('email', $user->email) }}" />
                </div>

                <!-- Matrix ID -->
                <div class="mb-4">
                    <label for="matrix_id" class="block text-sm font-medium text-gray-700">Matrix ID</label>
                    <input type="text" name="matrix_id" id="matrix_id" class="form-input mt-1 block w-full" value="{{ old('matrix_id', $user->matrix_id) }}" />
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phone_num" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone_num" id="phone_num" class="form-input mt-1 block w-full" value="{{ old('phone_num', $user->phone_num) }}" />
                </div>

                <!-- IC Number -->
                <div class="mb-4">
                    <label for="ic_number" class="block text-sm font-medium text-gray-700">IC Number</label>
                    <input type="text" name="ic_number" id="ic_number" class="form-input mt-1 block w-full" value="{{ old('ic_number', $user->ic_number) }}" />
                </div>

                <!-- Account Type -->
                <div class="mb-4">
                    <label for="account_type" class="block text-sm font-medium text-gray-700">Account Type</label>
                    <input type="text" name="account_type" id="account_type" class="form-input mt-1 block w-full" value="{{ old('account_type', $user->account_type) }}" />
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-900 focus:shadow-outline-blue disabled:opacity-25 transition ease-in-out duration-150">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
