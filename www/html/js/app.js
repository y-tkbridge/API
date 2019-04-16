// const axios = require('axios');


var app = new Vue({

    el: '#app',
    data: {
        results: [],
        param:[]


    },
    methods: {
        request: () => {
            //axios.get('http://qiita.com/api/v2/items?page=1&per_page=30')
            // axios.get('https://api.nytimes.com/svc/topstories/v2/home.json?api-key=SPtwT55DG3Skij62pDC88R9WVF0X0qkn')
            axios.get('')
                .then((res) => {
                    app.results = res.data.results;
                })
                .catch((res) => {
                    console.error(res);
                });
        },
        post: () => {
            axios.post('http://localhost:8000/api.php', {
                name: 'yuta'

            })
                .then(response => {
                    app.results = response.data;
                    console.log('送信したテキスト: ' + response.data.name);
                }).catch(error => {
                    console.log(error);
                });
        }

    }
});
app.request();