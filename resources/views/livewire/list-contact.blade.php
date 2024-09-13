<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        {{-- titre et button creer --}}
        <div class="flex justify-between items-center">
            <div class="w-1/3">
                <input type="text" class="block mt-1 rounded-m border-gray-300 w-full " placeholder="Rechercher"
                    wire:model="search">
            </div>



        </div>
        @if (Session::get('error'))
            <div class="p-5">
                <div class="block p-2 bg-red-500 text-white rounded-sm shadow-sm mt-2">{{ Session::get('error') }}
                </div>

            </div>
        @endif

        @if (Session::get('success'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-2 py-3 mt-5 shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg></div>
                    <div>
                        <p class="font-bold">Notifcation</p>
                        <p class="text-sm">{{ Session::get('success') }}</p>
                    </div>
                </div>
            </div>
        @endif
        {{-- styliser le tableau  --}}

        <div class="overflow-x-auto  ">
            <div class=" inline-block min-w-full ">
                <div class="overflow-hidden">
                    <table class="min-w-full text-center ">
                        <thead class="border-b bg-gray-50">
                            <tr>
                                <th class="text-sm font-medium text-gray-600  px-6 py-6">
                                    id
                                </th>
                                <th class="text-sm font-medium text-gray-600  px-6 py-6">
                                  Nom et penom
                                </th>
                                <th class="text-sm font-medium text-gray-600  px-6 py-6">
                                   Email</th>
                                <th class="text-sm font-medium text-gray-600  px-6 py-6">
                                    telephone</th>
                                <th class="text-sm font-medium text-gray-600  px-6 py-6">
                                   sujet</th>

                                <th class="text-sm font-medium text-gray-600  px-6 py-6">
                                   Message</th>

                            </tr>

                        </thead>
                        <tbody>
                            @forelse ($contact as $item)
                                <tr class="border-b-2 border-gray-100">

                                    <td class="text-sm font-medium text-gray-600  px-6 py-6">
                                        {{ $item->id }} </td>

                                    <td class="text-sm font-medium text-gray-600  px-6 py-6">
                                        {{ $item->nom }} </td>
                                    <td class="text-sm font-medium text-gray-600  px-6 py-6">
                                        {{ $item->email }} </td>
                                    <td class="text-sm font-medium text-gray-600  px-6 py-6">
                                        {{ $item->telephone }} </td>
                                    <td class="text-sm font-medium text-gray-600  px-6 py-6">
                                        {{ $item->sujet }} </td>
                                    <td class="text-sm font-medium text-gray-600  px-6 py-6">
                                        {{ $item->message }} </td>



                                </tr>


                            @empty
                                <tr class="w-full">
                                    <td class="flex-1 w-full items-center justify-center  " colspan="4">
                                        <div>
                                            <p class="flex justify-center content-center p-4">
                                                <img src="{{ asset('storage/empty.svg') }}" alt=""
                                                    class="w-20 h-20  ">
                                            <div>Aucun element trouve</div>
                                            </p>

                                        </div>

                                    </td>
                                </tr>


                                </tr>
                            @endforelse



                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $contact->links() }}

                    </div>
                </div>



            </div>

        </div>
    </div>

</div>

