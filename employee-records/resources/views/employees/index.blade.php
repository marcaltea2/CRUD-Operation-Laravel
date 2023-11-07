@include('partials.header')

<!-- Navigation Bar -->
<nav class="bg-white fixed w-full z-99 top-0 left-0 px-2 sm:px-4 py-3">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <x-logo />
        <ul class="flex flex-col md:flex-row">
            <li>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="block py-2 px-3 bg-sky-500 text-white font-bold py-2 rounded">Log Out</button>
                </form>
            </li>
        </ul>
    </div>
</nav>


<header class="max-w-lg mx-auto mt-10">    
    <a href="#">
        <h1 class="text-4xl font-bold text-center mb-10">Employees Record</h1>
    </a>
</header>

<!-- Add new button -->
<div>
    <a href="/add/employee" class="py-2 px-3 bg-green-500 text-white font-semibold py-2 rounded">Add New</a>
</div>

<!-- Summary Table -->
<section class="my-5">
    <div>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-white">
                <tr class="bg-white border-b">
                    <th scope="col" class="py-3 px-6">Total Male</th>
                    <th scope="col" class="py-3 px-6">Total Female</th>
                    <th scope="col" class="py-3 px-6">Average Age</th>
                    <th scope="col" class="py-3 px-6">Total Monthly Salary</th>
                </tr>
            </thead>

            <tbody>
                <tr class="bg-white border-b">
                    <td class="py-4 px-6 font-semibold text-green-500">
                        @if (isset($data['genderData']) && $data['genderData']->where('gender', 'Male')->first())
                            {{ $data['genderData']->where('gender', 'Male')->first()->gender_count }}
                        @else
                            0
                        @endif
                    </td>
                    <td class="py-4 px-6 font-semibold text-green-500">
                        @if (isset($data['genderData']) && $data['genderData']->where('gender', 'Female')->first())
                            {{ $data['genderData']->where('gender', 'Female')->first()->gender_count }}
                        @else
                            0
                        @endif
                    </td>
                    <td class="py-4 px-6 font-semibold text-green-500">
                        @if (isset($data['averageAge']))
                            {{ round($data['averageAge']) }}
                        @else
                            0
                        @endif
                    </td>
                    <td class="py-4 px-6 font-semibold text-green-500">
                        @if (isset($data['totalMonthlySalary']))
                            ₱{{ number_format($data['totalMonthlySalary'], 2) }}
                        @else
                            0.00
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<!-- Main Table -->
<section class=" my-5">
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-white">
                <tr class="bg-white border-b">
                    <th scope="col" class="py-3 px-6">First Name</th>
                    <th scope="col" class="py-3 px-6">Last Name</th>
                    <th scope="col" class="py-3 px-6">Gender</th>
                    <th scope="col" class="py-3 px-6">Birthday</th>
                    <th scope="col" class="py-3 px-6">Monthly Salary</th>
                    <th scope="col" class="py-3 px-6"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data['namesData'] as $employee)
                <tr class="bg-white border-b">
                    <td class="py-4 px-6">{{ $employee->first_name }}</td>
                    <td class="py-4 px-6">{{ $employee->last_name }}</td>
                    <td class="py-4 px-6">{{ $employee->gender }}</td>
                    <td class="py-4 px-6">{{ $employee->birthday }}</td>
                    <td class="py-4 px-6">₱{{ number_format($employee->monthly_salary, 2) }}</td>
                    <td class="py-4 px-6 flex">
                        <a href="/employee/{{$employee->id}}" class="py-1 px-2 bg-green-500 text-white font-semibold py-2 rounded mx-1">Edit</a>
                        <form action="/employee/{{$employee->id}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="py-1 px-2 bg-red-500 text-white font-semibold py-2 rounded mx-1">Delete</button> 
                        </form> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data['namesData']->links() }}
</section>

@include('partials.footer')
