<div x-data="{ showInstallButton: false }" x-init="
    console.log('PWA Button Component Initialized');
    window.addEventListener('beforeinstallprompt', (e) => {
        console.log('beforeinstallprompt event fired');
        showInstallButton = true;
    });
">
    <button
        x-show="showInstallButton"
        @click="installPWA()"
        class="fixed bottom-4 right-4 bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-indigo-700 transition-colors duration-200 z-50"
    >
        Install App
    </button>
</div>
