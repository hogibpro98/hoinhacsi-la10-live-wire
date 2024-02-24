<div>
    <main class="pt-20 -mt-2">
        <div class="mx-auto p-2">
            <!-- row -->
            <div class="flex flex-wrap flex-row">
                <div class="flex-shrink max-w-full px-4 w-full">
                    <h1 class="text-xl font-bold mt-3 mb-5">Leader list</h1>
                </div>
                <div class="flex-shrink max-w-full px-4 w-full mb-6">
                    <div class="p-8 mb-6 bg-white rounded-lg shadow-lg">
                        <div class="flex justify-between mb-3">
                            <a href="{{ route('admin.leader.add') }}"
                               class="flex h-[38px] items-center py-2 px-4 text-center mb-3 rounded leading-5 text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="inline-block ltr:mr-2 rtl:ml-2 bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"></path>
                                </svg>
                                Add Leader
                            </a>
                            @include('admin.data-table.header')

                        </div>
                        <div class="flex flex-wrap flex-row">
                            <div class="w-full">
                                <table
                                    class="table-sorter table-bordered w-full ltr:text-left rtl:text-right text-gray-500">
                                    <thead>
                                    <tr class="bg-gray-100 ">
                                        <th>Sequence</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th class="w-[100px]">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td class="w-[100px]">{{$item->sequence}}</td>
                                            <td><img class="w-12 h-12 object-cover"
                                                     src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                                     alt="{{ $item->name }}"></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{$item->position}}</td>

                                            @include('admin.data-table.basic-tbody-right')
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-[2rem] flex justify-end">
                                    {{ $items->links('admin.pagination') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@include('admin.data-table.confirm-delete-modal')
