<!-- Footer -->
<footer class="fixed bottom-0 left-0 w-full bg-surface-container-lowest/60 border-t border-outline-variant/30 flex justify-between items-center px-margin-desktop py-4 z-50">
<div class="flex gap-8 items-center">
<span class="font-label-caps text-label-caps text-on-surface">PROJECT VISION</span>
<span class="font-code-data text-code-data text-tertiary-fixed-dim">© 2144 DEEP SPACE ARCHIVE. COORDS: 42.00.01. STATUS: NOMINAL.</span>
</div>
<div class="flex gap-6 items-center">
<a class="font-code-data text-code-data text-outline hover:text-secondary-fixed transition-colors" href="#">Privacy Protocol</a>
<a class="font-code-data text-code-data text-outline hover:text-secondary-fixed transition-colors" href="#">Terms of Service</a>
</div>
</footer>
<script>
        // Digital Clock Update
        function updateClock() {
            const now = new Date();
            const h = String(now.getHours()).padStart(2, '0');
            const m = String(now.getMinutes()).padStart(2, '0');
            const s = String(now.getSeconds()).padStart(2, '0');
            const ms = String(Math.floor(Math.random() * 99)).padStart(2, '0');
            const el = document.getElementById('clock');
            if(el) el.textContent = `${h}:${m}:${s}:${ms}`;
        }
        setInterval(updateClock, 50);

        // Interaction for buttons
        document.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('mousedown', () => btn.classList.add('opacity-80'));
            btn.addEventListener('mouseup', () => btn.classList.remove('opacity-80'));
        });
    </script>
</body>
</html>
