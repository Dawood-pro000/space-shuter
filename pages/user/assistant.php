<?php
$page_title = 'E.V.A - AI Assistant | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';
?>

<main class="pt-28 pb-12 px-4 sm:px-8 min-h-[90vh] max-w-7xl mx-auto flex flex-col">
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between border-b border-white/10 pb-4">
        <div>
            <h1 class="text-3xl font-serif font-bold text-white tracking-widest uppercase flex items-center gap-3">
                <span class="w-3 h-3 rounded-full bg-green-500 animate-pulse shadow-[0_0_10px_#22c55e]"></span>
                E.V.A. System
            </h1>
            <p class="text-brand-purple text-sm font-mono tracking-wider mt-1">Extra-Vehicular AI Assistant v2.0</p>
        </div>
        <div class="hidden sm:block text-right font-mono text-xs text-gray-500">
            <div>STATUS: ONLINE</div>
            <div>LINK: SECURE</div>
        </div>
    </div>

    <!-- Chat Container -->
    <div class="flex-1 bg-surface-soft/50 border border-white/10 rounded-xl flex flex-col relative overflow-hidden backdrop-blur-sm shadow-[0_0_30px_rgba(126,34,206,0.1)]">
        
        <!-- Glowing edge effect -->
        <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-brand-purple to-transparent opacity-50"></div>
        
        <!-- Messages Area -->
        <div id="chat-messages" class="flex-1 overflow-y-auto p-6 space-y-6 font-mono text-sm">
            <!-- Initial AI Greeting -->
            <div class="flex gap-4 max-w-[85%]">
                <div class="w-8 h-8 rounded-sm bg-brand-purple/20 border border-brand-purple flex items-center justify-center shrink-0 shadow-[0_0_10px_rgba(126,34,206,0.3)]">
                    <svg class="w-5 h-5 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div class="bg-surface border border-white/5 p-4 rounded-r-xl rounded-bl-xl text-gray-300">
                    Greetings, Explorer. I am E.V.A. How may I assist you with your mission today? You can ask me about astrophysics, NASA missions, or general space exploration.
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-4 border-t border-white/10 bg-surface/80 backdrop-blur-md">
            <form id="chat-form" class="flex gap-4">
                <input type="text" id="chat-input" class="flex-1 bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white font-mono text-sm focus:outline-none focus:border-brand-purple focus:ring-1 focus:ring-brand-purple transition-all placeholder:text-gray-600" placeholder="Transmit message to E.V.A..." required autocomplete="off">
                <button type="submit" id="chat-submit" class="bg-brand-purple hover:bg-brand-purple-deep text-white px-8 py-3 rounded-lg font-bold tracking-widest uppercase text-sm transition-all shadow-[0_0_15px_rgba(126,34,206,0.4)] flex items-center gap-2 border border-brand-purple">
                    <span>Send</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>
        </div>
    </div>
</main>

<script>
document.getElementById('chat-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const inputField = document.getElementById('chat-input');
    const submitBtn = document.getElementById('chat-submit');
    const messagesContainer = document.getElementById('chat-messages');
    const message = inputField.value.trim();
    
    if (!message) return;

    // Append User Message
    const userHtml = `
        <div class="flex gap-4 max-w-[85%] ml-auto justify-end">
            <div class="bg-brand-purple/10 border border-brand-purple/30 p-4 rounded-l-xl rounded-br-xl text-gray-200">
                ${message.replace(/</g, "&lt;").replace(/>/g, "&gt;")}
            </div>
            <div class="w-8 h-8 rounded-full bg-white/5 border border-white/20 flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
        </div>
    `;
    messagesContainer.insertAdjacentHTML('beforeend', userHtml);
    
    // Clear input and disable button
    inputField.value = '';
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="animate-pulse">...</span>';
    
    // Scroll to bottom
    messagesContainer.scrollTop = messagesContainer.scrollHeight;

    // Add Loading Indicator for AI
    const loadingId = 'loading-' + Date.now();
    const loadingHtml = `
        <div id="${loadingId}" class="flex gap-4 max-w-[85%]">
            <div class="w-8 h-8 rounded-sm bg-brand-purple/20 border border-brand-purple flex items-center justify-center shrink-0 shadow-[0_0_10px_rgba(126,34,206,0.3)]">
                <svg class="w-5 h-5 text-brand-purple animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <div class="bg-surface border border-white/5 p-4 rounded-r-xl rounded-bl-xl text-gray-400 flex flex-col gap-2 justify-center w-24">
                <div class="flex gap-1">
                    <div class="w-2 h-2 bg-brand-purple rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-brand-purple rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                    <div class="w-2 h-2 bg-brand-purple rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                </div>
            </div>
        </div>
    `;
    messagesContainer.insertAdjacentHTML('beforeend', loadingHtml);
    messagesContainer.scrollTop = messagesContainer.scrollHeight;

    try {
        const response = await fetch('/space-shuter/api/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ message: message })
        });

        const data = await response.json();
        
        // Remove loading
        document.getElementById(loadingId).remove();

        if (response.ok && data.reply) {
            // Format code blocks (basic markdown handling)
            let formattedReply = data.reply
                .replace(/</g, "&lt;").replace(/>/g, "&gt;") // escape HTML
                .replace(/\*\*(.*?)\*\*/g, '<strong class="text-white">$1</strong>') // Bold
                .replace(/\n/g, '<br>'); // Newlines

            const aiHtml = `
                <div class="flex gap-4 max-w-[85%]">
                    <div class="w-8 h-8 rounded-sm bg-brand-purple/20 border border-brand-purple flex items-center justify-center shrink-0 shadow-[0_0_10px_rgba(126,34,206,0.3)]">
                        <svg class="w-5 h-5 text-brand-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="bg-surface border border-white/5 p-4 rounded-r-xl rounded-bl-xl text-gray-300 leading-relaxed">
                        ${formattedReply}
                    </div>
                </div>
            `;
            messagesContainer.insertAdjacentHTML('beforeend', aiHtml);
        } else {
            throw new Error(data.error || 'Failed to communicate with E.V.A.');
        }
    } catch (error) {
        document.getElementById(loadingId)?.remove();
        const errorHtml = `
            <div class="flex gap-4 max-w-[85%]">
                <div class="w-8 h-8 rounded-sm bg-red-500/20 border border-red-500 flex items-center justify-center shrink-0">
                    <span class="text-red-500 font-bold">!</span>
                </div>
                <div class="bg-red-500/10 border border-red-500/30 p-4 rounded-r-xl rounded-bl-xl text-red-400">
                    SYSTEM ERROR: ${error.message}
                </div>
            </div>
        `;
        messagesContainer.insertAdjacentHTML('beforeend', errorHtml);
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = `<span>Send</span> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>`;
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        inputField.focus();
    }
});
</script>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
