<?php
// pages/public/books.php
$page_title = 'Space & Science Library | Space Shutter';
require_once __DIR__ . '/../../layouts/header.php';

$books = [
    [
        'title' => 'Cosmos',
        'author' => 'Carl Sagan',
        'cover' => 'https://images.unsplash.com/photo-1614729939124-032f0b56c9ce?q=80&w=600&auto=format&fit=crop',
        'desc' => 'The story of fifteen billion years of cosmic evolution transforming matter and life into consciousness.',
        'color' => 'from-blue-900 to-black'
    ],
    [
        'title' => 'A Brief History of Time',
        'author' => 'Stephen Hawking',
        'cover' => 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?q=80&w=600&auto=format&fit=crop',
        'desc' => 'A landmark volume in science writing by one of the great minds of our time.',
        'color' => 'from-purple-900 to-black'
    ],
    [
        'title' => 'Astrophysics for People in a Hurry',
        'author' => 'Neil deGrasse Tyson',
        'cover' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=600&auto=format&fit=crop',
        'desc' => 'What is the nature of space and time? How do we fit within the universe?',
        'color' => 'from-brand-purple-deep to-black'
    ],
    [
        'title' => 'The Martian',
        'author' => 'Andy Weir',
        'cover' => 'https://images.unsplash.com/photo-1614730321146-b6fa6a46bcb4?q=80&w=600&auto=format&fit=crop',
        'desc' => 'Six days ago, astronaut Mark Watney became one of the first people to walk on Mars. Now, he\'s sure he\'ll be the first person to die there.',
        'color' => 'from-orange-900 to-black'
    ]
];
?>

<main class="pt-32 pb-24 px-8 max-w-7xl mx-auto min-h-[90vh]">
    <div class="text-center mb-16 relative z-10">
        <h1 class="text-5xl font-serif font-bold text-white uppercase tracking-widest mb-6">Space <span class="text-brand-purple">&</span> Science Books</h1>
        <p class="text-gray-400 font-light tracking-wide max-w-2xl mx-auto">Immerse yourself in our curated public collection of cosmic literature.</p>
    </div>

    <!-- Reading Environment Modal (Hidden by default) -->
    <div id="reader-modal" class="fixed inset-0 z-[100] hidden bg-black/95 backdrop-blur-xl flex flex-col transition-all duration-500 opacity-0">
        <div class="flex justify-between items-center p-6 border-b border-white/10">
            <div class="flex items-center gap-4">
                <button onclick="closeReader()" class="text-steel hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <h2 id="reader-title" class="text-xl font-serif font-bold text-white tracking-widest">Book Title</h2>
            </div>
            <div class="flex gap-4">
                <button class="text-steel hover:text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg></button>
                <button class="text-steel hover:text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path></svg></button>
            </div>
        </div>
        
        <div class="flex-1 overflow-y-auto p-10 flex justify-center perspective-[1000px]">
            <!-- Animated Book Open Effect -->
            <div id="reader-content" class="max-w-3xl w-full bg-[#f4ebd0] text-[#2c2c2c] p-12 md:p-20 rounded-sm shadow-2xl font-serif leading-relaxed text-lg transform transition-transform duration-1000 rotate-y-90 opacity-0 translate-y-10">
                <h1 id="reader-chapter" class="text-4xl mb-10 text-center font-bold text-black uppercase tracking-widest">Chapter I</h1>
                <p class="mb-6 first-letter:text-7xl first-letter:font-bold first-letter:mr-3 first-letter:float-left text-justify">
                    Space is big. You just won't believe how vastly, hugely, mind-bogglingly big it is. I mean, you may think it's a long way down the road to the chemist's, but that's just peanuts to space.
                </p>
                <p class="mb-6 text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p class="text-justify">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                </p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative z-10">
        <?php foreach ($books as $index => $book): ?>
            <div class="group cursor-pointer perspective-[1000px]" onclick="openReader('<?= htmlspecialchars($book['title']) ?>')">
                <div class="relative h-[400px] rounded-r-2xl rounded-l-md shadow-[20px_20px_40px_rgba(0,0,0,0.5)] transform-style-3d group-hover:-rotate-y-12 transition-transform duration-500 ease-out">
                    
                    <!-- Book Cover -->
                    <div class="absolute inset-0 bg-gradient-to-br <?= $book['color'] ?> rounded-r-2xl rounded-l-md overflow-hidden transform-style-3d border-l-[8px] border-white/20">
                        <img src="<?= $book['cover'] ?>" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-60">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/30"></div>
                        
                        <div class="absolute bottom-0 left-0 p-6 w-full">
                            <h3 class="text-2xl font-serif font-bold text-white mb-1 shadow-black drop-shadow-lg leading-tight"><?= htmlspecialchars($book['title']) ?></h3>
                            <p class="text-sm text-gray-300 font-medium uppercase tracking-widest"><?= htmlspecialchars($book['author']) ?></p>
                        </div>
                    </div>
                    
                    <!-- Book Pages Edge -->
                    <div class="absolute inset-y-0 right-0 w-2 bg-gradient-to-r from-gray-300 to-white rounded-r-sm translate-z-[-2px]"></div>
                </div>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-400 font-light line-clamp-2"><?= htmlspecialchars($book['desc']) ?></p>
                    <span class="inline-block mt-3 text-brand-gold text-xs uppercase tracking-widest font-semibold opacity-0 group-hover:opacity-100 transition-opacity transform translate-y-2 group-hover:translate-y-0">Open Book</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<script>
function openReader(title) {
    const modal = document.getElementById('reader-modal');
    const content = document.getElementById('reader-content');
    const titleEl = document.getElementById('reader-title');
    
    titleEl.textContent = title;
    
    // Show modal
    modal.classList.remove('hidden');
    // Trigger reflow
    void modal.offsetWidth;
    
    // Fade in modal bg
    modal.classList.remove('opacity-0');
    modal.classList.add('opacity-100');
    
    // Animate book opening
    setTimeout(() => {
        content.classList.remove('opacity-0', 'rotate-y-90', 'translate-y-10');
        content.classList.add('opacity-100', 'rotate-y-0', 'translate-y-0');
    }, 100);
    
    document.body.style.overflow = 'hidden';
}

function closeReader() {
    const modal = document.getElementById('reader-modal');
    const content = document.getElementById('reader-content');
    
    // Animate book closing
    content.classList.remove('opacity-100', 'rotate-y-0', 'translate-y-0');
    content.classList.add('opacity-0', 'rotate-y-90', 'translate-y-10');
    
    // Fade out modal bg
    setTimeout(() => {
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }, 500);
    }, 400);
}
</script>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
