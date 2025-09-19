const arrow = document.getElementById('arrow');
const mouse = document.getElementById('mouse');
const third = document.getElementById('first-section');
let current = "arrow";

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting && current === "arrow") {
            // seta desce
            arrow.classList.add("slide-down");
            arrow.addEventListener("animationend", () => {
                arrow.style.opacity = "0";
                arrow.style.display = "none";
                arrow.classList.remove("slide-down");
                arrow.style.transform = "none"; // reset

                // mouse sobe
                mouse.style.display = "flex";
                mouse.classList.add("slide-up");
                current = "mouse";
                mouse.addEventListener("animationend", () => {
                    mouse.classList.remove("slide-up");
                    mouse.style.opacity = "1";
                    mouse.style.transform = "none"; // fixa na posição
                }, { once: true });
            }, { once: true });
        }
        else if (!entry.isIntersecting && current === "mouse") {
            // mouse desce
            mouse.classList.add("slide-down");
            mouse.addEventListener("animationend", () => {
                mouse.style.opacity = "0";
                mouse.style.display = "none";
                mouse.classList.remove("slide-down");
                mouse.style.transform = "none"; // reset

                // seta sobe
                arrow.style.display = "block";
                arrow.classList.add("slide-up");
                current = "arrow";
                arrow.addEventListener("animationend", () => {
                    arrow.classList.remove("slide-up");
                    arrow.style.opacity = "1";
                    arrow.style.transform = "none"; // fixa na posição
                }, { once: true });
            }, { once: true });
        }
    });
}, { threshold: 0.5 });

function scrollToTop(duration = 1200) {
    const start = window.pageYOffset;
    const startTime = performance.now();

    function easeInOutCubic(t) {
        return t < 0.5
            ? 4 * t * t * t          // acelera
            : 1 - Math.pow(-2 * t + 2, 3) / 2; // desacelera
    }

    function animation(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const easedProgress = easeInOutCubic(progress);

        window.scrollTo(0, start * (1 - easedProgress));

        if (elapsed < duration) {
            requestAnimationFrame(animation);
        }
    }

    requestAnimationFrame(animation);
}

arrow.addEventListener("click", () => {
    scrollToTop(900); // tempo ideal ~0.9s (nem rápido demais, nem lento)
});

observer.observe(third);