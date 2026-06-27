<?php
// layouts/footer.php
?>
    <!-- Footer -->
    <div class="px-8 pb-8 pt-20 relative z-10 flex justify-center">
        <footer class="w-full max-w-5xl bg-black/60 backdrop-blur-md border border-white/10 rounded-3xl py-10 px-12 shadow-[0_0_30px_rgba(0,0,0,0.5)]">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <!-- Logo & Copyright -->
                <div class="text-center md:text-left">
                    <a href="/space-shuter/" class="font-serif font-bold tracking-widest text-2xl text-white uppercase flex items-center justify-center md:justify-start gap-2 hover-glow mb-2">
                        Space <span class="text-white font-light opacity-70">Shutter</span>
                    </a>
                    <p class="text-xs text-gray-500 tracking-wide">© <?= date('Y') ?> Space Shutter. All rights reserved.</p>
                </div>
                
                <!-- Links -->
                <div class="flex flex-wrap justify-center gap-x-8 gap-y-4 text-sm font-medium text-gray-300">
                    <a href="/space-shuter/discover" class="hover:text-white hover-glow transition-colors">Discover</a>
                    <a href="/space-shuter/planet" class="hover:text-white hover-glow transition-colors">Destinations</a>
                    <a href="/space-shuter/study-planner" class="hover:text-white hover-glow transition-colors">Study Planner</a>
                    <a href="/space-shuter/about" class="hover:text-white hover-glow transition-colors">About Us</a>
                </div>
                
                <!-- Social / Action -->
                <div class="flex items-center gap-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-white hover:bg-white/10 hover:border-brand-purple hover:shadow-[0_0_15px_rgba(126,34,206,0.3)] transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                </div>
            </div>
        </footer>
    </div>
    
    <?php 
    $current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (strpos($current_path, '/login') === false && strpos($current_path, '/register') === false && strpos($current_path, '/assistant') === false): 
    ?>
    <!-- Floating AI Assistant -->
    <div id="ai-widget-container" class="fixed bottom-6 right-6 z-50">
        <!-- Chat Window -->
        <div id="ai-chat-window" class="hidden mb-4 w-80 md:w-96 bg-black border border-brand-purple/60 rounded-3xl shadow-[0_0_50px_rgba(126,34,206,0.5)] overflow-hidden flex-col transition-all duration-300 origin-bottom-right relative">
            <!-- Galaxy Background -->
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=800&auto=format&fit=crop')] bg-cover bg-center opacity-80 z-0"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-black/30 z-0 pointer-events-none"></div>

            <!-- Header -->
            <div class="relative z-10 bg-black/40 backdrop-blur-md border-b border-white/10 p-4 flex justify-between items-center shadow-lg">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-purple to-brand-gold p-[2px] animate-[spin_4s_linear_infinite]">
                        <div class="w-full h-full bg-black rounded-full flex items-center justify-center animate-[spin_4s_linear_infinite_reverse]">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-white font-serif font-bold text-sm tracking-widest uppercase text-shadow">E.V.A</h4>
                        <p class="text-brand-gold text-[10px] tracking-widest uppercase animate-pulse">Online &middot; Galaxy Net</p>
                    </div>
                </div>
                <button id="ai-close-btn" class="text-white/50 hover:text-white transition-colors bg-white/5 w-8 h-8 rounded-full flex items-center justify-center hover:bg-brand-purple/50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <!-- Messages Area -->
            <div id="ai-messages" class="relative z-10 p-5 h-80 overflow-y-auto flex flex-col gap-4 scrollbar-thin scrollbar-thumb-brand-purple/50 scrollbar-track-transparent">
                <div class="flex gap-2">
                    <div class="bg-black/60 backdrop-blur-md border border-white/10 text-gray-200 text-sm p-4 rounded-2xl rounded-tl-none max-w-[85%] shadow-lg leading-relaxed">
                        Greetings, explorer! I am E.V.A, your advanced cosmic assistant. Ask me anything about the universe, and we shall explore it together. 🌌
                    </div>
                </div>
            </div>
            <!-- Input Area -->
            <div class="relative z-10 p-4 border-t border-white/10 bg-black/60 backdrop-blur-xl">
                <form id="ai-chat-form" class="flex gap-2">
                    <input type="text" id="ai-input" class="flex-1 bg-white/10 border border-white/20 rounded-full px-4 py-2 text-sm text-white focus:outline-none focus:border-brand-purple focus:bg-white/20 transition-all shadow-inner placeholder-gray-400" placeholder="Ask E.V.A..." required>
                    <button type="submit" class="w-10 h-10 rounded-full bg-gradient-to-r from-brand-purple to-brand-gold text-white flex items-center justify-center hover:opacity-90 transition-all shrink-0 shadow-[0_0_15px_rgba(126,34,206,0.6)]">
                        <svg class="w-4 h-4 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Toggle Button -->
        <button id="ai-toggle-btn" class="w-16 h-16 rounded-full bg-[url('https://images.unsplash.com/photo-1462331940025-496dfbfc7564?q=80&w=200&auto=format&fit=crop')] bg-cover bg-center border-2 border-brand-purple text-white flex items-center justify-center shadow-[0_0_20px_rgba(126,34,206,0.8)] hover:shadow-[0_0_40px_rgba(126,34,206,1)] transition-all ml-auto relative group overflow-hidden hover:scale-105" aria-label="Open AI Assistant">
            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors"></div>
            <div class="absolute inset-0 rounded-full border-t-2 border-brand-gold/80 animate-[spin_4s_linear_infinite]"></div>
            <div class="absolute inset-0 rounded-full border-b-2 border-brand-purple/80 animate-[spin_6s_linear_infinite_reverse]"></div>
            <!-- Star core effect -->
            <div class="w-2 h-2 rounded-full bg-white shadow-[0_0_10px_white] relative z-10 animate-pulse group-hover:scale-150 transition-transform"></div>
        </button>
    </div>

    <script>
        // AI Widget Logic
        const aiToggleBtn = document.getElementById('ai-toggle-btn');
        const aiCloseBtn = document.getElementById('ai-close-btn');
        const aiChatWindow = document.getElementById('ai-chat-window');
        const aiChatForm = document.getElementById('ai-chat-form');
        const aiInput = document.getElementById('ai-input');
        const aiMessages = document.getElementById('ai-messages');

        function toggleChat() {
            if (aiChatWindow.classList.contains('hidden')) {
                aiChatWindow.classList.remove('hidden');
                aiChatWindow.style.display = 'flex';
                aiInput.focus();
            } else {
                aiChatWindow.classList.add('hidden');
                aiChatWindow.style.display = 'none';
            }
        }

        if (aiToggleBtn) aiToggleBtn.addEventListener('click', toggleChat);
        if (aiCloseBtn) aiCloseBtn.addEventListener('click', toggleChat);

        if (aiChatForm) {
            aiChatForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const msg = aiInput.value.trim();
                if (!msg) return;

                // Add User Message
                aiMessages.innerHTML += `
                    <div class="flex gap-2 justify-end">
                        <div class="bg-brand-purple/80 backdrop-blur-md border border-brand-purple/50 text-white text-sm p-4 rounded-2xl rounded-tr-none max-w-[85%] shadow-[0_0_15px_rgba(126,34,206,0.5)] leading-relaxed">
                            ${msg}
                        </div>
                    </div>
                `;
                aiInput.value = '';
                aiMessages.scrollTop = aiMessages.scrollHeight;

                // Add Typing Indicator
                const typingId = 'typing-' + Date.now();
                aiMessages.innerHTML += `
                    <div id="${typingId}" class="flex gap-2">
                        <div class="bg-black/60 backdrop-blur-md border border-white/10 text-brand-gold text-xs p-4 rounded-2xl rounded-tl-none max-w-[85%] animate-pulse font-bold tracking-widest uppercase shadow-lg">
                            E.V.A is processing...
                        </div>
                    </div>
                `;
                aiMessages.scrollTop = aiMessages.scrollHeight;

                try {
                    const response = await fetch('/space-shuter/api/chat', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ message: msg })
                    });
                    
                    const data = await response.json();
                    document.getElementById(typingId).remove();
                    
                    let reply = data.reply || "Connection to neural network lost.";
                    
                    // Simple Markdown to HTML
                    reply = reply.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
                    reply = reply.replace(/\*(.*?)\*/g, '<em>$1</em>');
                    reply = reply.replace(/\n/g, '<br>');

                    aiMessages.innerHTML += `
                        <div class="flex gap-2">
                            <div class="bg-black/60 backdrop-blur-md border border-white/10 text-gray-200 text-sm p-4 rounded-2xl rounded-tl-none max-w-[85%] shadow-lg leading-relaxed">
                                ${reply}
                            </div>
                        </div>
                    `;
                } catch (err) {
                    document.getElementById(typingId).remove();
                    aiMessages.innerHTML += `
                        <div class="flex gap-2">
                            <div class="bg-red-500/20 backdrop-blur-md border border-red-500/50 text-red-200 text-sm p-4 rounded-2xl rounded-tl-none max-w-[85%] shadow-[0_0_15px_rgba(239,68,68,0.3)]">
                                Comm link error. Please check your connection.
                            </div>
                        </div>
                    `;
                }
                aiMessages.scrollTop = aiMessages.scrollHeight;
            });
        }
    </script>
    <?php endif; ?>
    
    <script>
        // Initialize Lenis for Smooth Scrolling
        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            smooth: true,
            smoothTouch: false,
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }

        requestAnimationFrame(raf);

        // Register GSAP ScrollTrigger
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
        }
    </script>
</body>
</html>
