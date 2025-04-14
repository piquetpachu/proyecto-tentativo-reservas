 // Verificar preferencia del usuario
 if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
    document.getElementById('sunIcon').classList.add('hidden');
    document.getElementById('moonIcon').classList.remove('hidden');
} else {
    document.documentElement.classList.remove('dark');
    document.getElementById('sunIcon').classList.remove('hidden');
    document.getElementById('moonIcon').classList.add('hidden');
}

// Botón toggle
document.getElementById('themeToggle').addEventListener('click', function() {
    if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
        document.getElementById('sunIcon').classList.remove('hidden');
        document.getElementById('moonIcon').classList.add('hidden');
    } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
        document.getElementById('sunIcon').classList.add('hidden');
        document.getElementById('moonIcon').classList.remove('hidden');
    }
});