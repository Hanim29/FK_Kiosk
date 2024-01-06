<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2" style="background-color: #dc3545;">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <form method="post" action="{{route('update_user' , ['id' => $user->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="px-4 py-5 ">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name', $user->name) }}" />
                        </div>

                        <div class="px-4 py-5 >
                            <label for=" email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('email', $user->email) }}" />
                        </div>

                        <div class="px-4 py-5 ">
                            <label for="matrix_id" class="block font-medium text-sm text-gray-700">Matrix ID</label>
                            <input type="matrix_id" name="matrix_id" id="matrix_id" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('matrix_id', $user->matrix_id) }}" />
                        </div>

                        <div class="px-4 py-5 ">
                            <label for="phone_num" class="block font-medium text-sm text-gray-700">Phone Number</label>
                            <input type="phone_num" name="phone_num" id="phone_num" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('phone_num', $user->phone_num) }}" />
                        </div>

                        <div class="px-4 py-5 ">
                            <label for="ic_number" class="block font-medium text-sm text-gray-700">IC Number</label>
                            <input type="ic_number" name="ic_number" id="ic_number" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('ic_number', $user->ic_number) }}" />
                        </div>

                        <div class="px-4 py-5 ">
                            <label for="account_type" class="block font-medium text-sm text-gray-700">Account Type</label>
                            <input type="account_type" name="account_type" id="account_type" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('account_type', $user->account_type) }}" />
                        </div>

                        <!-- <div class="px-4 py-5">
                            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                            <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('password', $user->password) }}">
                        </div> -->

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>