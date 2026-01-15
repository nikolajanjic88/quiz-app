const gameConfig = {
    apiUrl: '/silmarilion-quiz-app-qoute/get',
    render(data) {
        document.getElementById('quote-text').innerHTML = `"${data.text}"`;
        audio.src = '/' + data.audio;
    }
};
