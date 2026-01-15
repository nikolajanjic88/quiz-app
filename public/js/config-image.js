const gameConfig = {
    apiUrl: '/silmarilion-quiz-app-lore/get',
    render(data) {
        document.getElementById('characterImage').src = data.image;
    }
};
