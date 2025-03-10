<nav class="bg-white border-b border-gray-200 px-4 py-3 shadow-sm">
  <div class="container mx-auto flex items-center justify-between">
    <div class="flex items-center space-x-3">
      <!-- Icon biểu tượng (có thể thay đổi hoặc bỏ qua nếu không cần) -->
      <svg class="h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 7V5a2 2 0 012-2h3.28a2 2 0 011.71 1.01L12 7m6 0l2 2m-2-2l2-2M12 7v13m0 0l-3-3m3 3l3-3" />
      </svg>
      <span class="text-xl font-bold text-gray-800">Dashboard Admin</span>
    </div>
    @auth
      <div class="flex items-center space-x-4">
        <span class="hidden md:inline text-gray-600">Hello, {{ Auth::user()->name }}!</span>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button x-on:click="open = !open" type="submit"
            class="transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            Log out
          </button>
        </form>
      </div>
    @endauth
  </div>
</nav>
