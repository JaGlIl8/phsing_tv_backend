<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>AquaStream | 系統管理中心</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary-fixed": "#6af2de",
                        "error-container": "#fb5151",
                        "tertiary-container": "#20c0ff",
                        "on-primary": "#c0fff3",
                        "surface-dim": "#d0d5d8",
                        "on-secondary-fixed-variant": "#006765",
                        "on-error-container": "#570008",
                        "error-dim": "#9f0519",
                        "primary-container": "#6af2de",
                        "inverse-on-surface": "#9a9d9f",
                        "surface": "#f5f7f9",
                        "on-surface-variant": "#595c5e",
                        "secondary-fixed": "#38fbf7",
                        "on-error": "#ffefee",
                        "on-primary-fixed": "#00443c",
                        "primary-fixed-dim": "#5ae4d0",
                        "tertiary-fixed-dim": "#00b2ee",
                        "inverse-surface": "#0b0f10",
                        "secondary-container": "#38fbf7",
                        "outline": "#747779",
                        "secondary": "#006765",
                        "on-primary-container": "#00594f",
                        "surface-variant": "#d9dde0",
                        "outline-variant": "#abadaf",
                        "primary-dim": "#005a50",
                        "surface-container-low": "#eef1f3",
                        "on-primary-fixed-variant": "#006359",
                        "surface-tint": "#00675d",
                        "surface-container-lowest": "#ffffff",
                        "secondary-dim": "#005958",
                        "error": "#b31b25",
                        "surface-bright": "#f5f7f9",
                        "tertiary": "#006286",
                        "on-secondary-container": "#005c5a",
                        "on-secondary-fixed": "#004746",
                        "tertiary-fixed": "#20c0ff",
                        "surface-container-high": "#dfe3e6",
                        "on-secondary": "#bcfffc",
                        "surface-container": "#e5e9eb",
                        "on-tertiary": "#e7f5ff",
                        "on-tertiary-fixed-variant": "#004059",
                        "on-background": "#2c2f31",
                        "on-tertiary-fixed": "#001e2b",
                        "on-tertiary-container": "#00374d",
                        "background": "#f5f7f9",
                        "on-surface": "#2c2f31",
                        "secondary-fixed-dim": "#10ece8",
                        "inverse-primary": "#6df5e1",
                        "surface-container-highest": "#d9dde0",
                        "primary": "#00675d",
                        "tertiary-dim": "#005675"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.5rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Manrope"],
                        "display": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            background-color: #f5f7f9;
            color: #2c2f31;
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3 {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-surface text-on-surface">
    <div class="relative flex h-auto min-h-screen w-full flex-col bg-surface group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">

            <!-- Shared Header Component: 整合 Session 邏輯 -->
            <header
                class="flex items-center justify-between whitespace-nowrap border-b border-solid border-outline-variant/15 bg-surface-container-lowest px-10 py-3 sticky top-0 z-50">
                <div class="flex items-center gap-4 text-primary">
                    <div class="size-8">
                    </div>
                    <a href="{{ route('home') }}"
                        class="text-on-surface text-lg font-extrabold leading-tight tracking-[-0.015em] hover:text-primary transition-colors">
                        AquaStream 系統管理
                    </a>
                </div>

                <div class="flex flex-1 justify-end gap-6 items-center">
                    <!-- 搜尋框 -->
                    <label class="flex flex-col min-w-40 h-10 max-w-64">
                        <div
                            class="flex w-full flex-1 items-stretch rounded-lg h-full bg-surface-container-low border border-outline-variant/10">
                            <div class="text-on-surface-variant flex items-center justify-center pl-4 rounded-l-lg">
                                <span class="material-symbols-outlined text-sm">search</span>
                            </div>
                            <input
                                class="form-input flex w-full min-w-0 flex-1 border-none bg-transparent focus:ring-0 text-on-surface placeholder:text-on-surface-variant px-4 text-sm"
                                placeholder="搜尋..." />
                        </div>
                    </label>

                    @if(session('user_id'))
                        <!-- 已登入狀態：顯示用戶與登出 -->
                        <div class="flex items-center gap-4 border-l border-outline-variant/20 pl-6">
                            <div class="flex flex-col items-end">
                                <span class="text-xs font-bold text-primary uppercase tracking-tighter">Administrator</span>
                                <span class="text-sm font-bold text-on-surface">{{ session('user_name') }}</span>
                            </div>

                            <form action="{{ route('logout.submit') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit"
                                    class="flex items-center justify-center rounded-lg h-10 w-10 bg-error/10 text-error hover:bg-error hover:text-white transition-all shadow-sm">
                                    <span class="material-symbols-outlined">logout</span>
                                </button>
                            </form>

                            <!-- 頭像 -->
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 border-2 border-primary-fixed"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAb-wiQKM6QuQm_busFeuMBOOfTWS_lSchPHH3wOiANd3glDPzwhstWjeTM76EpPRrZYYCvj50nujUVHRrmeUrOgIOl0AwoVgb_JBG2Svvta2zMSc_n_tYzbPRQ9Dbx5O5XGil0lU8GP74r-fXzJy_3MUor8HcN-ZEnaXmgHEDy8MrijuXVgsDHeohH07qyjL4ce5vadR4pgGJs0AhwR7e4hGaT1ZdbWJEaFAOVq_sy7Jo2Xn24AMz_pu0ixwIzoCD4_TK9nhu1Frnt");'>
                            </div>
                        </div>
                    @else
                        <!-- 未登入狀態 -->
                        <a href="{{ route('login.view') }}"
                            class="bg-primary text-on-primary px-6 py-2 rounded-lg text-sm font-bold shadow-md hover:bg-primary-dim transition-all">
                            管理員登入
                        </a>
                    @endif
                </div>
            </header>

            <main class="flex-1 px-40 py-10 max-w-[1440px] mx-auto w-full">
                <!-- Hero Title -->
                <div class="flex flex-col gap-2 mb-10">
                    <span class="text-primary font-bold tracking-[0.05em] uppercase text-xs font-label">Administrative
                        Overview</span>
                    <h1 class="text-on-surface text-4xl font-black leading-tight tracking-[-0.033em]">
                        <strong>系統管理</strong>
                    </h1>
                    <p class="text-on-surface-variant text-base font-normal max-w-2xl">歡迎回來，在此管理使用者權限、監控即時水族箱狀況與報告。</p>
                </div>

                <!-- Section 1: User Account Management -->
                <section class="mb-12">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-on-surface text-2xl font-bold tracking-tight">用戶帳號管理</h2>
                        <button
                            class="bg-primary text-on-primary px-4 py-2 rounded-lg text-sm font-bold shadow-sm hover:bg-primary-dim transition-colors">新增用戶</button>
                    </div>
                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_10px_30px_rgba(0,103,93,0.05)] border border-outline-variant/10">
                        <table class="w-full text-left">
                            <thead class="bg-surface-container-low">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-xs font-semibold text-on-surface-variant uppercase tracking-wider">
                                        用戶 ID</th>
                                    <th
                                        class="px-6 py-4 text-xs font-semibold text-on-surface-variant uppercase tracking-wider">
                                        姓名</th>
                                    <th
                                        class="px-6 py-4 text-xs font-semibold text-on-surface-variant uppercase tracking-wider">
                                        角色</th>
                                    <th
                                        class="px-6 py-4 text-xs font-semibold text-on-surface-variant uppercase tracking-wider">
                                        狀態</th>
                                    <th
                                        class="px-6 py-4 text-xs font-semibold text-on-surface-variant uppercase tracking-wider">
                                        操作</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/10">
                                <tr class="hover:bg-surface-container-low/50 transition-colors">
                                    <td class="px-6 py-5 text-sm font-medium text-primary">#STU-9402</td>
                                    <td class="px-6 py-5 text-sm font-semibold text-on-surface">張小明</td>
                                    <td class="px-6 py-5"><span
                                            class="px-3 py-1 text-xs font-bold rounded-full bg-primary-container text-on-primary-container">管理員</span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-2 text-sm text-on-surface"><span
                                                class="size-2 rounded-full bg-emerald-500"></span> 啟用中</div>
                                    </td>
                                    <td class="px-6 py-5 text-on-surface-variant cursor-pointer"><span
                                            class="material-symbols-outlined text-lg">more_vert</span></td>
                                </tr>
                                <!-- 其他行... -->
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Section 2: Aquarium Inventory List -->
                <section class="mb-12">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-on-surface text-2xl font-bold tracking-tight">水族箱庫存清單</h2>
                        <div class="flex gap-4">
                            <span
                                class="flex items-center gap-2 text-sm font-medium text-on-surface-variant cursor-pointer hover:text-primary">
                                <span class="material-symbols-outlined text-sm">filter_list</span> 篩選條件
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Tank Card 1 -->
                        <div
                            class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_10px_30px_rgba(0,103,93,0.03)] border border-outline-variant/10 group hover:border-primary/30 transition-all">
                            <div class="h-40 bg-cover bg-center"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB5Pl1Z2ws_BkGX8zy1gymkPV2MZbCaX95gWpaefA6AntDzDukXZ1ciGUZOnM-X9kSzxbtl_Q8ELqkzoE2kblb8ts1TMmiUHDW0hgIrKPm6DTmHYNORXaauNnzhie4lvm3keEw-x1USGGHWIgALUVlOsAGBBbdcIRfa9NRn5ZHfWnwUNIXbnabenjJ1fWA2RCDiIkGjXSdHwWm38sTMuhzHOLJALIR-p-8SgOyKkYRuUk95ikEVmmQjXjL4PSroSB5Kq0r4VXfHeyr8");'>
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-lg font-bold text-on-surface">亞馬遜流域</h3>
                                    <span
                                        class="px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider rounded bg-tertiary-container text-on-tertiary-container">熱帶</span>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <div class="flex items-center gap-1 text-primary">
                                        <span class="material-symbols-outlined text-base">visibility</span>
                                        <span class="text-sm font-bold">12,402</span>
                                    </div>
                                    <button
                                        class="text-primary text-sm font-bold flex items-center gap-1 hover:underline">查看詳情
                                        <span class="material-symbols-outlined text-sm">arrow_forward</span></button>
                                </div>
                            </div>
                        </div>
                        <!-- 卡片 2 & 3 略... -->
                    </div>
                </section>

                <!-- Section 3: Revenue Reports -->
                <section class="mb-12">
                    <div class="mb-6">
                        <h2 class="text-on-surface text-2xl font-bold tracking-tight">營收數據報告</h2>
                        <p class="text-on-surface-variant text-sm">基於遊客捐贈與互動餵食數據的公式化統計</p>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-2 space-y-4">
                            <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant/10">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="font-bold text-on-surface">水族箱個別營收細目</h3>
                                    <span class="text-xs text-on-surface-variant">2026年 5月</span>
                                </div>
                                <div class="space-y-4">
                                    <div class="p-4 rounded-lg bg-surface-container-low/40">
                                        <div class="flex justify-between mb-2">
                                            <span class="font-semibold text-on-surface">亞馬遜流域</span>
                                            <span class="font-bold text-primary">$15,450 TWD</span>
                                        </div>
                                        <div
                                            class="flex items-center gap-2 text-[11px] font-mono text-on-surface-variant">
                                            <span class="bg-surface-container-high px-2 py-0.5 rounded">基礎捐贈:
                                                $10,000</span>
                                            <span>+</span>
                                            <span class="bg-surface-container-high px-2 py-0.5 rounded">互動乘數:
                                                1.5x</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-6">
                            <div class="bg-primary p-8 rounded-xl text-on-primary shadow-lg shadow-primary/20">
                                <p class="text-xs font-bold uppercase tracking-widest opacity-80 mb-2">Consolidated
                                    Total Revenue</p>
                                <h2 class="text-4xl font-black mb-1">$48,250</h2>
                                <p class="text-sm opacity-90">本月合併總營收 (TWD)</p>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <footer class="border-t border-outline-variant/10 bg-surface-container-low px-40 py-8 text-center">
                <div class="flex flex-col items-center gap-4">
                    <div class="flex items-center gap-2 text-primary/60">
                        <svg class="size-5" fill="currentColor" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0799 24L4 19.2479L9.95537 8.75216L18.04 13.4961L18.0446 4H29.9554L29.96 13.4961L38.0446 8.75216L44 19.2479L35.92 24L44 28.7521L38.0446 39.2479L29.96 34.5039L29.9554 44H18.0446L18.04 34.5039L9.95537 39.2479L4 28.7521L12.0799 24Z">
                            </path>
                        </svg>
                        <span class="text-sm font-bold tracking-widest uppercase">AquaStream Admin</span>
                    </div>
                    <p class="text-xs text-on-surface-variant">© 2026 AquaStream 海洋研究中心. 僅供學術管理用途使用。</p>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>