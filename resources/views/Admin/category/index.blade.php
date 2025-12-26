@extends('layouts.admin.app')
@section('title', 'Category | EduQuiz Admin')
@section('breadcrumb','Category')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/category.js') }}"></script>
    @endpush
    <!-- BEGIN: Content -->
    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">
            Data Category
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview"
                    class="button text-white bg-theme-1 shadow-md mr-2">Add New Category</a>
                <div class="dropdown relative">
                    <button class="dropdown-toggle button px-2 box text-gray-700">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i>
                        </span>
                    </button>
                    <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-gray-700">
                        <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap">NO</th>
                            <th class="whitespace-no-wrap">CATEGORY NAME</th>
                            <th class="whitespace-no-wrap">COLOR</th>
                            <th class="whitespace-no-wrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                            <tr class="intro-x">
                                <td class="w-40">
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <p class="font-medium whitespace-no-wrap">{{ $item->name }}</p>
                                </td>
                                <td class="text-center">
                                    <div class="w-5 h-5 rounded-full" style="background-color: {{ $item->color }};"></div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal"
                                            data-target="#modal-edit"
                                            onclick="prepareEdit('{{ route('category.update', $item->id) }}', '{{ $item->name }}', '{{ $item->color }}')">
                                            <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                        </a>
                                        <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                            data-target="#modal-delete"
                                            onclick="prepareDelete('{{ route('category.destroy', $item->id) }}')">
                                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
                <ul class="pagination">
                    <li>
                        <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i>
                        </a>
                    </li>
                    <li>
                        <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i>
                        </a>
                    </li>
                    <li> <a class="pagination__link" href="">...</a> </li>
                    <li> <a class="pagination__link" href="">1</a> </li>
                    <li> <a class="pagination__link pagination__link--active" href="">2</a> </li>
                    <li> <a class="pagination__link" href="">3</a> </li>
                    <li> <a class="pagination__link" href="">...</a> </li>
                    <li>
                        <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i>
                        </a>
                    </li>
                    <li>
                        <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i>
                        </a>
                    </li>
                </ul>
                <select class="w-20 input box mt-3 sm:mt-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select>
            </div>
            <!-- END: Pagination -->
        </div>
        <!-- BEGIN: Delete Confirmation Modal -->
        <div class="modal" id="delete-confirmation-modal">
            <div class="modal__content">
                <div class="p-5 text-center">
                    <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be
                        undone.</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-dismiss="modal"
                        class="button w-24 border text-gray-700 mr-1">Cancel</button>
                    <button type="button" class="button w-24 bg-theme-6 text-white">Delete</button>
                </div>
            </div>
        </div>
        <!-- END: Delete Confirmation Modal -->
    </div>
    <!-- END: Content -->


    {{-- Begin:modal --}}
    {{-- add --}}
    <div class="modal" id="header-footer-modal-preview">
        <div class="modal__content">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Add New Category</h2>
            </div>

            <form id="categoryForm" action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="p-5 space-y-6">
                    <!-- Category Name -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Category Name</label>
                        <input type="text" name="name"
                            class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"
                            placeholder="Matematika" required>
                    </div>

                    <!-- Color Picker - Versi Sederhana -->
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <label class="block text-sm font-medium text-slate-700">Choose Color</label>
                            <span id="currentColorCode" class="text-sm font-mono text-slate-500">#1d4ed8</span>
                        </div>

                        <!-- Color Picker Area yang Simple -->
                        <div class="flex items-center gap-4">
                            <!-- Color Preview Box -->
                            <div class="relative">
                                <div id="colorPreviewBox" class="w-12 h-12 rounded-lg shadow-md border border-slate-200"
                                    style="background-color: #1d4ed8;"></div>
                                <input type="color" id="colorPicker" name="color" value="#1d4ed8"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            </div>

                            <!-- Color Details -->
                            <div class="flex-1">
                                <div class="mb-2">
                                    <input type="text" id="colorInput"
                                        class="w-full px-3 py-2 rounded-lg bg-slate-50 border border-slate-200 text-slate-800 font-mono text-sm focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"
                                        placeholder="#1d4ed8" value="#1d4ed8" maxlength="7">
                                </div>
                                <p class="text-xs text-slate-500">Click the color box or enter hex code</p>
                            </div>
                        </div>

                        <!-- Preview Examples -->
                        <div class="mt-4 pt-4 border-t border-slate-100">
                            <p class="text-xs font-medium text-slate-600 mb-2">Preview:</p>
                            <div class="flex items-center gap-2">
                                <div class="flex-1 h-8 rounded-lg border border-slate-200" id="colorPreview"
                                    style="background-color: #1d4ed8;"></div>
                                <div class="px-3 py-1 text-xs font-medium rounded" id="textPreview"
                                    style="background-color: #1d4ed8; color: white;">Sample</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button type="button" data-dismiss="modal"
                        class="button w-20 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button>
                </div>
            </form>
        </div>
    </div>

    {{-- edit --}}
    <div class="modal" id="modal-edit">
        <div class="modal__content">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Edit Category</h2>
            </div>

            <form id="editForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="p-5 space-y-6">
                    <!-- Category Name -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Category Name</label>
                        <input type="text" id="editName" name="name"
                            class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"
                            placeholder="Matematika" required>
                    </div>

                    <!-- Color Picker - Versi Sederhana -->
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <label class="block text-sm font-medium text-slate-700">Choose Color</label>
                            <span id="editCurrentColorCode" class="text-sm font-mono text-slate-500">#1d4ed8</span>
                        </div>

                        <!-- Color Picker Area yang Simple -->
                        <div class="flex items-center gap-4">
                            <!-- Color Preview Box -->
                            <div class="relative">
                                <div id="editColorPreviewBox" class="w-12 h-12 rounded-lg shadow-md border border-slate-200"
                                    style="background-color: #1d4ed8;"></div>
                                <input type="color" id="editColorPicker" name="color" value="#1d4ed8"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            </div>

                            <!-- Color Details -->
                            <div class="flex-1">
                                <div class="mb-2">
                                    <input type="text" id="editColorInput"
                                        class="w-full px-3 py-2 rounded-lg bg-slate-50 border border-slate-200 text-slate-800 font-mono text-sm focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"
                                        placeholder="#1d4ed8" value="#1d4ed8" maxlength="7">
                                </div>
                                <p class="text-xs text-slate-500">Click the color box or enter hex code</p>
                            </div>
                        </div>

                        <!-- Preview Examples -->
                        <div class="mt-4 pt-4 border-t border-slate-100">
                            <p class="text-xs font-medium text-slate-600 mb-2">Preview:</p>
                            <div class="flex items-center gap-2">
                                <div class="flex-1 h-8 rounded-lg border border-slate-200" id="editColorPreview"
                                    style="background-color: #1d4ed8;"></div>
                                <div class="px-3 py-1 text-xs font-medium rounded" id="editTextPreview"
                                    style="background-color: #1d4ed8; color: white;">Sample</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200 flex justify-end gap-2">
                    <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700">Cancel</button>
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Update</button>
                </div>
            </form>
        </div>
    </div>

    {{-- delete --}}
    <div class="modal" id="modal-delete">
        <div class="modal__content">
            <div class="p-5 text-center">
                <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Are you sure?</div>
                <div class="text-gray-600 mt-2">
                    Do you really want to delete these records? <br>
                    This process cannot be undone.
                </div>
            </div>
            <div class="px-5 pb-8 flex justify-center items-center gap-2">
                <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700">Cancel</button>

                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                </form>
            </div>
        </div>
    </div>
    {{-- End:modal --}}

@endsection
