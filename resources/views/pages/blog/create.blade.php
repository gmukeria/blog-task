<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Blog Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @include('layouts.flash-message')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('blog.store') }}">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="image_large" :value="__('Large Image')" />
                            <x-text-input id="image_large" class="block mt-1 w-4/6" type="text" name="image_large"
                                          :value="old('image_large')" required autofocus placeholder="https://image.com/800x350.jpg"/>
                            <x-input-error :messages="$errors->get('image_large')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="image_middle" :value="__('Middle Image')" />
                            <x-text-input id="image_middle" class="block mt-1 w-4/6" type="text" name="image_middle"
                                          :value="old('image_middle')" required autofocus placeholder="https://image.com/545x330.jpg"/>
                            <x-input-error :messages="$errors->get('image_middle')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-4/6" type="text" name="title"
                                          :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="desc" :value="__('Desc')" />
                            <textarea  rows="4" id="desc" class="block mt-1 w-4/6" name="desc" :value="old('desc')" required></textarea>
                            <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="text" :value="__('Text')" />
                            <textarea rows="7" id="text" class="block mt-1 w-4/6" name="text" :value="old('text')" required></textarea>
                            <x-input-error :messages="$errors->get('text')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="published_at" :value="__('Published At')" />
                            <x-text-input id="published_at" class="block mt-1 w-4/6" type="datetime-local" name="published_at" :value="old('published_at')"/>
                            <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('blog.index') }}">
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
</x-app-layout>
