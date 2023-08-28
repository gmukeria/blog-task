<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Blog Post List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('layouts.flash-message')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="text-right mt-6 mr-6">
                    @can('create', App\Models\Blog::class)
                        <a href="{{ route('blog.create') }}">
                            <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create New Blog</button>
                        </a>
                    @endcan
                </div>

                <div class="p-6 text-gray-900">
                    <table>
                        <tr>
                            <th class="text-center">#ID</th>
                            <th>Title</th>
                            <th>Desc</th>
                            <th class="text-center">Author</th>
                            <th class="text-center">Views</th>
                            <th class="text-center">Show</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <td class="text-center">{{ $item->id }}</td>
                                <td>{!! Str::limit( $item->title, 25, ' ..') !!}</td>
                                <td>{!! Str::limit( $item->desc, 15, ' ..') !!}</td>
                                <td class="text-center">{{ data_get($item, 'user.name') }}</td>
                                <td class="text-center">{{ $item->views }}</td>

                                <td class="text-center">
                                    <a href="{{ route('blog.show', $item->id) }}" class="text-green-600">
                                        show
                                    </a>
                                </td>

                                <td class="text-center">
                                    @can('update', $item)
                                        <a href="{{ route('blog.edit', $item->id) }}" class="text-blue-600">
                                            edit
                                        </a>
                                    @endcan
                                </td>

                                <td class="text-center">
                                    @can('delete', $item)
                                        <a href="{{ route('blog.delete', $item->id) }}" class="text-orange-600">
                                            delete
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="mt-5">
                        {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
