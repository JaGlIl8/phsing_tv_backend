<!DOCTYPE html>
<html class="light" lang="zh-Hant">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>AquaStream - Creator Profile</title>

  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            primary: "#00675d",
            secondary: "#006765",
            background: "#f5f7f9",
            surface: "#ffffff",
            muted: "#6b7280",
            border: "#d9dde0",
            success: "#00c853",
            danger: "#ff4d6d",
          },
          fontFamily: {
            headline: ["Manrope"],
            body: ["Inter"],
          },
        },
      },
    };
  </script>

  <style>
    .material-symbols-outlined {
      font-variation-settings:
        'FILL' 1,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: #f5f7f9;
    }

    h1, h2, h3 {
      font-family: 'Manrope', sans-serif;
    }
  </style>
</head>

<body class="text-slate-900">

  <!-- NAVBAR -->
  <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

      <div class="flex items-center gap-12">
        <span class="text-2xl font-extrabold text-teal-700">
          AquaStream
        </span>

        <div class="hidden md:flex items-center gap-6">
          <a class="font-medium text-teal-700" href="#">探索直播</a>
          <a class="text-slate-600 hover:text-teal-700 transition" href="#">熱門魚缸</a>
          <a class="text-slate-600 hover:text-teal-700 transition" href="#">追蹤中</a>
          <a class="text-slate-600 hover:text-teal-700 transition" href="#">Creator Studio</a>
        </div>
      </div>

      <div class="flex items-center gap-4">
        <button class="relative">
          <span class="material-symbols-outlined text-slate-600">
            notifications
          </span>

          <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        <img
          class="w-10 h-10 rounded-full object-cover border-2 border-teal-500"
          src="https://i.pravatar.cc/100"
        />
      </div>
    </div>
  </nav>

  <!-- MAIN -->
  <main class="max-w-7xl mx-auto px-6 py-12 flex flex-col md:flex-row gap-10">

    <!-- SIDEBAR -->
    <aside class="w-full md:w-64 flex-shrink-0">

      <nav class="bg-white rounded-2xl p-4 border border-slate-200 flex flex-col gap-2">

        <a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-teal-50 text-teal-700 font-semibold" href="#">
          <span class="material-symbols-outlined">person</span>
          個人檔案
        </a>

        <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-100 text-slate-600 transition" href="#">
          <span class="material-symbols-outlined">live_tv</span>
          我的直播
        </a>

        <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-100 text-slate-600 transition" href="#">
          <span class="material-symbols-outlined">favorite</span>
          追蹤清單
        </a>

        <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-100 text-slate-600 transition" href="#">
          <span class="material-symbols-outlined">analytics</span>
          數據分析
        </a>

        <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-100 text-slate-600 transition" href="#">
          <span class="material-symbols-outlined">settings</span>
          設定
        </a>

      </nav>
    </aside>

    <!-- CONTENT -->
    <div class="flex-1 space-y-12">

      <!-- HERO -->
      <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-teal-700 to-cyan-700 p-10 text-white">

        <div class="relative z-10 flex flex-col md:flex-row gap-8 items-center md:items-end">

          <img
            class="w-32 h-32 rounded-full border-4 border-white/30 object-cover"
            src="https://i.pravatar.cc/300"
          />

          <div class="flex-1 text-center md:text-left">

            <p class="uppercase tracking-[0.25em] text-xs font-bold text-cyan-100 mb-2">
              Fish Tank Creator
            </p>

            <h1 class="text-5xl font-extrabold mb-4">
              AquaReef_TW
            </h1>

            <p class="max-w-2xl text-cyan-50 leading-relaxed">
              專注於海水珊瑚缸與療癒型魚缸直播，
              分享餵食日常、水質維護與珊瑚生態觀察。
              每晚固定直播 Reef Tank Maintenance。
            </p>

            <div class="flex flex-wrap gap-6 mt-6 justify-center md:justify-start">

              <div>
                <p class="text-sm text-cyan-100">Followers</p>
                <h3 class="text-2xl font-bold">12.4K</h3>
              </div>

              <div>
                <p class="text-sm text-cyan-100">總觀看數</p>
                <h3 class="text-2xl font-bold">82K</h3>
              </div>

              <div>
                <p class="text-sm text-cyan-100">直播時數</p>
                <h3 class="text-2xl font-bold">428 hrs</h3>
              </div>

            </div>

          </div>

        </div>

        <div class="absolute -right-16 -bottom-16 w-72 h-72 bg-cyan-300 opacity-10 rounded-full blur-3xl"></div>
      </section>

      <!-- STATS -->
      <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white rounded-2xl border border-slate-200 p-8 hover:bg-teal-50 transition">
          <span class="material-symbols-outlined text-4xl text-teal-700 mb-6">
            live_tv
          </span>

          <h3 class="uppercase text-xs tracking-widest text-slate-500 mb-2">
            本月直播次數
          </h3>

          <p class="text-5xl font-extrabold">
            36
          </p>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-8 hover:bg-teal-50 transition">
          <span class="material-symbols-outlined text-4xl text-teal-700 mb-6">
            visibility
          </span>

          <h3 class="uppercase text-xs tracking-widest text-slate-500 mb-2">
            即時觀看人數
          </h3>

          <p class="text-5xl font-extrabold">
            128
          </p>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-8 hover:bg-teal-50 transition">
          <span class="material-symbols-outlined text-4xl text-teal-700 mb-6">
            favorite
          </span>

          <h3 class="uppercase text-xs tracking-widest text-slate-500 mb-2">
            累積按讚數
          </h3>

          <p class="text-5xl font-extrabold">
            9.2K
          </p>
        </div>

      </section>

      <!-- LIVE TANKS -->
      <section>

        <div class="flex justify-between items-end mb-8">

          <div>
            <p class="uppercase tracking-widest text-xs text-teal-700 font-bold mb-1">
              Live Aquarium Streams
            </p>

            <h2 class="text-4xl font-extrabold">
              我的直播魚缸
            </h2>
          </div>

          <button class="text-teal-700 font-semibold flex items-center gap-2 hover:underline">
            管理直播
            <span class="material-symbols-outlined">
              chevron_right
            </span>
          </button>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

          <!-- CARD -->
          <div class="group relative overflow-hidden rounded-3xl aspect-[16/10]">

            <img
              class="w-full h-full object-cover transition duration-700 group-hover:scale-110"
              src="https://images.unsplash.com/photo-1520301255226-bf5f144451c1?q=80&w=1400&auto=format&fit=crop"
            />

            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 flex flex-col justify-end">

              <div class="flex items-center gap-3 mb-4">

                <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1">
                  ● LIVE
                </span>

                <span class="text-white text-sm">
                  128 viewers
                </span>

              </div>

              <h3 class="text-white text-2xl font-bold mb-3">
                珊瑚礁主缸直播
              </h3>

              <div class="flex gap-4 text-sm text-cyan-100">
                <span>26°C</span>
                <span>PH 8.1</span>
                <span>3 Cameras</span>
              </div>

            </div>
          </div>

          <!-- CARD -->
          <div class="group relative overflow-hidden rounded-3xl aspect-[16/10]">

            <img
              class="w-full h-full object-cover transition duration-700 group-hover:scale-110"
              src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?q=80&w=1400&auto=format&fit=crop"
            />

            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 flex flex-col justify-end">

              <div class="flex items-center gap-3 mb-4">

                <span class="bg-emerald-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                  ONLINE
                </span>

                <span class="text-white text-sm">
                  Monitoring Active
                </span>

              </div>

              <h3 class="text-white text-2xl font-bold mb-3">
                深海缸環境觀察
              </h3>

              <div class="flex gap-4 text-sm text-cyan-100">
                <span>18°C</span>
                <span>Auto Filter</span>
                <span>Night Vision</span>
              </div>

            </div>
          </div>

        </div>

      </section>

      <!-- ACHIEVEMENTS -->
      <section class="bg-white border border-slate-200 rounded-3xl p-10">

        <div class="mb-10">

          <p class="uppercase tracking-widest text-xs text-teal-700 font-bold mb-1">
            Creator Milestones
          </p>

          <h2 class="text-4xl font-extrabold">
            成就徽章
          </h2>

        </div>

        <div class="flex flex-wrap gap-8">

          <!-- BADGE -->
          <div class="flex flex-col items-center gap-4 w-32">

            <div class="w-20 h-20 rounded-full bg-teal-100 flex items-center justify-center text-teal-700">
              <span class="material-symbols-outlined text-4xl">
                workspace_premium
              </span>
            </div>

            <span class="text-sm font-bold text-center">
              百小時直播
            </span>

          </div>

          <!-- BADGE -->
          <div class="flex flex-col items-center gap-4 w-32">

            <div class="w-20 h-20 rounded-full bg-cyan-100 flex items-center justify-center text-cyan-700">
              <span class="material-symbols-outlined text-4xl">
                groups
              </span>
            </div>

            <span class="text-sm font-bold text-center">
              10K Followers
            </span>

          </div>

          <!-- BADGE -->
          <div class="flex flex-col items-center gap-4 w-32">

            <div class="w-20 h-20 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700">
              <span class="material-symbols-outlined text-4xl">
                stream
              </span>
            </div>

            <span class="text-sm font-bold text-center">
              首次開播
            </span>

          </div>

          <!-- BADGE -->
          <div class="flex flex-col items-center gap-4 w-32">

            <div class="w-20 h-20 rounded-full bg-sky-100 flex items-center justify-center text-sky-700">
              <span class="material-symbols-outlined text-4xl">
                trending_up
              </span>
            </div>

            <span class="text-sm font-bold text-center">
              熱門直播排行
            </span>

          </div>

        </div>

      </section>

    </div>

  </main>

  <!-- FOOTER -->
  <footer class="border-t border-slate-200 mt-24 bg-white">

    <div class="max-w-7xl mx-auto px-8 py-12 flex flex-col md:flex-row items-center justify-between gap-4">

      <div class="flex flex-col gap-2 items-center md:items-start">

        <span class="font-bold text-lg">
          AquaStream
        </span>

        <span class="text-xs text-slate-500">
          © 2026 AquaStream Live Aquarium Platform
        </span>

      </div>

      <div class="flex gap-8 text-sm text-slate-500">

        <a href="#" class="hover:text-teal-700 transition">
          About
        </a>

        <a href="#" class="hover:text-teal-700 transition">
          Privacy
        </a>

        <a href="#" class="hover:text-teal-700 transition">
          Contact
        </a>

      </div>

    </div>

  </footer>

</body>
</html>