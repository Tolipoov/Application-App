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
                   @if (auth()->user()->role->name == "manager")
                    <!-- This is an example component -->
                        <h1 style="font-size:32px; padding-bottom:24px">Received Applications</h1>
                        {{-- {{dd($applications)}} --}}
                        @foreach ( $applications as $application )         
                        <div class='flex items-center justify-center mb-5'>  <div class="rounded-xl border p-5 shadow-md w-10/12 bg-white">
                            <div class="flex w-full items-center justify-between border-b pb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
                                    <div class="text-lg font-bold text-slate-700">{{$application->user->name}}</div>
                                </div>
                                <div class="flex items-center space-x-8">
                                    <button class="rounded-2xl border bg-neutral-100  px-3 py-1 text-slate-700 font-semibold">Id : {{$application->id}}</button>
                                    <div class="text-xs text-neutral-500">{{$application->created_at->format('Y-m-d')}}</div>
                                </div>
                                </div>

                                <div class="mt-4 mb-6">
                                <div class="mb-3 font-bold text-slate-700">{{$application->subject}}</div>
                                <div class="text-sm text-neutral-600">{{$application->message}}</div>
                                </div>
                                <div>
                                    <div class="flex items-center justify-between text-slate-500">
                                        {{$application->user->email}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div>{{$applications->links()}}</div>

                   @elseif(auth()->user()->role->name == "client")

                   @if (@session()->has('eror'))
                       
                       <div class="w-auto text-grey-darker items-center p-4">
                        <span class="text-lg font-bold pb-4">
                            Note
                        </span>
                        <p class="leading-tight">
                            {{session()->get('eror')}}
                        </p>
                    </div>
                   @endif
                  
                   <div class='flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500 '>
                    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                        <div class='max-w-md mx-auto space-y-6'>
                            <form action="{{route('aplications.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h2 class="text-2xl font-bold text-slate-700">Submit your application</h2>
                                <p class="my-4 opacity-70 text-slate-600">Adipisicing elit. Quibusdam magnam sed ipsam deleniti debitis laboriosam praesentium dolorum doloremque beata.</p>
                                <hr class="my-6">
                                <label class="uppercase text-sm font-bold opacity-70 text-slate-600">Name</label>
                                <input type="text" required name="subject" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                                <label class=" uppercase text-sm font-bold opacity-70 text-slate-600">Message</label>
                                <textarea name="message" required id="message" cols="30" rows="10" class="text-slate-600 w-ful p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"></textarea>
                                <input type="file" name="file_url" class="w-ful p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                                <input type="submit" class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="Send">
                            </form>
            
                        </div>
                    </div>
                </div>     

                   @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
