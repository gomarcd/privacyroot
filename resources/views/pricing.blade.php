<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plans') }}
        </h2>
    </x-slot>

<div class="max-w-3xl mx-auto bg-gray-100" style="font-family:'Lato',sans-serif;">

    <div class="text-center my-10">
        <h1 class="font-bold text-3xl mb-2">Pricing</h1>
        <h4 class="text-gray-600">One price to rule them all.</h4>
    </div>

    <div class="flex flex-col md:flex-row px-2 md:px-0 justify-center">

        <div class="w-full md:w-1/3 bg-white shadow hover:shadow-xl transition duration-100 ease-in-out p-6 md:mr-4 mb-10 md:mb-4">
            <h3 class="text-gray-600 text-lg">Lite</h3>
            <p class="text-gray-600 mt-1"><span class="font-bold text-black text-4xl">$1</span> /Month</p>
            <p class="text-sm text-gray-600 mt-2">For the most basic needs.</p>
            <div class="text-sm text-gray-600 mt-4">
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 100 MB storage</p>
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Privacyroot domain</p>
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Anonymous payments</p>
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Anonymous access</p>
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> Best effort support</p>
            </div>
            <button class="w-full text-purple-700 border border-purple-700 hover:bg-purple-700 hover:text-white hover:shadow-xl transition duration-150 ease-in-out py-2 mt-4">Select</button>
        </div>
        <div class="w-full md:w-1/3 text-white bg-purple-700 shadow hover:shadow-xl transition duration-100 ease-in-out p-6 md:mr-4 mb-10 md:mb-4">
            <h3 class="text-lg">Personal</h3>
            <p class="mt-1"><span class="font-bold text-4xl">$5</span> /Month</p>
            <p class="text-sm opacity-75 mt-2">For every day use.</p>
            <div class="text-sm mt-4">
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 5 GB storage</p>
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 5 emails</p>
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 5 aliases</p>
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 5 something</p>
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 5 something</p>
            </div>
            <button class="w-full text-purple-700 bg-white opacity-75 hover:opacity-100 hover:shadow-xl transition duration-150 ease-in-out py-2 mt-4">Select</button>
        </div>
        <div class="w-full md:w-1/3 bg-white shadow hover:shadow-xl transition duration-100 ease-in-out p-6 mb-10 md:mb-4">
            <h3 class="text-gray-600 text-lg">Business</h3>
            <p class="text-gray-600 mt-1"><span class="font-bold text-black text-4xl">$10</span> /Month</p>
            <p class="text-sm text-gray-600 mt-2">For the whole team.</p>
            <div class="text-sm text-gray-600 mt-4">
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 50 GB storage</p>
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 50 emails</p>
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 50 aliases</p>
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 50 something</p>
                <p class="my-2"><span class="fa fa-check-circle mr-2 ml-1"></span> 50 something</p>
            </div>
            <button class="w-full text-purple-700 border border-purple-700 hover:bg-purple-700 hover:text-white hover:shadow-xl transition duration-150 ease-in-out py-2 mt-4">Select</button>
        </div>
    </div>

</div>

<!-- <div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">

        <div class="h-full flex justify-center items-center px-6 py-12">
          <div class="bg-white border border-indigo-600 border-opacity-10 rounded-md shadow-lg">
            <div class="px-6 py-12 border-b-2 border-gray-200">
              <p class="text-3xl font-semibold text-center mb-4">Proot Mail</p>
              <div class="flex justify-center items-center">
                <div class="flex items-start">
                  <p class="text-2xl font-medium">$</p>
                  <p class="text-7xl font-bold">5</p>
                </div>
                <p class="text-2xl text-gray-400">/month</p>
              </div>
            </div>

            <div class="p-12 bg-gray-100">
              <ul class="space-y-3">
                <li>
                  <p class="text-lg text-gray-600">Feature #1</p>
                </li>
                <li>
                  <p class="text-lg text-gray-600">Feature #2</p>
                </li>
                <li>
                  <p class="text-lg text-gray-600">Feature #3</p>
                </li>
              </ul>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div> -->

</x-app-layout>