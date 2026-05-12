<!DOCTYPE html>
<html class="light" lang="zh-Hant">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <!-- 標題已修改 -->
    <title>AquaStream | 生態系統管理後台</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-dim": "#005958",
                        "on-primary": "#c0fff3",
                        "error-container": "#fb5151",
                        "on-secondary-container": "#005c5a",
                        "secondary-fixed-dim": "#10ece8",
                        "on-surface": "#2c2f31",
                        "surface-container": "#e5e9eb",
                        "secondary": "#006765",
                        "surface-tint": "#00675d",
                        "surface-bright": "#f5f7f9",
                        "primary-dim": "#005a50",
                        "on-tertiary-container": "#00374d",
                        "on-error-container": "#570008",
                        "error-dim": "#9f0519",
                        "on-secondary-fixed-variant": "#006765",
                        "on-primary-container": "#00594f",
                        "on-secondary": "#bcfffc",
                        "on-tertiary-fixed-variant": "#004059",
                        "tertiary": "#006286",
                        "primary": "#00675d",
                        "on-surface-variant": "#595c5e",
                        "background": "#f5f7f9",
                        "surface-variant": "#d9dde0",
                        "on-primary-fixed": "#00443c",
                        "surface-container-high": "#dfe3e6",
                        "tertiary-container": "#20c0ff",
                        "on-background": "#2c2f31",
                        "tertiary-dim": "#005675",
                        "primary-fixed": "#6af2de",
                        "error": "#b31b25",
                        "outline": "#747779",
                        "tertiary-fixed-dim": "#00b2ee",
                        "inverse-surface": "#0b0f10",
                        "tertiary-fixed": "#20c0ff",
                        "secondary-container": "#38fbf7",
                        "surface-container-highest": "#d9dde0",
                        "on-tertiary": "#e7f5ff",
                        "primary-fixed-dim": "#5ae4d0",
                        "on-tertiary-fixed": "#001e2b",
                        "surface": "#f5f7f9",
                        "primary-container": "#6af2de",
                        "outline-variant": "#abadaf",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-fixed-variant": "#006359",
                        "on-secondary-fixed": "#004746",
                        "on-error": "#ffefee",
                        "surface-container-low": "#eef1f3",
                        "inverse-on-surface": "#9a9d9f",
                        "inverse-primary": "#6df5e1",
                        "secondary-fixed": "#38fbf7",
                        "surface-dim": "#d0d5d8"
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f5f7f9; color: #2c2f31; }
        h1, h2, h3, .headline { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .glass-effect { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); }
    </style>
</head>

<body class="bg-background text-on-background min-h-screen pb-20">
    <!-- TopNavBar: 整合 Session 登入邏輯 -->
    <header class="sticky top-0 z-50 glass-effect border-b border-slate-100 dark:border-slate-800">
        <nav class="flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">
            <div class="flex items-center gap-2">
                <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tighter text-teal-700 hover:text-blue-600 transition-all cursor-pointer">
                    PheeShing.TV
                </a>
            </div>
            
            <div class="flex items-center gap-6">
                <a class="flex items-center gap-1 text-slate-600 hover:text-teal-600 transition-colors text-sm font-medium" href="{{ route('home') }}">
                    <span class="material-symbols-outlined text-lg">arrow_back</span>
                    回到首頁
                </a>

                @if(session('user_id'))
                    <!-- 已登入狀態 -->
                    <div class="flex items-center gap-4 bg-slate-50 px-3 py-2 rounded-lg border border-slate-200">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-slate-600">account_circle</span>
                            <span class="text-slate-700 font-medium text-sm">嗨, {{ session('user_name') }}</span>
                        </div>
                        <form action="{{ route('logout.submit') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="text-xs text-red-500 hover:bg-red-50 px-2 py-1 rounded transition-colors font-bold">
                                登出
                            </button>
                        </form>
                    </div>
                @else
                    <!-- 未登入狀態 -->
                    <a href="{{ route('login.view') }}" class="bg-primary text-on-primary px-5 py-2 rounded-lg font-semibold hover:opacity-80 transition-opacity">
                        登入
                    </a>
                @endif
            </div>
        </nav>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <!-- Eyebrow & Hero Title: 已修改相關內容 -->
        <div class="mb-12">
            <span class="font-label text-xs font-bold tracking-widest text-primary uppercase block mb-2">儀錶板</span>
            <h1 class="font-display text-4xl md:text-5xl font-extrabold tracking-tight text-on-surface mb-4">水族數據監測中心</h1>
            <p class="text-on-surface-variant max-w-2xl">即時監控水缸的各項數值或手動控制，追蹤循環。</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Manual Controls (左側欄位) -->
            <aside class="lg:col-span-4 space-y-6">
                <div class="bg-surface-container-lowest p-8 rounded-xl ring-1 ring-outline-variant/15 flex flex-col gap-8">
                    <div>
                        <h3 class="font-headline text-lg font-bold mb-6">手動控制項</h3>
                        <button class="w-full bg-primary text-on-primary py-4 px-6 rounded-lg font-bold flex items-center justify-center gap-3 shadow-[inset_0_-2px_0_rgba(0,0,0,0.1)] hover:bg-primary-dim transition-all active:translate-y-0.5">
                            <span class="material-symbols-outlined">restaurant</span>
                            手動餵食
                        </button>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-surface-container-low rounded-lg">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">light_mode</span>
                                <span class="font-medium text-sm">主照明系統</span>
                            </div>
                            <span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-xs font-bold rounded-full">運行中</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-surface-container-low rounded-lg">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">water_drop</span>
                                <span class="font-medium text-sm">過濾單元</span>
                            </div>
                            <span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-xs font-bold rounded-full">運行中</span>
                        </div>
                    </div>
                </div>
                
                <!-- 裝飾圖片 -->
                <div class="relative overflow-hidden rounded-xl h-64">
                    <img class="absolute inset-0 w-full h-full object-cover" alt="Aquarium reef" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDUk-5LzkeL43cI5d0OL9rIMv4A5nZpKs8fUaeAYRDFy_CqykzoYTRDRjHLyZkNOL2NEiOnRId1LDTZVxLB4H6trsyKCyIZ70BME2l9YRGT1RG3P72Uu2xFkTLTHU89IYISkMOcGgGnBtzQGQLRcGDHVQW91zwy3IQgxVt9mDpPG8lLSJ403JnPbQQd8Qgmwx3qOZRK0MsMkNclDC43AB_NbBGa1peCx5u3bxZatctB7qA4g0sqSRF3zhBoT3vKk8jYQelqLd8IQYER"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col justify-end p-6">
                        <span class="text-white font-headline font-bold text-lg">主珊瑚缸</span>
                        <span class="text-white/80 text-sm">即時影像串流</span>
                    </div>
                </div>
            </aside>

            <!-- Data & History (右側主內容) -->
            <div class="lg:col-span-8 space-y-8">
                <section>
                    <div class="flex justify-between items-end mb-6">
                        <h2 class="font-headline text-2xl font-bold">感測器歷史數據</h2>
                        <span class="text-xs text-primary font-bold uppercase tracking-tighter">最後 24 小時</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- 溫度卡片 -->
                        <div class="bg-surface-container-lowest p-6 rounded-xl ring-1 ring-outline-variant/15">
                            <div class="flex justify-between items-start mb-4">
                                <span class="material-symbols-outlined text-primary-dim p-2 bg-primary-container/30 rounded-lg">thermostat</span>
                                <span class="text-xs font-bold text-secondary">+0.2°</span>
                            </div>
                            <p class="text-xs font-label text-on-surface-variant mb-1">溫度</p>
                            <h4 class="text-3xl font-bold headline mb-4">25.4°C</h4>
                            <div class="h-12 flex items-end gap-1">
                                <div class="w-full bg-primary-fixed-dim h-[40%] rounded-t-sm"></div>
                                <div class="w-full bg-primary h-[80%] rounded-t-sm"></div>
                                <div class="w-full bg-primary-fixed-dim h-[55%] rounded-t-sm"></div>
                            </div>
                        </div>
                        <!-- pH 卡片 -->
                        <div class="bg-surface-container-lowest p-6 rounded-xl ring-1 ring-outline-variant/15">
                            <div class="flex justify-between items-start mb-4">
                                <span class="material-symbols-outlined text-tertiary p-2 bg-tertiary-container/20 rounded-lg">science</span>
                                <span class="text-xs font-bold text-error-dim">-0.1</span>
                            </div>
                            <p class="text-xs font-label text-on-surface-variant mb-1">pH 值</p>
                            <h4 class="text-3xl font-bold headline mb-4">8.2</h4>
                            <div class="h-12 flex items-end gap-1">
                                <div class="w-full bg-tertiary-fixed h-[80%] rounded-t-sm"></div>
                                <div class="w-full bg-tertiary h-[65%] rounded-t-sm"></div>
                                <div class="w-full bg-tertiary-fixed h-[58%] rounded-t-sm"></div>
                            </div>
                        </div>
                        <!-- 硝酸鹽卡片 -->
                        <div class="bg-surface-container-lowest p-6 rounded-xl ring-1 ring-outline-variant/15">
                            <div class="flex justify-between items-start mb-4">
                                <span class="material-symbols-outlined text-secondary-dim p-2 bg-secondary-container/30 rounded-lg">bubble_chart</span>
                                <span class="text-xs font-bold text-primary">穩定</span>
                            </div>
                            <p class="text-xs font-label text-on-surface-variant mb-1">硝酸鹽 (NO3)</p>
                            <h4 class="text-3xl font-bold headline mb-4">5 ppm</h4>
                            <div class="h-12 flex items-end gap-1">
                                <div class="w-full bg-secondary-fixed h-[30%] rounded-t-sm"></div>
                                <div class="w-full bg-secondary h-[30%] rounded-t-sm"></div>
                                <div class="w-full bg-secondary-fixed h-[30%] rounded-t-sm"></div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- 表格部分 -->
                <section class="bg-surface-container-lowest rounded-xl ring-1 ring-outline-variant/15 overflow-hidden">
                    <div class="p-8 border-b border-surface-container">
                        <h2 class="font-headline text-2xl font-bold">歷史操作紀錄</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-surface-container-low text-on-surface-variant text-xs uppercase font-label tracking-wider">
                                <tr>
                                    <th class="px-8 py-4 font-bold">執行者</th>
                                    <th class="px-8 py-4 font-bold">類型</th>
                                    <th class="px-8 py-4 font-bold">動作</th>
                                    <th class="px-8 py-4 font-bold">時間</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-surface-container">
                                <tr class="hover:bg-surface-container-low transition-colors">
                                    <td class="px-8 py-6 font-medium">系統自動</td>
                                    <td class="px-8 py-6">例行</td>
                                    <td class="px-8 py-6">
                                        <span class="flex items-center gap-2">
                                            <span class="w-2 h-2 bg-primary rounded-full"></span>
                                            標準餵食
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 text-on-surface-variant">2 分鐘前</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>
</html>