<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--            {{ __('Dashboard') }}--}}
        </h2>
    </x-slot>

    <div class="blog-details-container">
        <div class="blog-segment">
            <div class="details-wrapper">
                <div class="b-details-title">
                    {{ $data->title }}
                </div>

                <div class="b-details-header">
                    <div class="blog-published">
                        {{ $data->published_at }}
                    </div>
                    <div class="blog-author ml-3">
                        by {{ data_get($data, 'user.name') }}
                    </div>

                    <div class="blog-published ml-3">
                        view: {{ $data->views }}
                    </div>

                </div>

                <div class="b-details-image">
                    <img src="{{ $data->image_large }}" alt="">
                </div>

                <div class="b-details-text">
                    {{ $data->text }}
                </div>
            </div>

            <hr>

            <div class="comment-wrapper">
                <div class="comment-list space-y-4">
                    @foreach($comments as $comment)
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div class=" flex flex-row items-center justify-between">
                                <h3 class="text-lg font-bold">{{ $comment->user->name }}</h3>
                                @can('delete', $comment)
                                    <form  method="post" action="{{ route('blog.comment.delete', [$data->id, $comment->id]) }}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.4 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                                    </form>
                                @endcan
                            </div>
                            <p class="text-gray-700 text-sm mb-2">{{ $comment->created_at }}</p>
                            <p class="text-gray-700">{{ $comment->text }}</p>
                        </div>
                    @endforeach
                </div>

                @can('create', App\Models\Comment::class)
                    <div class="comment-add">
                        <form method="POST" action="{{ route('blog.comment.store', $data->id) }}" class="bg-white rounded-lg border p-2 mx-auto mt-20">
                            @csrf
                            <div class="px-3 mb-2 mt-2 ">
                                <textarea name="comment" placeholder="comment" required class="w-full bg-gray-100 rounded border border-gray-400 leading-normal resize-none h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"></textarea>
                            </div>
                            <div class="flex justify-end px-4" id="add_comment">
                                <input type="submit" class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500" value="Comment">
                            </div>
                        </form>
                    </div>
                @endcan

            </div>
        </div>

        <div class="edit-segment">
            @can('create',  App\Models\Blog::class)
                <a href="{{route('blog.create')}}">
                      <button type="button" class="  w-60 text-green-800 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Create</button>
                </a>
            @endcan

            @can('update', $data)
                <a href="{{route('blog.edit', $data->id)}}">
                    <button type="button" class="mt-3  w-60  text-blue-800 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Edit</button>
                </a>
            @endcan

            @can('delete', $data)
                <form  method="post" action="{{route('blog.delete', $data->id)}}" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="mt-3 w-60 text-red-800 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                </form>
            @endcan
        </div>
    </div>
</x-app-layout>


