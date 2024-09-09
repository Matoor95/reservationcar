<div class="mt-5 w-full">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        {{-- titre et button creer --}}
        <div class="flex justify-between items-center">
            {{-- <div class="w-1/3">
                <input type="text" class="block mt-1 rounded-m border-gray-300 w-full " placeholder="Rechercher"
                    wire:model.live="search">
            </div> --}}


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
        <!-- Modal -->
        <div
            class="@if (!$isModalOpen) hidden @endif fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full px-4">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Modifier le statut de la reservation</h3>
                    <div class="mt-2 px-7 py-3">
                        <select wire:model="selectedStatus"
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Sélectionner un statut</option>
                            <option value="Paye">Paye</option>
                            <option value="Annuler">Annuler
                            </option>

                        </select>
                    </div>
                    <div class="items-center px-4 py-3">
                        <button
                            class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300"
                            wire:click="updateStatus">Mettre à jour</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto  ">
            <div class="py-4 inline-block min-w-full ">
                <div class="overflow-x-auto">
                    <table class="w-full text-center table-auto ">
                        <thead class="border-b bg-gray-50">
                            <tr>
                                <th class="text-sm font-medium text-gray-600  py-2 w-1/4  cursor-pointer">
                                    Model du vehicule </th>
                                    <th class="text-sm font-medium text-gray-600  py-2 w-1/4  cursor-pointer">
                                      Date debut</th>
                                      <th class="text-sm font-medium text-gray-600  py-2 w-1/4  cursor-pointer">
                                        Date fin</th>

                                <th class="text-sm font-medium text-gray-600  py-2 w-1/4  cursor-pointer">
                                    Etat de la livraison </th>

                                <th class="text-sm font-medium text-gray-600  py-2 w-1/4 cursor-pointer">
                                    Nom et prenom du client</th>
                                <th class="text-sm font-medium text-gray-600  py-2 w-1/4 cursor-pointer">

                                    Telephone  </th>



                                <th class="text-sm font-medium text-gray-600  py-2 w-1/4 cursor-pointer">
                                    Date </th>


                                <th class="text-sm font-medium text-gray-600  py-2 w-1/4 cursor-pointer">
                                    Action
                                </th>
                            </tr>

                        </thead>
                        <tbody>
                            @forelse ($reservations as $item)
                                <tr class="border-b-2 border-gray-100">
                                    <td class="text-sm font-medium text-gray-600  px-6 py-6 break-words">
                                        {{ $item->car->libelle }} </td>
                                        <td class="text-sm font-medium text-gray-600  px-6 py-6 break-words">
                                             {{ $item->start_date}} </td>
                                            <td class="text-sm font-medium text-gray-600  px-6 py-6 break-words">
                                             {{$item->end_date }} </td>

                                    <td
                                        class="text-sm font-medium  py-2 w-1/4 break-words
                                        @if ($item->status == 'Paye') text-green-500
                                        @elseif ($item->status == 'Annuler') text-red-500 @endif">
                                        {{ $item->status }}
                                    </td>

                                    <td class="text-sm font-medium text-gray-600  px-6 py-6 break-words">
                                        {{ $item->user->name }} </td>
                                    <td class="text-sm font-medium text-gray-600  px-6 py-6 break-words">
                                        {{ $item->user->phone }} </td>

                                    <td class="text-sm font-medium text-gray-600  px-6 py-6 break-words">
                                        {{ $item->created_at->format('d/m/Y H:i') }}
                                    </td>

                                    <td class="flex items-center justify-center p-2 " style="vertical-align:middle">
                                        <button class=" text-white px-2 py-1 rounded"
                                            wire:click="openEditModal({{ $item->id }})">
                                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24'
                                                viewBox="0 0 24 24">
                                                <title>Editer</title>
                                                <g id="edit_line" fill='none' fill-rule='nonzero'>
                                                    <path
                                                        d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                                                    <path fill='#007AFFFF'
                                                        d='M13 3a1 1 0 0 1 .117 1.993L13 5H5v14h14v-8a1 1 0 0 1 1.993-.117L21 11v8a2 2 0 0 1-1.85 1.995L19 21H5a2 2 0 0 1-1.995-1.85L3 19V5a2 2 0 0 1 1.85-1.995L5 3h8Zm6.243.343a1 1 0 0 1 1.497 1.32l-.083.095-9.9 9.899a1 1 0 0 1-1.497-1.32l.083-.094 9.9-9.9Z' />
                                                </g>
                                            </svg> </button>

                                        {{-- <a class="p-1 text-teal-600 hover:bg-blue-300 hover:text-white rounded"
                                            href="{{ route('categorie.edit', $item->id) }}">
                                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24'
                                                viewBox="0 0 24 24">
                                                <title>Editer</title>
                                                <g id="edit_line" fill='none' fill-rule='nonzero'>
                                                    <path
                                                        d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                                                    <path fill='#007AFFFF'
                                                        d='M13 3a1 1 0 0 1 .117 1.993L13 5H5v14h14v-8a1 1 0 0 1 1.993-.117L21 11v8a2 2 0 0 1-1.85 1.995L19 21H5a2 2 0 0 1-1.995-1.85L3 19V5a2 2 0 0 1 1.85-1.995L5 3h8Zm6.243.343a1 1 0 0 1 1.497 1.32l-.083.095-9.9 9.899a1 1 0 0 1-1.497-1.32l.083-.094 9.9-9.9Z' />
                                                </g>
                                            </svg>
                                        </a>
                                        <button type="button" wire:click="delete({{ $item->id }})"
                                            wire:confirm="Voulez vous supprimer cette categorie?">
                                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24'
                                                viewBox="0 0 24 24">
                                                <title>Supprimer</title>
                                                <g id="delete_2_line" fill='none' fill-rule='nonzero'>
                                                    <path
                                                        d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                                                    <path fill='#FF6252FF'
                                                        d='M14.28 2a2 2 0 0 1 1.897 1.368L16.72 5H20a1 1 0 1 1 0 2l-.003.071-.867 12.143A3 3 0 0 1 16.138 22H7.862a3 3 0 0 1-2.992-2.786L4.003 7.07A1.01 1.01 0 0 1 4 7a1 1 0 0 1 0-2h3.28l.543-1.632A2 2 0 0 1 9.721 2h4.558Zm3.717 5H6.003l.862 12.071a1 1 0 0 0 .997.929h8.276a1 1 0 0 0 .997-.929L17.997 7ZM10 10a1 1 0 0 1 .993.883L11 11v5a1 1 0 0 1-1.993.117L9 16v-5a1 1 0 0 1 1-1Zm4 0a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Zm.28-6H9.72l-.333 1h5.226l-.334-1Z' />
                                                </g>
                                            </svg>
                                        </button> --}}



                                    </td>

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
                        {{ $reservations->links() }}

                    </div>
                </div>



            </div>

        </div>
    </div>
</div>
