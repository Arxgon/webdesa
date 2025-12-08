<footer class="bg-[#0A332C] text-slate-200">
    <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col md:flex-row items-center justify-between gap-3">
        <p>© {{ date('Y') }} Pemerintah Desa. Semua hak dilindungi.</p>
        <div class="flex gap-4 text-sm">
            <a href="#profil" class="hover:text-white">Profil</a>
            <a href="#layanan" class="hover:text-white">Layanan</a>
            <a href="#program" class="hover:text-white">Program</a>
            <a href="#kontak" class="hover:text-white">Kontak</a>
        </div>
    </div>
</footer>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<script>
AOS.init({
    duration: 900,
    once: true,
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    gsap.from(".hero-title", {
        y: 40,
        opacity: 0,
        duration: 1
    });
    gsap.from(".hero-subtitle", {
        y: 40,
        opacity: 0,
        duration: 1.3
    });
    gsap.from(".hero-img", {
        opacity: 0,
        scale: 0.9,
        duration: 1.2
    });
});
</script>