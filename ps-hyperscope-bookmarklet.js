javascript:(function() {
    var targetUrl = encodeURIComponent(window.location.href);
    window.open('http://localhost:5000/get_webpage?url=' + targetUrl, '_blank');
})();
