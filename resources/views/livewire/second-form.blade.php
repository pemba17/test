<form wire:submit.prevent="save()">
    <div>
        <label for="married" class="block text-sm font-medium leading-6 text-gray-900">Married</label>
        <select wire:model.live="married" id="married" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <option>Choose ...</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        @error('married') <p class="text-red-500">{{$message}} @enderror
    </div>
    @if($married=='yes')
        @if($ageValidated)  
            <div class="flex items-center justify-between">
                <p>Date of Marriage</p>
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
            <div>
                <label for="country_marriage" class="block text-sm font-medium leading-6 text-gray-900">Country of Marriage</label>
                <div class="mt-2">
                    <input wire:model.live="country_marriage" type="text" id="country_marriage" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
                </div>
            </div>
        @else
            <p class="mt-2 text-red-500">You are not eligible to apply because your marriage occurred before your 18th birthday.</p>
        @endif
    @endif

    @if($married=='no')
        <div>
            <label for="widowed" class="block text-sm font-medium leading-6 text-gray-900">Widowed</label>
            <select wire:model.live="widowed" id="widowed" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option>Choose ...</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div>
            <label for="married_past" class="block text-sm font-medium leading-6 text-gray-900">Have you ever been married in the past?</label>
            <select wire:model.live="married_past" id="married_past" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option>Choose ...</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
    @endif    

    <button wire:click="previous()"type="button" class="mt-4 rounded-full bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Previous</button>
    @if($ageValidated || $married=='no')
        <button type="submit" class="mt-4 rounded-full bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    @endif   
</form>
