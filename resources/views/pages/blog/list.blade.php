<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="main-container">
        <div class="blog-container">
            @foreach($data as $item)
                <div class="blog-wrapper">
                    <div class="blog-img">
                        <img src="{{ $item->image_middle  }}" alt="">
                    </div>
                    <div class="blog-header">
                        <div class="blog-published">
                             {{ $item->published_at }}
                        </div>

                        <div class="blog-author text-left ml-3">
                             {{ data_get($item, 'user.name') }}
                        </div>

                        <div class="blog-view ml-3">
                            | view: {{ $item->views }}
                        </div>

                    </div>
                    <div class="blog-title">
                        <a href="{{ route('blog.show', $item->id) }}">
                            {{ $item->title }}
                        </a>
                    </div>
                    <div class="blog-desc">
                        {{ $item->desc }}
                    </div>
                </div>
            @endforeach

        </div>


        <div class="blog-pagination">
             {!! $data->links('pagination::bootstrap-4')!!}
        </div>

</div>
</x-app-layout>
