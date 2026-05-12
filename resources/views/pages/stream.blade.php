<!DOCTYPE html>
<html class="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>AquaStream | Amazonian Basin Exploration</title>
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
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
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
      background-color: rgba(255, 255, 255, 0.8);
      backdrop-filter: blur(12px);
    }
  </style>
</head>

<body class="bg-surface text-on-background min-h-screen flex flex-col">
  <!-- TopNavBar -->
  <header class="sticky top-0 z-50 glass-nav border-b border-slate-100 dark:border-slate-800">
    <div class="flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">
      <div class="flex items-center gap-8">
        <!-- <span class="text-2xl font-bold tracking-tight text-teal-700">AquaStream</span> -->
        <a href="{{ route('home') }}"
          class="text-2xl font-bold tracking-tighter text-teal-700 hover:text-blue-600 transition-all duration-300 cursor-pointer">
          PheeShing.TV
        </a>
        <nav class="hidden md:flex gap-6">
          <a href='/'
            class="text-slate-600 hover:bg-slate-50 transition-colors px-3 py-1 rounded cursor-pointer">Home</a>
          <!-- <a class="text-slate-600 hover:bg-slate-50 transition-colors px-3 py-1 rounded cursor-pointer">Lab Reports</a> -->
        </nav>
      </div>
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
    </div>
  </header>

  <main class="flex-grow max-w-7xl mx-auto w-full p-6 lg:p-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
      <!-- Main Content Area: Video Player -->
      <div class="lg:col-span-8 flex flex-col gap-6">
        <!-- Video Section -->
        <div class="relative aspect-video bg-inverse-surface rounded-xl overflow-hidden shadow-sm group">
          <video id="videoPlayer" class="w-full h-full object-cover bg-black" controls>
            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>

          <!-- Live Indicators -->
          <div class="absolute top-4 left-4 flex items-center gap-2 pointer-events-none">
            <span class="flex h-3 w-3 relative">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-error opacity-75"></span>
              <span class="relative inline-flex rounded-full h-3 w-3 bg-error"></span>
            </span>
            <span
              class="bg-black/50 backdrop-blur-md text-white text-xs font-bold px-2 py-1 rounded uppercase tracking-wider">Live</span>
            <span
              class="bg-black/50 backdrop-blur-md text-white text-xs font-medium px-2 py-1 rounded flex items-center gap-1">
              <span class="material-symbols-outlined text-[14px]">visibility</span>
              <span id="viewerCount">676767</span>
            </span>
          </div>
        </div>

        <!-- Content Header -->
        <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
          <div class="space-y-1">
            <h1 class="text-3xl font-extrabold text-on-background tracking-tight">釣魚網站</h1>
            <p class="text-on-surface-variant max-w-2xl leading-relaxed"></p>
          </div>
          <div class="flex gap-3 shrink-0">
            <button
              class="flex items-center gap-2 bg-surface-container-low text-on-surface px-4 py-2.5 rounded-lg font-semibold text-sm transition-colors hover:bg-surface-container"
              onclick="copyLink()">
              <span class="material-symbols-outlined text-[20px]">share</span> 複製連結
            </button>
            <!-- <button class="flex items-center gap-2 bg-primary text-on-primary px-4 py-2.5 rounded-lg font-semibold text-sm transition-all shadow-sm">
              <span class="material-symbols-outlined text-[20px]">edit_note</span> Log Observation
            </button> -->
          </div>
        </div>

        <!-- Species Chips -->
        <div class="flex flex-wrap gap-2 items-center">
          <span class="text-xs font-bold text-on-surface-variant uppercase mr-2">目前物種:</span>
          <span
            class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-full text-xs font-semibold">圓盤魚</span>
          <span
            class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-full text-xs font-semibold">霓虹燈魚</span>
          <span
            class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-full text-xs font-semibold">鼠魚</span>
          <span
            class="bg-tertiary-container text-on-tertiary-container px-3 py-1 rounded-full text-xs font-semibold">亞馬遜劍草</span>
        </div>
      </div>

      <!-- Sidebar: Student Observation Log -->
      <div class="lg:col-span-4 flex flex-col h-[700px] bg-surface-container-low rounded-xl overflow-hidden">
        <div class="p-5 border-b border-outline-variant/15 flex items-center justify-between bg-surface-container-low">
          <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">assignment</span>
            <h2 class="font-bold text-on-surface">聊天室</h2>
          </div>
        </div>

        <!-- Messages List -->
        <div id="messagesList" class="flex-grow overflow-y-auto p-5 space-y-4">
          <!-- Messages will be dynamically added here -->
        </div>

        <!-- Input Area -->
        <div class="p-5 bg-surface-container-lowest border-t border-outline-variant/15">
          <div class="relative">
            <textarea id="observationInput"
              class="w-full bg-surface-container-low border-none rounded-lg text-sm p-3 focus:ring-2 focus:ring-primary/20 resize-none h-20 placeholder:text-outline-variant"
              placeholder="Record your observation..."></textarea>
            <button id="sendBtn"
              class="absolute bottom-2 right-2 p-1.5 bg-primary text-on-primary rounded-md flex items-center justify-center hover:opacity-90">
              <span class="material-symbols-outlined text-[18px]">send</span>
            </button>
          </div>
          <!-- <div class="mt-2 flex items-center gap-2">
            <button class="text-[10px] font-bold text-primary flex items-center gap-1 uppercase">
              <span class="material-symbols-outlined text-[14px]">photo_camera</span> Attach Snapshot
            </button>
          </div> -->
        </div>
      </div>
    </div>

    <!-- Metric Bento Grid -->
    <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="bg-surface-container-low p-6 rounded-xl flex flex-col justify-between aspect-video lg:aspect-auto">
        <span class="text-xs font-bold font-label uppercase tracking-widest text-on-surface-variant">溫度</span>
        <div class="flex items-baseline gap-2">
          <span id="tempValue" class="text-4xl font-extrabold text-on-background">26.5</span>
          <span class="text-lg font-bold text-primary">°C</span>
        </div>
        <div class="w-full bg-outline-variant/20 h-1 rounded-full mt-2 overflow-hidden">
          <div id="tempBar" class="bg-primary h-full w-[85%] transition-all"></div>
        </div>
      </div>

      <div class="bg-surface-container-low p-6 rounded-xl flex flex-col justify-between">
        <span class="text-xs font-bold font-label uppercase tracking-widest text-on-surface-variant">PH值</span>
        <div class="flex items-baseline gap-2">
          <span id="phValue" class="text-4xl font-extrabold text-on-background">6.8</span>
          <span class="text-lg font-bold text-secondary">pH</span>
        </div>
        <div class="w-full bg-outline-variant/20 h-1 rounded-full mt-2 overflow-hidden">
          <div id="phBar" class="bg-secondary h-full w-[60%] transition-all"></div>
        </div>
      </div>

      <div class="bg-surface-container-low p-6 rounded-xl flex flex-col justify-between">
        <span class="text-xs font-bold font-label uppercase tracking-widest text-on-surface-variant">總溶解固體量</span>
        <div class="flex items-baseline gap-2">
          <span id="nitrateValue" class="text-4xl font-extrabold text-on-background">12</span>
          <span class="text-lg font-bold text-tertiary">ppm</span>
        </div>
        <div class="w-full bg-outline-variant/20 h-1 rounded-full mt-2 overflow-hidden">
          <div id="nitrateBar" class="bg-tertiary h-full w-[40%] transition-all"></div>
        </div>
      </div>

      <div class="bg-primary-container p-6 rounded-xl flex flex-col justify-between">
        <span class="text-xs font-bold font-label uppercase tracking-widest text-on-primary-container">魚缸狀況</span>
        <div class="flex items-baseline gap-2">
          <span id="healthStatus" class="text-4xl font-extrabold text-on-primary-container">良好</span>
        </div>
        <span class="text-[10px] font-bold text-on-primary-container/70 uppercase">上線時間: 432 年</span>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <!-- <footer class="mt-12 bg-slate-50 dark:bg-slate-950 border-t border-slate-200">
    <div class="flex flex-col md:flex-row justify-between items-center w-full px-8 py-12 max-w-7xl mx-auto gap-4">
      <div class="flex flex-col items-center md:items-start gap-2">
        <span class="text-lg font-bold text-slate-900">AquaStream</span>
        <span class="text-[10px] font-medium Inter tracking-wide text-slate-500 uppercase">© 2024 AquaStream Student Project</span>
      </div>
      <div class="flex gap-8">
        <a class="text-xs font-medium Inter tracking-wide text-slate-500 hover:text-teal-600 transition-all duration-200 uppercase cursor-pointer">About</a>
        <a class="text-xs font-medium Inter tracking-wide text-slate-500 hover:text-teal-600 transition-all duration-200 uppercase cursor-pointer">Privacy</a>
        <a class="text-xs font-medium Inter tracking-wide text-slate-500 hover:text-teal-600 transition-all duration-200 uppercase cursor-pointer">Contact</a>
      </div>
    </div>
  </footer> -->

  <script>
    // Initialize messages array
    let messages = [
      // { user: "Sarah M. (Group A)", time: "10:42 AM", text: "Observed male Discus showing territorial behavior near the large driftwood." },
      // { user: "Professor Jenkins", time: "10:45 AM", text: "Great spot Sarah. Everyone, watch the pH sensor readout in the stats panel; it might fluctuate during this activity." },
      // { user: "Leo K. (Group B)", time: "10:48 AM", text: "Schooling pattern of Neon Tetras is currently very tight. Potential stress factor identified?" },
      // { user: "Emma W. (Group A)", time: "10:52 AM", text: "Temperature reading stable at 26.5°C. Water clarity index 98%." }
    ];

    // Render messages
    function renderMessages() {
      const messagesList = document.getElementById('messagesList');
      messagesList.innerHTML = messages.map(msg => `
        <div class="bg-surface-container-lowest p-3 rounded-lg shadow-sm border border-outline-variant/10">
          <div class="flex justify-between items-center mb-1">
            <span class="text-xs font-bold text-teal-700">${msg.user}</span>
            <span class="text-[10px] text-outline">${msg.time}</span>
          </div>
          <p class="text-sm text-on-surface leading-snug">${msg.text}</p>
        </div>
      `).join('');

      // Auto-scroll to bottom
      messagesList.scrollTop = messagesList.scrollHeight;
    }

    // Send message
    function sendMessage() {
      const input = document.getElementById('observationInput');
      const text = input.value.trim();

      if (text === '') return;

      const now = new Date();
      const time = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });

      messages.push({
        user: "You (Student)",
        time: time,
        text: text
      });

      input.value = '';
      renderMessages();
    }

    // Send button click
    document.getElementById('sendBtn').addEventListener('click', sendMessage);

    // Enter key to send
    document.getElementById('observationInput').addEventListener('keypress', (e) => {
      if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
      }
    });

    // Update metrics periodically
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

      // Random viewer count
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

    // Update metrics every 5 seconds
    setInterval(updateMetrics, 5000);

    // Initial render
    renderMessages();
  </script>
</body>

</html>


<script>
  // 渲染訊息到畫面
  async function fetchMessages() {
    try {
      const response = await fetch("{{ route('messages.get') }}");
      const messages = await response.json();

      const list = document.getElementById('messagesList');
      list.innerHTML = messages.map(msg => {
        const time = new Date(msg.created_at).toLocaleTimeString('zh-TW', { hour: '2-digit', minute: '2-digit' });
        // 判斷是否為本人（增加視覺區隔）
        const isMe = msg.user_name === "{{ session('user_name') }}";

        return `
                    <div class="p-3 rounded-lg border border-outline-variant/10 ${isMe ? 'bg-teal-50/50' : 'bg-white'} shadow-sm">
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-xs font-bold ${isMe ? 'text-teal-700' : 'text-slate-600'}">${msg.user_name}</span>
                            <span class="text-[10px] text-outline">${time}</span>
                        </div>
                        <p class="text-sm text-on-surface">${msg.content}</p>
                    </div>
                `;
      }).join('');

      // 捲動到最新訊息
      list.scrollTop = list.scrollHeight;
    } catch (e) { console.error("抓取失敗", e); }
  }

  // 傳送訊息到後端
  async function sendMessage() {
    const input = document.getElementById('observationInput');
    const content = input.value.trim();
    if (!content) return;

    // 檢查是否登入 (非強制，視你的需求而定)
    if (!"{{ session('user_id') }}") {
      if (!confirm("您目前以「訪客」身分發言，確定要傳送嗎？")) return;
    }

    try {
      const res = await fetch("{{ route('messages.store') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": "{{ csrf_token() }}" // 重要：防止 419 錯誤
        },
        body: JSON.stringify({ content: content })
      });

      if (res.ok) {
        input.value = ''; // 清空輸入框
        fetchMessages(); // 立即重新讀取
      }
    } catch (e) { alert("傳送失敗"); }
  }

  // 綁定事件
  document.getElementById('sendBtn').addEventListener('click', sendMessage);
  document.getElementById('observationInput').addEventListener('keypress', (e) => {
    if (e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      sendMessage();
    }
  });

  // 啟動自動輪詢 (每 3 秒檢查一次)
  fetchMessages();
  setInterval(fetchMessages, 3000);
</script>