@include('partials.header')
<nav class="bg-white fixed w-full z-99 top-0 left-0 px-2 sm:px-4 py-3">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <x-logo />
        <ul class="flex flex-col md:flex-row">
            <li>
                <a href="/login" class="block py-2 px-3 bg-sky-500 text-white font-bold py-2 rounded">Sign In</a>
            </li>
        </ul>
    </div>
</nav>

<header class="max-w-lg mx-auto mt-10">
    <a href="#">
        <h1 class="text-4xl font-bold text-center">Admin Sign Up</h1>
    </a>
</header>

<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <section>
        <!-- Form for Registration of admin user-->
        <form action="/store" method="POST">
            @csrf
            <div class="mb-3 pt-3 rounded">
                <input name="name" type="text" placeholder="name" class="rounded w-full px-3 py-3 border-solid border-2 border-gray-200" value={{old('name')}}>
                @error('name')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3 pt-3 rounded">
                <input name="email" type="email" placeholder="email" class="rounded w-full px-3 py-3 border-solid border-2 border-gray-200" value={{old('email')}}>
                @error('email')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3 pt-3 rounded">
                <input name="password" type="password" placeholder="Password" class="rounded w-full px-3 py-3 border-solid border-2 border-gray-200">
                @error('password')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p> 
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded">
                <input name="password_confirmation" type="password" placeholder="Confirm Password" class="rounded w-full px-3 py-3 border-solid border-2 border-gray-200">
                @error('password')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p>
                @enderror 
            </div>
            <button type="submit" class="bg-sky-500 text-white font-bold py-2 rounded w-full">Sign Up</button>
        </form>   
    </section>
</main>
@include('partials.footer')
