@include('partials.header')

<header class="max-w-lg mx-auto mt-10">
    <a href="#">
        <h1 class="text-4xl font-bold text-center">{{$employee->first_name}} {{$employee->last_name}}</h1>
    </a>
</header>   

<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <section>
        <!-- Form for editing and updating employee-->
        <form action="/employee/{{$employee->id}}" method="POST">
            @method('PUT') <!-- Overwrite to PUT -->
            @csrf <!-- Cross-site Request Forgery attacks -->
            <div class="mb-3 pt-3 rounded">
                <input name="first_name" type="text" placeholder="First Name" class="rounded w-full px-3 py-3 border-solid border-2 border-gray-200" value={{$employee->first_name}}>
                @error('first_name')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6 pt-3 rounded">
                <input name="last_name" type="text" placeholder="Last Name" class="rounded w-full px-3 py-3 border-solid border-2 border-gray-200" value={{$employee->last_name}}>
                @error('last_name')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3 pt-3 rounded">
                <select name="gender" placeholder="Gender" class="rounded w-full px-3 py-3 border-solid border-2 border-gray-200">
                    <option value="" value={{$employee->gender == "" ? 'selected' : ''}} selected disabled>Gender</option>
                    <option value="Male" value={{$employee->gender == "Male" ? 'selected' : ''}}>Male</option>
                    <option value="Female" value={{$employee->gender == "Female" ? 'selected' : ''}}>Female</option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6 pt-3 rounded">
                <input name="birthday" id="birthday" placeholder="Birthday" class="rounded w-full px-3 py-3 border-solid border-2 border-gray-200 datepicker" value={{$employee->birthday}}>
                @error('birthday')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p>
                @enderror
            </div>  

            <div class="mb-6 pt-3 rounded">
                <input type="number" name="monthly_salary" placeholder="Monthly Salary" class="rounded w-full px-3 py-3 border-solid border-2 border-gray-200" value={{$employee->monthly_salary}}>
                @error('monthly_salary')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="bg-sky-500 text-white font-bold py-2 rounded shadow-lg w-full mt-2">Update</button>
        </form> 
    </section>
</main>

@include('partials.footer')