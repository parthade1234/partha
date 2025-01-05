document.addEventListener('copy', function(e) {
    e.preventDefault();
    alert("Copying is disabled.");
});

document.addEventListener('cut', function(e) {
    e.preventDefault();
    alert("Cutting is disabled.");
});

document.addEventListener('paste', function(e) {
    e.preventDefault();
    alert("Pasting is disabled.");
});

// Disable right-click
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    alert("Right-click is disabled.");
});

// Disable keyboard shortcuts (Ctrl+C, Ctrl+X, Ctrl+V, F12, Ctrl+Shift+I, Ctrl+U)
document.addEventListener('keydown', function(e) {
    // Disable F12 (Developer Tools), Ctrl+Shift+I (Inspect), Ctrl+U (View source)
    if (e.keyCode === 123 || 
        (e.ctrlKey && e.shiftKey && (e.keyCode === 73 || e.keyCode === 74)) || 
        (e.ctrlKey && e.keyCode === 85)) {
        e.preventDefault();
        alert("Inspect Element and View Source are disabled.");
    }

    // Disable Ctrl+C, Ctrl+X, Ctrl+V (copy, cut, paste)
    if ((e.ctrlKey || e.metaKey) && (e.key === 'c' || e.key === 'x' || e.key === 'v')) {
        e.preventDefault();
        alert("Copy, Cut, and Paste are disabled.");
    }
});