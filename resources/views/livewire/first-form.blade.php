<form wire:submit.prevent="next()">
    <div>
        <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
        <div class="mt-2">
            <input wire:model="first_name" type="text" id="first_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
        </div>
        @error('first_name') <p class="text-red-500">{{$message}} @enderror
    </div>
    <div>
        <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
        <div class="mt-2">
            <input wire:model="last_name" type="text" id="last_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
        </div>
        @error('last_name') <p class="text-red-500">{{$message}} @enderror
    </div>
    <div>
        <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
        <div class="mt-2">
            <input wire:model="address" type="text" id="address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
        </div>
        @error('address') <p class="text-red-500">{{$message}} @enderror
    </div>
    <div>
        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
        <div class="mt-2">
            <input wire:model="city" type="text" id="city" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
        </div>
        @error('city') <p class="text-red-500">{{$message}} @enderror
    </div>
    <div>
        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
        <div class="mt-2">
            <input wire:model="country" type="text" id="country" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
        </div>
        @error('country') <p class="text-red-500">{{$message}} @enderror
    </div>
    <div class="flex justify-between items-center mt-4">
        <p>Date of Birth</p>
        <div>
            <label for="year" class="block text-sm font-medium leading-6 text-gray-900">Year</label>
                <select wire:model="year" id="year" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <option value="">Choose ...</option>
                    @for($i = date('Y')-100; $i<=date('Y'); $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor    
                </select>
            @error('year') <p class="text-red-500">{{$message}} @enderror
        </div>
        <div>
            <label for="dob" class="block text-sm font-medium leading-6 text-gray-900">Month</label>
            <select wire:model.live="month" id="month" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="">Choose ...</option>
                @foreach($allMonths as $index => $month)
                    <option value="{{$index+1}}">{{$month['month']}}</option>
                @endforeach    
            </select>
            @error('month') <p class="text-red-500">{{$message}} @enderror
        </div>
        <div>
            <label for="dob" class="block text-sm font-medium leading-6 text-gray-900">Day</label>
            <select wire:model.live="day" id="day" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="">Choose ...</option>
                @for($i = 1; $i<=$maximumDays; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor    
            </select>
            @error('day') <p class="text-red-500">{{$message}} @enderror
        </div>
    </div>    
    <button type="submit" class="mt-4 rounded-full bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Next</button>
</form>
