<footer class="bg-[#0A332C] text-gray-300 mt-20 py-10">
    <div class="container mx-auto grid md:grid-cols-3 gap-8 px-4">

        <div>
            <h3 class="text-white font-semibold mb-4">Ngarogretno</h3>
            <p>Address: Ngarogretno Village, Magelang, Central Java</p>
            <p>Email: info@ngarogretno.com</p>
            <p>Phone: +62 812 3456 7890</p>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-4">Attractions</h3>
            <ul class="space-y-2 text-sm">
                <li>Honey Farm</li>
                <li>Tea Plantation</li>
                <li>Coffee Estate</li>
                <li>Local Craft</li>
            </ul>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-4">Events</h3>
            <ul class="space-y-2 text-sm">
                <li>NgaroFest</li>
                <li>Workshops</li>
                <li>Webinars</li>
            </ul>
        </div>
    </div>

    <div class="text-center text-sm text-gray-400 mt-8">© 2025 Ngarogretno — All Rights Reserved</div>
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