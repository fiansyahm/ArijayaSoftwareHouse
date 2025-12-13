<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Chat Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color:#efeae2; }
        .chat-bg {
            background-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png');
            background-repeat: repeat;
            background-size: 100% auto;
        }
        .bubble { max-width:75%; padding:10px 14px; border-radius:16px; position:relative; box-shadow:0 1px 3px rgba(0,0,0,.12); font-size:15px; line-height:1.4; }
        .bubble-me { background:#d9fdd3; margin-left:auto; border-bottom-right-radius:4px; }
        .bubble-me::after{ content:""; position:absolute; right:-6px; bottom:0; width:12px; height:12px; background:#d9fdd3; clip-path:polygon(0 0,100% 100%,0 100%); }
        .bubble-other{ background:#fff; margin-right:auto; border-bottom-left-radius:4px; }
        .bubble-other::after{ content:""; position:absolute; left:-6px; bottom:0; width:12px; height:12px; background:#fff; clip-path:polygon(100% 0,100% 100%,0 100%); }
        .time{ font-size:11px; opacity:.6; margin-top:6px; text-align:right; }
        #previewBox{ position:fixed; bottom:84px; left:50%; transform:translateX(-50%); z-index:60; background:rgba(255,255,255,.98); padding:8px; border-radius:12px; box-shadow:0 8px 30px rgba(0,0,0,.2); display:none; width:300px; }
        #dropOverlay{ position:fixed; inset:0; z-index:50; display:none; align-items:center; justify-content:center; background:rgba(0,0,0,.35); color:#fff; font-size:20px; }
        img.preview-img{ max-width:100%; height:auto; border-radius:8px; display:block; margin-bottom:6px; }
        .chat-list-item:hover { background-color: #f0f0f0; }
        .chat-list-item.active { background-color: #e0f7fa; }
        @media (max-width: 768px) {
            #chatList { position: fixed; top:0; left:0; bottom:0; width:100%; z-index:40; transition: transform 0.3s ease; }
            #chatList.hidden-mobile { transform: translateX(-100%); }
            #chatRoom { position: fixed; top:0; left:0; right:0; bottom:0; width:100%; display:none; }
            #chatRoom.active-mobile { display: block; }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Drop overlay -->
    <div id="dropOverlay" class="hidden">Drop image to send</div>

    <!-- Preview box -->
    <div id="previewBox" class="hidden">
        <img id="previewImg" class="preview-img" src="" alt="Preview">
        <div class="flex items-center justify-between gap-2">
            <div class="text-sm text-gray-700" id="previewInfo"></div>
            <div class="flex gap-2">
                <button id="cancelPreview" class="px-3 py-1 rounded bg-gray-200 text-sm">Batal</button>
                <button id="confirmPreview" class="px-3 py-1 rounded bg-[#075E54] text-white text-sm">Kirim</button>
            </div>
        </div>
    </div>

    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar: List Programmer (seperti WhatsApp) -->
        <div id="chatList" class="w-96 bg-gray-100 flex flex-col md:block">
            <header class="bg-[#075E54] text-white px-4 py-4 flex items-center justify-between">
                <h2 class="font-semibold text-lg">Chat Programmer</h2>
            </header>
            <div class="flex-1 overflow-y-auto">
                @foreach ($programmers as $programmer)
                    <a href="/chat/project/{{ $projectId }}/{{ $programmer }}"
                       class="chat-list-item block px-4 py-3 flex items-center gap-3 border-b border-gray-200 active">
                        <div class="w-12 h-12 rounded-full bg-gray-300 flex-shrink-0"></div>
                        <div class="flex-1">
                            <h3 class="font-semibold">{{ $programmer }}</h3>
                            <p class="text-sm text-gray-600 truncate">Klik untuk membuka chat</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Chat Room -->
        <div id="chatRoom" class="flex-1 flex flex-col {{ $userId ? '' : 'hidden' }} md:block">
            <!-- Header Chat -->
            <header class="bg-[#075E54] text-white px-4 py-3 flex items-center gap-3 fixed top-0 left-0 right-0 z-40 md:static md:left-auto md:right-auto">
                <button id="backButton" class="text-white text-2xl md:hidden">&larr;</button>
                <div class="flex items-center gap-3 flex-1">
                    <div class="w-10 h-10 rounded-full bg-gray-300"></div>
                    <div>
                        <h2 class="font-semibold">{{ $user->name ?? 'Nama Pengguna' }}</h2>
                        <p class="text-xs opacity-90">Online</p>
                    </div>
                </div>
            </header>

            <!-- Messages -->
            <div id="messages" class="flex-1 overflow-y-auto chat-bg pt-20 pb-28 px-4 space-y-4 md:pt-4"></div>

            <!-- Input -->
            <div class="fixed bottom-0 left-0 right-0 bg-[#F0F0F0] px-3 py-3 flex items-center gap-2 z-30 md:left-auto md:right-auto md:relative">
                <input id="fileInput" type="file" accept="image/*" class="hidden" />
                <button id="btnFile" class="bg-gray-300 text-black w-12 h-12 rounded-full flex items-center justify-center hover:bg-gray-400 transition">📷</button>

                <input id="messageInput" type="text" placeholder="Ketik pesan..." class="flex-1 px-5 py-3 rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-green-500 text-base" />

                <button id="btnSend" class="bg-[#075E54] text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-[#064c45] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                </button>
            </div>
        </div>
    </div>

<script>
/* ================== CONFIG ================== */
const FETCH_URL = "{{ $userId ? route('chat.fetch', ['projectId' => $projectId, 'userId' => $userId]) : '' }}";
const SEND_URL = "{{ route('chat.send') }}";
const CSRF = "{{ csrf_token() }}";
const MY_ID = {{ auth()->id() }};
const TO_ID = {{ $userId ?? 'null' }};
const PROJECT_ID = {{ $projectId }};

const messagesDiv = document.getElementById('messages');
const input = document.getElementById('messageInput');
const fileInput = document.getElementById('fileInput');
const btnFile = document.getElementById('btnFile');
const btnSend = document.getElementById('btnSend');
const previewBox = document.getElementById('previewBox');
const previewImg = document.getElementById('previewImg');
const previewInfo = document.getElementById('previewInfo');
const cancelPreview = document.getElementById('cancelPreview');
const confirmPreview = document.getElementById('confirmPreview');
const dropOverlay = document.getElementById('dropOverlay');
const backButton = document.getElementById('backButton');
const chatList = document.getElementById('chatList');
const chatRoom = document.getElementById('chatRoom');

let polling = null;

/* Mobile navigation */
if (backButton) {
    backButton.addEventListener('click', () => {
        chatList.classList.remove('hidden-mobile');
        chatRoom.classList.remove('active-mobile');
    });
}

/* ====== HELPER: CEK BASE64 ====== */
function isBase64(str) {
    if (!str || typeof str !== 'string') return false;
    if (!str.startsWith('data:image/') || !str.includes(';base64,')) return false;
    const cleaned = str.split(',')[1];
    if (!cleaned || cleaned.length % 4 !== 0) return false;
    return /^[A-Za-z0-9+/=]+$/.test(cleaned);
}

/* ====== BASE64 → FILE ====== */
function base64ToFile(base64, filename = 'image.jpg') {
    try {
        const arr = base64.split(',');
        const mimeMatch = arr[0].match(/:(.*?);/);
        const mime = mimeMatch ? mimeMatch[1] : 'image/jpeg';
        const bstr = atob(arr[1]);
        let n = bstr.length;
        const u8arr = new Uint8Array(n);
        while (n--) u8arr[n] = bstr.charCodeAt(n);
        return new File([u8arr], filename, { type: mime });
    } catch (e) {
        console.warn('Invalid base64 string');
        return null;
    }
}

/* ====== KOMPRES GAMBAR ====== */
async function compressToBase64(file, maxSizeBytes = 1000 * 1000) {
    return new Promise((resolve, reject) => {
        const img = new Image();
        const url = URL.createObjectURL(file);
        img.onload = () => {
            let { width: w, height: h } = img;
            const maxSide = 1200;
            if (w > maxSide || h > maxSide) {
                if (w > h) { h = Math.round(h * (maxSide / w)); w = maxSide; }
                else { w = Math.round(w * (maxSide / h)); h = maxSide; }
            }

            const canvas = document.createElement('canvas');
            canvas.width = w;
            canvas.height = h;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0, w, h);

            let quality = 0.92;
            let dataUrl = canvas.toDataURL('image/jpeg', quality);

            while (dataUrl.length > maxSizeBytes * 1.33 && quality > 0.2) {
                quality -= 0.08;
                dataUrl = canvas.toDataURL('image/jpeg', quality);
            }

            URL.revokeObjectURL(url);
            resolve(dataUrl);
        };
        img.onerror = () => reject(new Error('Gagal memuat gambar'));
        img.src = url;
    });
}

/* ====== PREVIEW ====== */
let currentFile = null;
function showPreview(file) {
    currentFile = file;
    const url = URL.createObjectURL(file);
    previewImg.src = url;
    previewInfo.textContent = `Ukuran: ${(file.size/1024).toFixed(0)} KB`;
    previewBox.style.display = 'block';
}

function hidePreview() {
    if (previewImg.src) URL.revokeObjectURL(previewImg.src);
    previewImg.src = '';
    previewBox.style.display = 'none';
    currentFile = null;
}

/* ====== KIRIM ====== */
async function sendImage(base64) {
    const res = await fetch(SEND_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
        body: JSON.stringify({ message: base64, to_id: TO_ID, project_id: PROJECT_ID })
    });
    return res.ok;
}

async function sendText(text) {
    const res = await fetch(SEND_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
        body: JSON.stringify({ message: text, to_id: TO_ID, project_id: PROJECT_ID })
    });
    return res.ok;
}

/* ====== RENDER PESAN ====== */
function renderMessages(list) {
    messagesDiv.innerHTML = '';
    list.forEach(msg => {
        const isMe = (msg.from_id == MY_ID);
        const wrapper = document.createElement('div');
        wrapper.className = `w-full flex ${isMe ? 'justify-end' : 'justify-start'}`;

        const inner = document.createElement('div');
        inner.className = `bubble ${isMe ? 'bubble-me' : 'bubble-other'} px-4 py-3 rounded-2xl relative shadow-sm`;

        if (msg.is_image == 1 || (typeof msg.message === 'string' && msg.message.startsWith('data:'))) {
            const img = document.createElement('img');
            img.src = msg.message;
            img.className = 'rounded-lg max-w-[220px] shadow';
            inner.appendChild(img);
        } else {
            const p = document.createElement('p');
            p.className = 'break-words';
            p.innerText = msg.message;
            inner.appendChild(p);
        }

        const timeDiv = document.createElement('div');
        timeDiv.className = 'time';
        timeDiv.innerText = new Date(msg.created_at).toLocaleTimeString('id-ID', { hour:'2-digit', minute:'2-digit' });
        inner.appendChild(timeDiv);

        wrapper.appendChild(inner);
        messagesDiv.appendChild(wrapper);
    });
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}

/* ====== LOAD PESAN ====== */
async function loadMessages() {
    if (!FETCH_URL) return;
    try {
        const res = await fetch(FETCH_URL);
        if (!res.ok) return;
        const data = await res.json();
        renderMessages(data);
    } catch (e) {
        console.error(e);
    }
}

/* ====== POLLING ====== */
if (TO_ID) {
    loadMessages();
    polling = setInterval(loadMessages, 2000);
}

/* ====== EVENT LISTENERS (sama seperti sebelumnya) ====== */
// ... (kode event untuk kirim teks, gambar, paste, drag drop, preview buttons tetap sama)
input.addEventListener('keydown', async (e) => {
    if (e.key === 'Enter') {
        e.preventDefault();
        const txt = input.value.trim();
        if (!txt) return;
        if (isBase64(txt)) {
            const file = base64ToFile(txt);
            if (file) showPreview(file);
        } else {
            const ok = await sendText(txt);
            if (ok) input.value = '';
            loadMessages();
        }
    }
});

btnSend.addEventListener('click', async () => {
    const txt = input.value.trim();
    if (!txt) return;
    if (isBase64(txt)) {
        const file = base64ToFile(txt);
        if (file) showPreview(file);
    } else {
        const ok = await sendText(txt);
        if (ok) input.value = '';
        loadMessages();
    }
});

btnFile.addEventListener('click', () => fileInput.click());
fileInput.addEventListener('change', (e) => {
    const f = e.target.files[0];
    if (f) showPreview(f);
    fileInput.value = null;
});

window.addEventListener('paste', (e) => {
    const items = e.clipboardData.items;
    for (const item of items) {
        if (item.type?.startsWith('image/')) {
            const blob = item.getAsFile();
            showPreview(blob);
            return;
        }
        if (item.kind === 'string') {
            item.getAsString(str => {
                if (isBase64(str)) {
                    const file = base64ToFile(str);
                    if (file) showPreview(file);
                }
            });
        }
    }
});

['dragenter','dragover'].forEach(ev => window.addEventListener(ev, (e) => {
    e.preventDefault();
    dropOverlay.style.display = 'flex';
}, false));

['dragleave','drop'].forEach(ev => window.addEventListener(ev, (e) => {
    e.preventDefault();
    dropOverlay.style.display = 'none';
}, false));

window.addEventListener('drop', (e) => {
    const files = e.dataTransfer.files;
    if (files.length && files[0].type.startsWith('image/')) {
        showPreview(files[0]);
    }
});

cancelPreview.addEventListener('click', hidePreview);

confirmPreview.addEventListener('click', async () => {
    if (!currentFile) return;
    try {
        const base64 = await compressToBase64(currentFile);
        const ok = await sendImage(base64);
        if (ok) {
            hidePreview();
            loadMessages();
        } else {
            alert('Gagal mengirim gambar');
        }
    } catch (err) {
        alert('Gagal mengirim gambar');
    }
});

window.addEventListener('beforeunload', () => {
    if (polling) clearInterval(polling);
});

/* Mobile: Saat load halaman dengan userId, sembunyikan list dan tampilkan room */
if (window.innerWidth < 768 && TO_ID) {
    chatList.classList.add('hidden-mobile');
    chatRoom.classList.add('active-mobile');
}
</script>
</body>
</html>