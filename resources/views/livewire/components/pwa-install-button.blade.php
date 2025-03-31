<div x-data="{ showInstallButton: false }" x-init="
    window.addEventListener('beforeinstallprompt', () => {
        showInstallButton = true;
    });
">
    <button
        x-show="showInstallButton"
        @click="installPWA()"
        class="fixed bottom-4 right-4 bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-indigo-700 transition-colors duration-200"
    >
        Install App
    </button>
</div>
