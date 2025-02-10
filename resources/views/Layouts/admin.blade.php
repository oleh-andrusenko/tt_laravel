<div class="flex justify-between bg-blue-600 pl-2 py-1.5 text-white">
    <h3 class="text-xl text-center py-4 font-semibold uppercase text-[#ffc300]">Admin dashboard</h3>
    <a class="{{request('tab') === 'stats' ? 'tab active' : 'tab'}}"
       href="{{route('admin.dashboard', ['tab'=>'stats'])}}">
        Statistics
    </a>
    <a class="{{request('tab') === 'cars' ? 'tab active' : 'tab'}}"
       href="{{route('admin.dashboard', ['tab'=>'cars'])}}">
        Cars
        <div>
            32
        </div>
    </a>
    <a class="{{request('tab') === 'users' ? 'tab active' : 'tab'}}"
       href="{{route('admin.dashboard', ['tab'=>'users'])}}">
        Users
        <div>
            32
        </div>
    </a>
    <a class="{{request('tab') === 'rents' ? 'tab active' : 'tab'}}"
       href="{{route('admin.dashboard', ['tab'=>'rents'])}}">
        Rents
        <div>
            32
        </div>
    </a>
    <a class="{{request('tab') === 'reviews' ? 'tab active' : 'tab'}}"
       href="{{route('admin.dashboard', ['tab'=>'reviews'])}}">
        Reviews
        <div>
            32
        </div>
    </a>

</div>


