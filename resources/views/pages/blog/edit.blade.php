<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Blog Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @include('layouts.flash-message')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900 ">

                    <div class="form-wrapper">


                    <a href="{{ route('blog.show', $data->id) }}">
                          <button type="button" class="form-show-button text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Show</button>
                    </a>
                    <form method="POST" action="{{ route('blog.update', $data->id) }}" class="form-edit">
                        @csrf
                        @method('PUT')

                        <div class="mt-4">
                            <x-input-label for="image_large" :value="__('Large Image')" />
                            <x-text-input id="image_large" class="block mt-1 w-4/6" type="text" name="image_large"
                                          :value="old('image_large', $data->image_large)" required autofocus placeholder="https://image.com/800x350.jpg"/>
                            <x-input-error :messages="$errors->get('image_large')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="image_middle" :value="__('Middle Image')" />
                            <x-text-input id="image_middle" class="block mt-1 w-4/6" type="text" name="image_middle"
                                          :value="old('image_middle', $data->image_middle)" required autofocus placeholder="https://image.com/545x330.jpg"/>
                            <x-input-error :messages="$errors->get('image_middle')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-4/6" type="text" name="title" :value="old('title', $data->title)" required autofocus />
                            <x-input-error :messages="$errors->get('title', $data->title)" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="desc" :value="__('Desc')" />
                            <textarea  rows="4" id="desc" class="block mt-1 w-4/6" name="desc" required>{{ old('desc', $data->desc) }}</textarea>
                            <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="text" :value="__('Text')" />
                            <textarea rows="7" id="text" class="block mt-1 w-4/6" name="text" required>{{old('text', $data->text)}}</textarea>
                            <x-input-error :messages="$errors->get('text')" class="mt-2" />
                        </div>

{{--                        <div class="mt-4">--}}
{{--                            <x-input-label for="published_at" :value="__('Published At')" />--}}
{{--                            <x-text-input id="published_at" class="block mt-1 w-4/6" type="datetime-local" name="published_at" :value="old('published_at', $data->published_at)"/>--}}
{{--                            <x-input-error :messages="$errors->get('published_at')" class="mt-2" />--}}
{{--                        </div>--}}

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900
                            rounded-md focus:outline-none
                            focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('blog.index') }}">
                                Cancel
                            </a>

                            <x-primary-button class="ml-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
