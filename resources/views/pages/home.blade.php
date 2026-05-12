<!DOCTYPE html>

<html class="light" lang="zh-Hant">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>PheeShing.TV</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
    rel="stylesheet" />
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#00796B",
            "background-light": "#f5f8f8",
            "background-dark": "#0f231e",
          },
          fontFamily: {
            "display": ["Manrope"]
          },
          borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
        },
      },
    }
  </script>
  <style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }

    body {
      background-color: #f8fafc;
      color: #1e293b;
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="bg-[#f8fafc] text-[#1e293b] min-h-screen flex flex-col">
  <!-- TopNavBar -->
  <header
    class="bg-white flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto border-b border-[#e2e8f0]">
    <a href="{{ route('home') }}"
      class="text-2xl font-bold tracking-tighter text-teal-700 hover:text-blue-600 transition-all duration-300 cursor-pointer">
      PheeShing.TV
    </a>
    @if(session('user_id'))
      <div class="flex items-center gap-4 bg-slate-50 px-4 py-3 rounded-lg border border-slate-200">
        <div class="flex items-center gap-3 flex-1">
          <span class="material-symbols-outlined text-slate-600">account_circle</span>
          <span class="text-slate-700 font-medium">嗨, {{session('user_name')}}</span>
        </div>
        <form action="{{ route('logout.submit') }}" method="POST">
          @csrf
          <button type="submit"
            class="text-sm text-red-500 hover:bg-red-50 hover:text-red-600 px-3 py-1.5 rounded transition-colors">
            登出
          </button>
        </form>
      </div>
    @else
      <a href="{{ route('login.view') }}"
        class="btn btn-primary bg-[#00796B] text-white font-medium px-6 py-2 rounded-full hover:bg-[#00695C] transition-all active:scale-95 shadow-sm">
        login
      </a>
    @endif
  </header>
  <!-- Main Content Canvas -->
  <main class="flex-grow flex items-center justify-center p-8">
    <div class="max-w-4xl w-full">
      <!-- 2x2 Grid of Live Streams -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Stream Card 1 -->
        <div class="group cursor-pointer" onclick="window.location.href='{{ route('stream.view') }}'">
          <div class="aspect-video rounded-xl overflow-hidden shadow-md bg-white border border-slate-200 relative">
            <img alt="Planted freshwater tank"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuBoGlrDy6esWksI7SQ4KN76WzRplQ34ABWngzy3oiQxkVvwX7F350WDphbLJOvf9zJK8fLUZXrU1HtW2GfOmhaeSiEcCoqJ0BwuqCsvE6Bn9CSjdAn8xLkH-mXA8eHGKPE46tQOsoIx3ACp29mfBADrxLkhLwTGetnzUw9gHe7gRDN_StzjhrGszF4yFU7QtaBKW7Y55vNUa0PqE8AFjABgwux0JwNtr0HQsdvXbLwEA3l1R4Y2H9xydq5BJ8xocm3CBOZLWf7gGODC" />
            <div
              class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 flex items-center justify-center">
              <!-- 這裡可以放播放圖示 -->
            </div>
          </div>
          <h3
            class="font-headline text-lg font-bold text-slate-700 px-1 mt-2 group-hover:text-primary transition-colors">
            釣魚影片1</h3>
        </div>

        <!-- Stream Card 2 -->
        <div class="group cursor-pointer" onclick="window.location.href='{{ route('stream.view') }}'">
          <div class="aspect-video rounded-xl overflow-hidden shadow-md bg-white border border-slate-200 relative">
            <img alt="Tropical reef aquarium"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuCOGID18ifTBY95KZ21IJWGbS2LspcfM7IdidEELtrxtn_tjLQgs_yOfNy1I6ZpffXR0o8jKWRj6PKZvN-7oVeUYsLD9mLZUyA-fSlVzRJ_vW-tsYuFUAciKeyU_8Hd1gPl5CSfO2SlL8RbttU4A0vuhhzpEAGTmLXg9RUwlgr4NQ4xsM0cgKBJ_8F2mEMlIIjd9N5X5jxcqtcT_02HtKkyQQn-g7dJaGihZKx7ZZ9JUfCQtBaai5n5MUm58CKBUJjscoTn0VGTqMVm" />
            <div
              class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 flex items-center justify-center">
            </div>
          </div>
          <h3
            class="font-headline text-lg font-bold text-slate-700 px-1 mt-2 group-hover:text-primary transition-colors">
            釣魚影片2</h3>
        </div>

        <!-- Stream Card 3 -->
        <div class="group cursor-pointer" onclick="window.location.href='{{ route('stream.view') }}'">
          <div class="aspect-video rounded-xl overflow-hidden shadow-md bg-white border border-slate-200 relative">
            <img alt="Betta fish swimming"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3gJKA3kykSXPwRUMqZLUvqR-RHHbSXpwAdQ&s" />
            <div
              class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 flex items-center justify-center">
            </div>
          </div>
          <h3
            class="font-headline text-lg font-bold text-slate-700 px-1 mt-2 group-hover:text-primary transition-colors">
            釣魚影片3</h3>
        </div>

        <!-- Stream Card 4 -->
        <div class="group cursor-pointer" onclick="window.location.href='{{ route('stream.view') }}'">
          <div class="aspect-video rounded-xl overflow-hidden shadow-md bg-white border border-slate-200 relative">
            <img alt="Planted freshwater tank"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuBoGlrDy6esWksI7SQ4KN76WzRplQ34ABWngzy3oiQxkVvwX7F350WDphbLJOvf9zJK8fLUZXrU1HtW2GfOmhaeSiEcCoqJ0BwuqCsvE6Bn9CSjdAn8xLkH-mXA8eHGKPE46tQOsoIx3ACp29mfBADrxLkhLwTGetnzUw9gHe7gRDN_StzjhrGszF4yFU7QtaBKW7Y55vNUa0PqE8AFjABgwux0JwNtr0HQsdvXbLwEA3l1R4Y2H9xydq5BJ8xocm3CBOZLWf7gGODC" />
            <div
              class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 flex items-center justify-center">
            </div>
          </div>
          <h3
            class="font-headline text-lg font-bold text-slate-700 px-1 mt-2 group-hover:text-primary transition-colors">
            釣魚影片4</h3>
        </div>

      </div>
    </div>
  </main>
</body>

</html>