@extends('layouts.main')
@section('content')

    <div class="w-[600px] shadow-lg shadow-gray-500 rounded-xl mt-10 py-8 px-10">
        <form
            class=""
            method='post' enctype="multipart/form-data" action="{{route('cars.store')}}">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-2xl font-semibold text-blue-500 text-center border-b-2 pb-4">Create new car</h2>

                    <div class="mt-10 grid grid-cols-2 gap-x-6 gap-y-8 ">


                        <div class="sm:col-span-1">
                            <label for="model"
                                   class="block text-sm/6 font-medium text-gray-900">Model</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300  sm:max-w-md">

                                    <input type="text" name="model" id="model"
                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6"
                                           placeholder="Audi A4"/>
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="year"
                                   class="block text-sm/6 font-medium text-gray-900">Year</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300  sm:max-w-md">

                                    <input type="text" name="year" id="year"
                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6"
                                           placeholder="2023"/>
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="mileage"
                                   class="block text-sm/6 font-medium text-gray-900">Mileage</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300  sm:max-w-md">

                                    <input type="number" min={0}
                                           name="mileage"
                                           id="mileage"
                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6"
                                           placeholder="120000"/>
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-1">
                            <label for="rent_price"
                                   class="block text-sm/6 font-medium text-gray-900">Price per day, $</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300  sm:max-w-md">

                                    <input type="number"
                                           min={0}
                                           name="rent_price"
                                           id="rent_price"
                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6"
                                           placeholder="250"/>
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="engine"
                                   class="block text-sm/6 font-medium text-gray-900">Engine</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300  sm:max-w-md">

                                    <input type="text"
                                           name="engine"
                                           id="engine"
                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6"
                                           placeholder="3.0 Diesel"/>
                                </div>
                            </div>
                        </div>

                        <div class={'col-span-1'}>
                            <label for="body_type"
                                   class="block text-sm/6 font-medium text-gray-900 mb-2.5">Body type</label>

                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300  sm:max-w-md">

                                <select id="body_type" name="body_type"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6">
                                    <option value="Wagon">Wagon</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Crossover">Crossover</option>
                                    <option value="Hatchback">Hatchback</option>
                                    <option value="Supercar">Supercar</option>
                                    <option value="Van">Van</option>
                                    <option value="Minivan">Minivan</option>
                                </select>
                            </div>

                        </div>

                        <div class={'col-span-1'}>
                            <label for="transmission"
                                   class="block text-sm/6 font-medium text-gray-900">Transmission</label>
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">

                                </div>
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300  sm:max-w-md">

                                    <select id="transmission" name="transmission"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6">
                                        <option value="Automatic">Automatic</option>
                                        <option valu="Manual">Manual</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class={'col-span-1'}>
                            <label for="drive"
                                   class="block text-sm/6 font-medium text-gray-900 mb-2.5">Drive</label>

                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300  sm:max-w-md">

                                <select id="drive" name="drive"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-4 text-gray-900 placeholder:text-gray-400  sm:text-sm/6">
                                    <option value="FWD">FWD</option>
                                    <option value="RWD">RWD</option>
                                    <option value="AWD">AWD</option>
                                </select>
                            </div>

                        </div>


{{--                        <div class="col-span-full">--}}
{{--                            <label for="description"--}}
{{--                                   class="block text-sm/6 font-medium text-gray-900">Description</label>--}}
{{--                            <div class="mt-2">--}}
{{--                                  <textarea id="description" name="description" rows="3"--}}
{{--                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm/6"></textarea>--}}
{{--                            </div>--}}
{{--                            <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about car.</p>--}}
{{--                        </div>--}}

                        <div class="col-span-1">
                            <label for="preview"
                                   class="block text-sm/6 font-medium text-gray-900">Preview photo</label>
                            <input type="file" name="preview_photo" id="preview_photo" class="hidden">
                            <div class="w-full">

                                <button type="button"
                                        onclick="document.getElementById('preview_photo').click();"
                                        class="w-full mt-2 bg-blue-500 text-white rounded-md  px-2.5 py-1.5 text-sm font-semibold  shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-blue-400">
                                    Choose
                                </button>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="photos"
                                   class="block text-sm/6 font-medium text-gray-900">Car photos</label>
                            <div class="w-full">
                                <input type="file" name="photos[]" id="photos" class="hidden" multiple>
                                <button type="button"
                                        onclick="document.getElementById('photos').click();"
                                        class="w-full mt-2 bg-blue-500 text-white rounded-md px-2.5 py-1.5 text-sm font-semibold shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-blue-400">
                                    Choose
                                </button>
                            </div>
                        </div>


                    </div>
                </div>


            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                <button type="submit"
                        class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    Save
                </button>
            </div>
        </form>
    </div>

@endsection
