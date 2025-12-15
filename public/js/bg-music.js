document.addEventListener("DOMContentLoaded", () => {
    const music = document.getElementById("bgMusic");
    const toggle = document.getElementById("soundToggle");

    let soundOn = localStorage.getItem("sound") === "on";

    if (soundOn) {
        music.volume = 0.9;
        music.play().catch(() => {});
        toggle.innerText = "🔊";
    } else {
        toggle.innerText = "🔇";
    }

    toggle.addEventListener("click", () => {
        if (music.paused) {
        music.volume = 0.9;
        music.play();
        toggle.innerText = "🔊";
        localStorage.setItem("sound", "on");
        } else {
        music.pause();
        toggle.innerText = "🔇";
        localStorage.setItem("sound", "off");
        }
    });
});
