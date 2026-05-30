<!DOCTYPE html>
<html class="light" lang="zh-Hant">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>PheeShing.TV | 圓盤魚餵食秀</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Inter:wght@400;500;600&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
    rel="stylesheet" />
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          "colors": {
            "error-container": "#fb5151",
            "on-error-container": "#570008",
            "inverse-primary": "#6df5e1",
            "outline": "#747779",
            "surface-bright": "#f5f7f9",
            "surface-container-low": "#eef1f3",
            "secondary-fixed-dim": "#10ece8",
            "primary-fixed": "#6af2de",
            "on-tertiary-fixed": "#001e2b",
            "primary-dim": "#005a50",
            "primary": "#00675d",
            "on-secondary-fixed-variant": "#006765",
            "inverse-surface": "#0b0f10",
            "tertiary-fixed": "#20c0ff",
            "on-tertiary": "#e7f5ff",
            "surface-variant": "#d9dde0",
            "on-secondary": "#bcfffc",
            "on-primary-fixed-variant": "#006359",
            "on-primary-container": "#00594f",
            "inverse-on-surface": "#9a9d9f",
            "secondary": "#006765",
            "error-dim": "#9f0519",
            "error": "#b31b25",
            "tertiary-container": "#20c0ff",
            "surface-container-lowest": "#ffffff",
            "on-tertiary-fixed-variant": "#004059",
            "secondary-fixed": "#38fbf7",
            "on-primary": "#c0fff3",
            "on-secondary-container": "#005c5a",
            "tertiary-dim": "#005675",
            "on-background": "#2c2f31",
            "tertiary": "#006286",
            "surface-container": "#e5e9eb",
            "surface-container-high": "#dfe3e6",
            "primary-container": "#6af2de",
            "tertiary-fixed-dim": "#00b2ee",
            "outline-variant": "#abadaf",
            "surface-dim": "#d0d5d8",
            "secondary-container": "#38fbf7",
            "on-error": "#ffefee",
            "on-surface-variant": "#595c5e",
            "on-surface": "#2c2f31",
            "on-secondary-fixed": "#004746",
            "on-tertiary-container": "#00374d",
            "on-primary-fixed": "#00443c",
            "secondary-dim": "#005958",
            "surface-container-highest": "#d9dde0",
            "surface-tint": "#00675d",
            "background": "#f5f7f9",
            "surface": "#f5f7f9",
            "primary-fixed-dim": "#5ae4d0"
          },
        },
      },
    }
  </script>
  <style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }

    body {
      font-family: 'Inter', sans-serif;
    }

    h1,
    h2,
    h3 {
      font-family: 'Manrope', sans-serif;
    }

    .glass-nav {
      background-color: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(12px);
    }
  </style>
</head>

<body class="bg-surface text-on-background min-h-screen flex flex-col pb-10">
  
  <!-- [LAYOUT] Top Navigation Area -->
  <header class="sticky top-0 z-50 glass-nav border-b border-outline-variant/30 shadow-sm">
    <div class="flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">
      <div class="flex items-center gap-8">
        <a href="{{ route('home') }}"
          class="text-2xl font-extrabold tracking-tighter text-primary hover:text-blue-600 transition-all duration-300 cursor-pointer">
          PheeShing.TV
        </a>
        <nav class="hidden md:flex gap-6">
          <a href='/'
            class="text-on-surface-variant font-medium hover:text-primary transition-colors px-3 py-1 rounded cursor-pointer">首頁</a>
        </nav>
      </div>
      @if(session('user_id'))
        <div class="flex items-center gap-4 bg-surface-container-highest px-4 py-2.5 rounded-lg border border-outline-variant/30">
          <div class="flex items-center gap-2 flex-1">
            <span class="material-symbols-outlined text-on-surface-variant text-[20px]">account_circle</span>
            <span class="text-on-surface font-medium text-sm">嗨, {{session('user_name')}}</span>
          </div>
          <div class="w-[1px] h-4 bg-outline-variant/50 mx-1"></div>
          <form action="{{ route('logout.submit') }}" method="POST">
            @csrf
            <button type="submit"
              class="text-sm font-medium text-error hover:bg-error-container/20 px-2 py-1 rounded transition-colors">
              登出
            </button>
          </form>
        </div>
      @else
        <a href="{{ route('login.view') }}"
          class="bg-primary text-white font-medium px-6 py-2 rounded-full hover:bg-primary-hover transition-all active:scale-95 shadow-sm">
          登入
        </a>
      @endif
    </div>
  </header>

  <!-- [LAYOUT] Middle Content Area -->
  <main class="flex-grow max-w-7xl mx-auto w-full p-6 lg:p-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
      
      <!-- Video & Info Player -->
      <div class="lg:col-span-8 flex flex-col gap-6">
        
        <!-- Video Section -->
        <div class="relative aspect-video bg-inverse-surface rounded-xl overflow-hidden shadow-sm group">
          <video id="videoPlayer" class="w-full h-full object-cover bg-black" controls>
            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
            您的瀏覽器不支援影片播放。
          </video>

          <!-- Live Indicators -->
          <div class="absolute top-4 left-4 flex items-center gap-2 pointer-events-none">
            <span class="flex h-3 w-3 relative">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-error opacity-75"></span>
              <span class="relative inline-flex rounded-full h-3 w-3 bg-error"></span>
            </span>
            <span class="bg-black/60 backdrop-blur-md text-white text-xs font-bold px-2 py-1 rounded uppercase tracking-wider shadow-sm">Live</span>
            <span class="bg-black/60 backdrop-blur-md text-white text-xs font-medium px-2 py-1 rounded flex items-center gap-1 shadow-sm">
              <span class="material-symbols-outlined text-[14px]">visibility</span>
              <span id="viewerCount">67</span>
            </span>
          </div>
        </div>

        <!-- Content Header -->
        <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
          <div class="space-y-2">
            <!-- [Content Awareness] Changed Title to actual stream title -->
            <h1 class="text-2xl md:text-3xl font-extrabold text-on-background tracking-tight leading-tight">圓盤魚與霓虹燈魚的療癒餵食時光</h1>
            
            <!-- Enlarged Species Chips -->
            <div class="flex flex-wrap gap-2 items-center">
              <span class="text-sm font-bold text-on-surface-variant uppercase mr-1">分類:</span>
              <span class="bg-surface-container-high text-on-surface hover:bg-primary hover:text-white cursor-pointer px-3 py-1 rounded-md text-xs font-semibold transition-colors shadow-sm border border-outline-variant/20">圓盤魚</span>
              <span class="bg-surface-container-high text-on-surface hover:bg-primary hover:text-white cursor-pointer px-3 py-1 rounded-md text-xs font-semibold transition-colors shadow-sm border border-outline-variant/20">霓虹燈魚</span>
              <span class="bg-surface-container-high text-on-surface hover:bg-primary hover:text-white cursor-pointer px-3 py-1 rounded-md text-xs font-semibold transition-colors shadow-sm border border-outline-variant/20">亞馬遜劍草</span>
            </div>
          </div>
          
          <div class="flex gap-3 shrink-0">
            <!-- Minimal User Effort: Share button -->
            <button
              class="flex items-center gap-2 bg-surface-container-low text-on-surface px-4 py-2.5 rounded-lg font-semibold text-sm transition-colors hover:bg-surface-container shadow-sm border border-outline-variant/20 h-fit"
              onclick="copyLink()">
              <span class="material-symbols-outlined text-[20px]">share</span> 分享
            </button>
          </div>
        </div>

        <!-- [UPDATE: User Experience & Content Awareness] Creator Profile & Bio Area -->
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl border border-outline-variant/20 shadow-sm flex flex-col sm:flex-row gap-5 items-start relative mt-2">
            
            <!-- Creator Avatar & Link -->
            <div class="flex flex-col items-center gap-3 shrink-0 sm:w-28">
                <a href="./profile" class="relative group block" title="前往實況主個人頁面">
                    <img class="w-20 h-20 rounded-full border-[3px] border-surface-container-lowest outline outline-2 outline-primary object-cover shadow-sm group-hover:scale-105 transition-transform duration-300" src="https://i.pravatar.cc/150?img=11" alt="亞洲統神 Avatar">
                    <!-- Hover Overlay for UX feedback -->
                    <div class="absolute inset-0 rounded-full bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>
                </a>
                
                <!-- Explicit CTA Link -->
                <a href="./profile" class="w-full text-center bg-primary-container text-on-primary-container text-[11px] font-bold px-3 py-1.5 rounded-md hover:bg-primary hover:text-white transition-colors flex items-center justify-center gap-1 shadow-sm">
                    前往頻道 <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                </a>
            </div>

            <!-- Bio Content -->
            <div class="flex-1 flex flex-col justify-center">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-xl font-extrabold text-on-surface flex items-center gap-1.5">
                        <a href="./profile" class="hover:text-primary transition-colors">亞洲統神</a>
                        <span class="material-symbols-outlined text-primary text-[20px]" title="官方認證實況主">verified</span>
                    </h3>
                    <button class="hidden sm:flex items-center gap-1 text-sm font-bold text-primary hover:text-primary-dim transition-colors px-3 py-1 bg-teal-50 rounded-full">
                        <span class="material-symbols-outlined text-[16px]">add</span> 追蹤
                    </button>
                </div>
                
                <p class="text-sm md:text-base text-on-surface-variant leading-relaxed">
                    致力於推廣統神的健康狀況，養殖專家親自把關。希望在繁忙的生活中，為大家提供一個可以沉澱心靈的放鬆角落。歡迎在聊天室中與各方同好交流飼養心得！
                </p>
            </div>
        </div>
      </div>

      <!-- Sidebar: Chat Room -->
      <div class="lg:col-span-4 flex flex-col h-[700px] bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm border border-outline-variant/20">
        <div class="p-4 border-b border-outline-variant/20 flex items-center justify-between bg-surface-container-low">
          <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">forum</span>
            <h2 class="font-bold text-on-surface">聊天室</h2>
          </div>
          <span class="text-xs font-bold text-on-surface-variant flex items-center gap-1">
              <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span> 即時連線
          </span>
        </div>

        <!-- Messages List -->
        <div id="messagesList" class="flex-grow overflow-y-auto p-4 space-y-3 bg-surface/50">
          <!-- Messages will be dynamically added here -->
        </div>

        <!-- Input Area -->
        <div class="p-4 bg-surface-container-lowest border-t border-outline-variant/20">
          <div class="relative">
            <textarea id="observationInput"
              class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg text-sm p-3 pr-12 focus:ring-2 focus:ring-primary/40 focus:border-primary resize-none h-16 placeholder:text-outline-variant shadow-inner transition-all outline-none"
              placeholder="跟大家聊聊天吧..."></textarea>
            <button id="sendBtn"
              class="absolute right-2 bottom-2 p-1.5 bg-primary text-white rounded-md flex items-center justify-center hover:bg-primary-hover active:scale-95 transition-all shadow-sm">
              <span class="material-symbols-outlined text-[18px]">send</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Metric Bento Grid -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
      <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between border border-outline-variant/20 shadow-sm hover:shadow-md transition-shadow">
        <span class="text-xs font-bold font-label uppercase tracking-widest text-on-surface-variant flex items-center gap-1 mb-2">
            <span class="material-symbols-outlined text-[16px]">device_thermostat</span> 溫度
        </span>
        <div class="flex items-baseline gap-2">
          <span id="tempValue" class="text-4xl font-extrabold text-on-surface">26.5</span>
          <span class="text-lg font-bold text-primary">°C</span>
        </div>
        <div class="w-full bg-surface-container-highest h-2 rounded-full mt-3 overflow-hidden">
          <div id="tempBar" class="bg-primary h-full w-[85%] transition-all duration-500 ease-out"></div>
        </div>
      </div>

      <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between border border-outline-variant/20 shadow-sm hover:shadow-md transition-shadow">
        <span class="text-xs font-bold font-label uppercase tracking-widest text-on-surface-variant flex items-center gap-1 mb-2">
            <span class="material-symbols-outlined text-[16px]">water_drop</span> PH值
        </span>
        <div class="flex items-baseline gap-2">
          <span id="phValue" class="text-4xl font-extrabold text-on-surface">6.8</span>
          <span class="text-lg font-bold text-secondary">pH</span>
        </div>
        <div class="w-full bg-surface-container-highest h-2 rounded-full mt-3 overflow-hidden">
          <div id="phBar" class="bg-secondary h-full w-[60%] transition-all duration-500 ease-out"></div>
        </div>
      </div>

      <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between border border-outline-variant/20 shadow-sm hover:shadow-md transition-shadow">
        <span class="text-xs font-bold font-label uppercase tracking-widest text-on-surface-variant flex items-center gap-1 mb-2">
            <span class="material-symbols-outlined text-[16px]">blur_on</span> 總溶解固體
        </span>
        <div class="flex items-baseline gap-2">
          <span id="nitrateValue" class="text-4xl font-extrabold text-on-surface">12</span>
          <span class="text-lg font-bold text-tertiary">ppm</span>
        </div>
        <div class="w-full bg-surface-container-highest h-2 rounded-full mt-3 overflow-hidden">
          <div id="nitrateBar" class="bg-tertiary h-full w-[40%] transition-all duration-500 ease-out"></div>
        </div>
      </div>

      <div class="bg-primary-container p-6 rounded-xl flex flex-col justify-between shadow-sm relative overflow-hidden">
        <div class="absolute -right-4 -bottom-4 opacity-10">
            <span class="material-symbols-outlined text-[120px]">health_and_safety</span>
        </div>
        <span class="text-xs font-bold font-label uppercase tracking-widest text-on-primary-container flex items-center gap-1 mb-2 relative z-10">
            <span class="material-symbols-outlined text-[16px]">monitoring</span> 魚缸狀況
        </span>
        <div class="flex items-baseline gap-2 relative z-10">
          <span id="healthStatus" class="text-4xl font-extrabold text-on-primary-container">良好</span>
        </div>
        <span class="text-xs font-bold text-on-primary-container/80 mt-2 flex items-center gap-1 relative z-10">
            <span class="material-symbols-outlined text-[14px]">schedule</span> 上線時間: 432 天
        </span>
      </div>
    </div>
  </main>

  <!-- [LAYOUT] Bottom Status Bar -->
  <footer class="fixed bottom-0 w-full bg-white border-t border-outline-variant px-6 py-2 flex justify-between items-center z-40 text-xs font-medium text-on-surface-variant shadow-[0_-2px_10px_rgba(0,0,0,0.02)]">
      <div class="flex items-center gap-4">
          <div class="flex items-center gap-1.5">
              <span class="flex h-2.5 w-2.5 relative">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-primary"></span>
              </span>
              <span>系統狀態: 正常連線中</span>
          </div>
          <span class="hidden sm:inline border-l border-outline-variant pl-4">線上使用者: 306 位</span>
      </div>
      <div class="flex gap-4">
          <a href="#" class="hover:text-primary transition-colors">關於我們</a>
          <a href="#" class="hover:text-primary transition-colors">服務條款</a>
      </div>
  </footer>

  <script>
    // ----- Demo Data (When not connected to backend) -----
    let messages = [
        { user: "管理員", time: "10:00 AM", text: "歡迎來到 PheeShing.TV！請遵守聊天室規範。" }
    ];

    function renderMessages() {
      const messagesList = document.getElementById('messagesList');
      if(messagesList) {
          messagesList.innerHTML = messages.map(msg => `
            <div class="bg-surface-container-lowest p-3 rounded-lg shadow-sm border border-outline-variant/10">
              <div class="flex justify-between items-center mb-1">
                <span class="text-xs font-bold text-teal-700">${msg.user}</span>
                <span class="text-[10px] text-outline">${msg.time}</span>
              </div>
              <p class="text-sm text-on-surface leading-snug">${msg.text}</p>
            </div>
          `).join('');
          messagesList.scrollTop = messagesList.scrollHeight;
      }
    }
    renderMessages();

    // ----- Metrics Update -----
    function updateMetrics() {
      const temp = (Math.random() * 2 - 1) + 26.5;
      const ph = (Math.random() * 0.5 - 0.25) + 6.8;
      const nitrate = (Math.random() * 4 - 2) + 12;

      document.getElementById('tempValue').textContent = temp.toFixed(1);
      document.getElementById('phValue').textContent = ph.toFixed(1);
      document.getElementById('nitrateValue').textContent = Math.round(nitrate);

      const tempPercent = (temp / 30) * 100;
      const phPercent = (ph / 8) * 100;
      const nitratePercent = (nitrate / 30) * 100;

      document.getElementById('tempBar').style.width = tempPercent + '%';
      document.getElementById('phBar').style.width = phPercent + '%';
      document.getElementById('nitrateBar').style.width = nitratePercent + '%';

      const viewers = Math.floor(Math.random() * 50) + 130;
      document.getElementById('viewerCount').textContent = viewers;
    }
    
    function copyLink() {
      const url = window.location.href;
      navigator.clipboard.writeText(url).then(() => {
        alert('連結已複製！');
      }).catch(() => {
        alert('複製失敗，請手動複製');
      });
    }

    // ----- UI clock update (Content Awareness) -----
    function updateClock() {
        const now = new Date();
        const clockElem = document.getElementById('systemClock');
        if(clockElem) {
            clockElem.textContent = now.toLocaleTimeString('zh-TW', { hour12: false });
        }
    }

    setInterval(updateMetrics, 5000);
    setInterval(updateClock, 1000);
    updateClock();
  </script>

  <!-- Server-Side API Script (Kept from original prompt) -->
  <script>
    async function fetchMessages() {
      try {
        const response = await fetch("{{ route('messages.get') }}");
        const messagesData = await response.json();
        const list = document.getElementById('messagesList');
        
        list.innerHTML = messagesData.map(msg => {
          const time = new Date(msg.created_at).toLocaleTimeString('zh-TW', { hour: '2-digit', minute: '2-digit' });
          const isMe = msg.user_name === "{{ session('user_name') }}";

          return `
            <div class="p-3 rounded-lg border border-outline-variant/10 ${isMe ? 'bg-teal-50/80 border-primary/20' : 'bg-surface-container-lowest'} shadow-sm transition-all">
                <div class="flex justify-between items-center mb-1">
                    <span class="text-xs font-bold ${isMe ? 'text-primary' : 'text-slate-700'}">${msg.user_name}</span>
                    <span class="text-[10px] text-outline-variant">${time}</span>
                </div>
                <p class="text-sm text-on-surface">${msg.content}</p>
            </div>
          `;
        }).join('');

        list.scrollTop = list.scrollHeight;
      } catch (e) { 
        // 捕捉未啟動伺服器時的錯誤
      }
    }

    async function sendMessage() {
      const input = document.getElementById('observationInput');
      const content = input.value.trim();
      if (!content) return;

      if (!"{{ session('user_id') }}") {
        if (!confirm("您目前以「訪客」身分發言，確定要傳送嗎？")) return;
      }

      try {
        const res = await fetch("{{ route('messages.store') }}", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}" 
          },
          body: JSON.stringify({ content: content })
        });

        if (res.ok) {
          input.value = ''; 
          fetchMessages(); 
        }
      } catch (e) { 
          const now = new Date();
          const timeStr = now.toLocaleTimeString('zh-TW', { hour: '2-digit', minute: '2-digit' });
          messages.push({ user: "Guest (Demo)", time: timeStr, text: content });
          renderMessages();
          input.value = '';
      }
    }

    document.getElementById('sendBtn').addEventListener('click', sendMessage);
    document.getElementById('observationInput').addEventListener('keypress', (e) => {
      if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
      }
    });

    fetchMessages();
    setInterval(fetchMessages, 3000);
  </script>
</body>
</html>