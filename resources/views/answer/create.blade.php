<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <div class='flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500 '>
                    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                        <div class='max-w-md mx-auto space-y-6'>
                            <form action="{{route('answer.store', ['application' => $application->id ])}}" method="POST" >
                                @csrf
                                <h2 class="text-2xl font-bold text-slate-700">Application id = {{$application->id}}</h2>
                                <p class="my-4 opacity-70 text-slate-600">Adipisicing elit. Quibusdam magnam sed ipsam deleniti debitis laboriosam praesentium dolorum doloremque beata.</p>
                                <hr class="my-6">
                                 <label class=" uppercase text-sm font-bold opacity-70 text-slate-600">Answer</label>
                                <textarea name="body" required id="body" cols="30" rows="8" class="text-slate-600 w-ful p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"></textarea>
                                 <input type="submit" class="py-2.5 px-10 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="Send">
                                 <a href="{{route('dashboard')}}" class="py-3 px-6 my-2 bg-red-500 text-white font-medium rounded hover:bg-red-600 cursor-pointer ease-in-out duration-300" value="Send">Cancel</a>
                            </form>
            
                        </div>
                    </div>
                </div>     
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
