<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <ul>
                                <li>
                                    @foreach ($students as $student)
                                        <div class="pt-6 text-gray-900 dark:text-gray-100">First Name: {{ $student->first_name }}
                                        </div>
                                        <div class="text-gray-900 dark:text-gray-100">Last Name: {{ $student->last_name }}</div>
                                        <div class="text-gray-900 dark:text-gray-100">School: {{ $student->school->name }}</div>
                                        <div class="text-gray-900 dark:text-gray-100">Email: {{ $student->email }}</div>
                                        <div class="text-gray-900 dark:text-gray-100">Phone: {{ $student->phone }}</div>
                                        <div class="text-gray-900 dark:text-gray-100 p-1">
                                            <form method="POST" action="{{ route('student.destroy', $student->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button class="ml-4">
                                                    {{ __('Delete') }}
                                                </x-danger-button>
                                            </form>
                                        </div>
                                            <div class="text-gray-900 dark:text-gray-100 p-1">
                                                <form method="GET" action="{{ route('student.edit', $student->id) }}">
                                                    @csrf
                                                    <x-primary-button class="ml-4">
                                                        {{ __('Update') }}
                                                    </x-primary-button>
                                                </form>
                                            </div>
                                       
                                    @endforeach
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>



                <form method="POST" action="{{ route('student.store') }}">
                    @csrf

                    <!-- F Name -->
                    <div>
                        <x-input-label for="fname" :value="__('First Name')" />
                        <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fname"
                            :value="old('fname')" required autofocus />
                        <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                    </div>

                    <!-- L Name -->
                    <div>
                        <x-input-label for="lname" :value="__('Last Name')" />
                        <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lname"
                            :value="old('lname')" required autofocus />
                        <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                    </div>

                    <!-- School -->
                    <div>
                        <x-input-label for="school" :value="__('School')" />
                        {{-- <x-text-input id="school" class="block mt-1 w-full" type="text" name="school"
                            :value="old('school')" required autofocus /> --}}

                        <select name="school" id="school">
                            <option value=" " disabled selected>Select</option>
                            @foreach ($schools as $school)
                                <option value="{{$school->id}}">{{$school->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('school')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Phone -->
                    <div class="mt-4">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="phone" name="phone"
                            :value="old('phone')" required />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>


                    <div class="mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>



                </form>

            </div>
        </div>
    </div>
</x-app-layout>
